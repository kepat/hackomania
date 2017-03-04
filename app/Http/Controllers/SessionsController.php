<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    /**
     * Login page.
     *
     * @access public
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Verify the users credential.
     *
     * @param  Request $request
     *
     * @access public
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validates the username or email
        $validation = [
            'email' => 'required',
            'password' => 'required'
        ];

        // Validation messages
        $validation_messages = [
            'email.required' => 'The email/password field is required.',
            'password.required' => 'The password field is required.'
        ];

        // Validation
        $this->validate($request, $validation, $validation_messages);

        // Store the required credential details
        $username = $request->get('email');
        $password = $request->get('password');

        // For email credential
        $email_credentials = ['email' => $username, 'password' => $password];

        // For username credential
        $username_credentials = ['username' => $username, 'password' => $password];

        // Validate the user credential
        if (!Auth::attempt($email_credentials) && !Auth::attempt($username_credentials)) {
            return redirect()->back()->withErrors(['Incorrect username or password.']);
        }

        return redirect()->intended('/');
    }

    /**
     * User logout.
     *
     * @access public
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('sessions.create')->with('message', 'Logout successfully.');
    }
}