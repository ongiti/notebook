<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        //
        return view('users.index');
    }
    /**
     * Shows a form to create a user
     */
    public function create(){
        return view('users.create');
    }

    /**
     * Save the user
     *
     * @param Request $request
     * @return string
     */
    public function store(Request $request){

        // all the user input
        $data = $request->all();

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        // flASH THE MESSAGE
        return sprintf('success %s', $user->name);
    }
}
