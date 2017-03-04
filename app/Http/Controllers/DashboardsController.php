<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Laravel\OAuth2\Instagram\Facades\Instagram;

class DashboardsController extends Controller
{
    /**
     * Navigation highlight.
     *
     * @access protected
     * @type   string
     */
    protected $navigation = "Dashboard";

    public function index(Request $request)
    {

        // Check if token is already existing then skip
        $token_instagram = $request->session()->get('instagramToken');
        if (!$token_instagram) {
            $authUrl = Instagram::authorize(['scope' => 'public_content'], function ($url, $provider) use ($request) {
                $request->session()->put('instagramState', $provider->getState());
                return $url;
            });

            return redirect()->away($authUrl);
        }

        $feedRequest = Instagram::getAuthenticatedRequest(
            'GET',
            'https://api.instagram.com/v1/users/self/media/liked',
            $token_instagram
        );

        $client = new \GuzzleHttp\Client();
        $feedResponse = $client->send($feedRequest);
        $instagramFeed = json_decode($feedResponse->getBody()->getContents());


        dd($instagramFeed);

        // Prepare the data to be passed in the view
        $data = [
            'navigation' => $this->navigation
        ];

        return view('dashboards.index', $data);
    }

    public function redirect(Request $request)
    {
        if (!$request->has('state') || $request->state !== $request->session()->get('instagramState')) {
            abort(400, 'Invalid state');
        }

        if (!$request->has('code')) {
            abort(400, 'Authorization code not available');
        }

        $token = Instagram::getAccessToken('authorization_code', [
            'code' => $request->code,
        ]);

        $request->session()->put('instagramToken', $token);

        // Redirect the dashboard
        return redirect('/');
    }
}
