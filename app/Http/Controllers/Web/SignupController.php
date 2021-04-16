<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\WebController;

class SignupController extends WebController
{

    /**
     * Returns all supppliers.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('signup');
    }
}
