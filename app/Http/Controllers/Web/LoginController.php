<?php

namespace App\Http\Controllers\Web;

use Doctrine\ORM\EntityManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends WebController
{
    /**
     * @var EntityManager
     */
    public $em;

    /**
     *  @param EntityManager $entityManager
     */
    public function __construct(
        EntityManager $entityManager
    ) {
        $this->em = $entityManager;
    }

    /**
     * Shows the login screen.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Logs in the user with credentials.
     *
     * @return \Illuminate\View\View
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        } else {
            abort(401, "The email/password combination is incorrect or does not exist.");
        }
    }

    /**
     * Logs in the user with credentials.
     *
     * @return \Illuminate\View\View
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
