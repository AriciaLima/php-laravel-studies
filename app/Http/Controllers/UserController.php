<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function addUser(){
        $users = $this->getAllUsers();

        return view('users.add_user', compact('users'));
    }

    public function listUsers(){
        $usersThatWillComeFromDB = ['Manuela', 'Vítor', 'Alexandre', 'Bruno'];

        $usersFromDB = DB::table('users')->get();


        return view('users.all_users', compact('usersThatWillComeFromDB', 'usersFromDB'));
    }

    private function getAllUsers(){

        //no futuro carregamos dados da base de dados (query À BD)
        $users = ['Francisco', 'Luís','Rafaela', 'Maria'];
        return $users;
    }

    private function insertUserIntoDB(){

        DB::table('users')->updateOrInsert(
            ['email' =>'teste1@gmail.com'],
            [
            'name' =>'Sara',
            'updated_at'=>now(),
            'password' => Hash::make('1234444')
        ]);
    }

    private function deleteUserFromDB(){
        DB::table('users')
        ->where('id',4)
        ->delete();

    }

}