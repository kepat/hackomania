<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * User instance.
     *
     * @access protected
     * @type   User
     */
    protected $user;

    /**
     * User controller constructor.
     *
     * @param  User $user
     *
     * @access public
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validates the username or email
        $validation = [
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3'
        ];

        // Validation messages
        $validation_messages = [
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email.',
            'email.unique' => 'The email is already existing.',
            'username.required' => 'The username field is required.',
            'username.unique' => 'The username is already existing.',
            'password.required' => 'The password field is required.',
            'password.confirmed' => 'The password and retyped password are not the same.',
            'password_confirmation.required' => 'The retype password field is required.',
        ];

        // Validation
        $this->validate($request, $validation, $validation_messages);

        // Generate the new record details
        $user = new $this->user;
        $user->email = $request->get('email');
        $user->username = $request->get('username');
        $user->password = bcrypt($request->get('password'));

        // Save the new record
        $user->save();

        return redirect('/login')->with('message', 'Sign up successful.');
    }

}
