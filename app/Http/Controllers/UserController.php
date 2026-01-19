<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    public function addUser(){
        $users = $this->getAllUsers();

        return view('users.add_user', compact('users'));
    }

    public function listUsers(){
        $usersFromDB = DB::table('users')->get();
        return view('users.all_users', compact('usersFromDB'));
    }

    public function viewUser($id){
        //carregar nova view
        // com os dados do user onde estamos a clicar
        $user = DB::table('users')->where('id', $id)->first();
        return view('users.view_user', compact('user'));
    }

    public function deleteUser($id){
        // apaga tasks associadas e depois o user
        DB::table('tasks')
            ->where('user_id', $id)
            ->delete();

        DB::table('users')
            ->where('id', $id)
            ->delete();

        return back();
    }

    public function storeUser(Request $request){
        //dd($request->all());
        //validar se os dados recebidos estão em conformidade com a BAse de dados
       $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' =>'min:8|required'
        ]);
          //inserir user na base de dados
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.all')->with('message', 'User adicionado com sucesso!');
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