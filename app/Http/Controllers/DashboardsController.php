<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Laravel\OAuth2\Instagram\Facades\Instagram;
use Vinkla\Facebook\Facades\Facebook;

session_start();

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
        $withInstagram = false;
        $withFacebook = false;
        $withMeetup = false;

        // Check if token is already existing then skip
        $instagrams = [];
        $token_instagram = $request->session()->get('instagramToken');
        if ($token_instagram) {
            $feedRequest = Instagram::getAuthenticatedRequest(
                'GET',
                'https://api.instagram.com/v1/users/self/media/recent',
                $token_instagram
            );

            $client = new \GuzzleHttp\Client();
            $feedResponse = $client->send($feedRequest);
            $instagramFeed = json_decode($feedResponse->getBody()->getContents());
            $instagrams = $instagramFeed->data;
            $withInstagram = true;
        }

        // Facebook
        $facebooks = [];
        $token_facebook = $request->session()->get('facebookToken');
        if ($token_facebook) {
            $facebookFeed = Facebook::get('/me/photos?fields=images&limit=500', $token_facebook);
            $facebooks = $facebookFeed->getGraphEdge()->asArray();
            $withFacebook = true;
        }

        // Meetups
        $meetups = [];
        $token_meetup = $request->session()->get('meetupToken');
        if ($token_meetup) {
            // Refresh token
            $query = 'client_id=jqc3ei7nta7d39jabqph66ot42';
            $query = $query . '&client_secret=24kmos1am4ql7tl90dln2nbjpu';
            $query = $query . '&grant_type=refresh_token';
            $query = $query . '&refresh_token=' . $token_meetup;

            // Get the access token
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://secure.meetup.com/oauth2/access");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $return = curl_exec($ch);
            curl_close($ch);

            // Get the data
            $return = json_decode($return);

            $token = $return->access_token;

            // Store the data
            $request->session()->put('meetupToken', $return->refresh_token);

            $request_headers = array();
            $request_headers[] = 'Authorization: Bearer '. $token;

            // Get the events token
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
            curl_setopt($ch, CURLOPT_URL, "https://api.meetup.com/2/member/self");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $return = curl_exec($ch);
            curl_close($ch);

            // Get the data
            $return = json_decode($return);
            $meetups[] = $return;

            $withMeetup = true;
        }

        // Prepare the data to be passed in the view
        $data = [
            'withInstagram' => $withInstagram,
            'withFacebook' => $withFacebook,
            'withMeetup' => $withMeetup,
            'instagrams' => $instagrams,
            'facebooks' => $facebooks,
            'meetups' => $meetups,
            'navigation' => $this->navigation
        ];

        return view('dashboards.index', $data);
    }

    public function facebook(Request $request)
    {
        $token_facebook = $request->session()->get('facebookToken');
        if ($token_facebook) {
            $request->session()->remove('facebookToken');
            return redirect('/');
        } else {
            $facebookHelper = Facebook::getRedirectLoginHelper();
            $request->session()->put('redirectFrom', 'facebook');
            $permissions = ['user_photos', 'publish_actions'];
            $authUrl = $facebookHelper->getLoginUrl('http://192.168.1.140:8000/redirect', $permissions);
            return redirect()->away($authUrl);
        }
    }

    public function instagram(Request $request)
    {
        $token_instagram = $request->session()->get('instagramToken');
        if ($token_instagram) {
            $request->session()->remove('instagramToken');
            return redirect('/');
        } else {
            $request->session()->put('redirectFrom', 'instagram');
            $authUrl = Instagram::authorize(['scope' => 'public_content'], function ($url, $provider) use ($request) {
                $request->session()->put('instagramState', $provider->getState());
                return $url;
            });
            return redirect()->away($authUrl);
        }
    }


    public function meetup(Request $request)
    {
        $token_meetup = $request->session()->get('meetupToken');
        if ($token_meetup) {
            $request->session()->remove('meetupToken');
            return redirect('/');
        } else {
            $request->session()->put('redirectFrom', 'meetup');
            $authUrl = 'https://secure.meetup.com/oauth2/authorize?client_id=jqc3ei7nta7d39jabqph66ot42&response_type=code&redirect_uri=http://192.168.1.140:8000/redirect&scope=basic';
            return redirect()->away($authUrl);
        }
    }

    public function redirect(Request $request)
    {
        $from = $request->session()->get('redirectFrom');
        if ($from == 'instagram') {
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
        } else if ($from == 'facebook') {
            // Facebook
            $facebookHelper = Facebook::getRedirectLoginHelper();
            $token = $facebookHelper->getAccessToken()->getValue();
            $request->session()->put('facebookToken', $token);
        } else if ($from == 'meetup') {
            $code = $request->get('code');

            // Prepare the query
            $query = 'client_id=jqc3ei7nta7d39jabqph66ot42';
            $query = $query . '&client_secret=24kmos1am4ql7tl90dln2nbjpu';
            $query = $query . '&grant_type=authorization_code';
            $query = $query . '&redirect_uri=http://192.168.1.140:8000/redirect';
            $query = $query . '&code=' . $code;

            // Get the access token
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://secure.meetup.com/oauth2/access");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $return = curl_exec($ch);
            curl_close($ch);

            // Get the data
            $return = json_decode($return);

            $request->session()->put('meetupToken', $return->refresh_token);
        }

        // Redirect the dashboard
        return redirect('/');
    }

    public function printImages()
    {
        return redirect('/')->with('message', 'Print Request Submitted.');
    }

    public function share(Request $request)
    {
        $linkData = [
            'link' => 'http://192.168.1.140:8000/',
            'message' => 'Awesome use this!',
        ];

        // Facebook
        $token_facebook = $request->session()->get('facebookToken');
        if ($token_facebook) {
            Facebook::post('/me/feed', $linkData, $token_facebook);
        }

        return redirect('/')->with('message', 'Link Shared.');
    }
}
