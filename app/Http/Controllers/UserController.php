<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser(){
        $users = $this->getAllUsers();

        return view('users.add_user', compact('users'));
    }

    private function getAllUsers(){
    $users = ['Francisco', 'Luís','Rafaela', 'Maria'];
    return $users;
    }

}
