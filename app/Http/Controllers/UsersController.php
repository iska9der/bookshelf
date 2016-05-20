<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class UsersController extends Controller
{

    public function showProfile($id)
    {
        return view('user.profile');
    }

}
