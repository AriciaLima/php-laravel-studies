<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
<<<<<<< HEAD
use App\Models\User;

=======
use Illuminate\Support\Facades\Storage;
>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb

class UserController extends Controller
{
    public function addUser()
    {
        $users = $this->getAllUsers();

        return view('users.add_user', compact('users'));
    }

<<<<<<< HEAD
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

=======
    public function listUsers()
    {
        $usersThatWillComeFromDB = ['Manuela', 'Vítor', 'Alexandre', 'Bruno'];

        $usersFromDB = User::get();


        return view('users.all_users', compact('usersThatWillComeFromDB', 'usersFromDB'));
    }

    public function viewUser($id)
    {
        //carregar uma nova view
        //com os dados do user onde estamos a clicar
        $user = User::where('id', $id)->first();

        return view('users.view_user', compact('user'));
    }

    public function deleteUser($id)
    {

        //se tiver tasks associadas, apaga
        Db::table('tasks')
            ->where('user_id', $id)
            ->delete();


>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb
        DB::table('users')
            ->where('id', $id)
            ->delete();

<<<<<<< HEAD
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
=======

        return back();
    }

    //função que recebe os dados do form
    public function storeUser(Request $request)
    {
        //dd($request->all());
        //validar se os dados recebidos estão em conformidade com a BAse de dados
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'min:8|required'
        ]);

        //inserir user na base de dados
>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.all')->with('message', 'User adicionado com sucesso!');
    }

<<<<<<< HEAD
    private function getAllUsers(){
=======

    private function getAllUsers()
    {
>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb

        //no futuro carregamos dados da base de dados (query À BD)
        $users = ['Francisco', 'Luís', 'Rafaela', 'Maria'];
        return $users;
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'image'
        ]);

        $photo = null;
        if ($request->hasFile('photo')) {
            $photo = Storage::putFile('userPhotos', $request->photo);
        }
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'address' => $request->address,
                'nif' => $request->nif,
                'photo' => $photo,
                'updated_at' => now(),
            ]);

        return redirect()->route('users.all')->with('message', 'User actualizado com sucesso!');
    }
    private function insertUserIntoDB()
    {

        DB::table('users')->updateOrinsert(
            ['email' => 'teste1@gmail.com'],
            [
                'name' => 'Sara',
                'updated_at' => now(),
                'password' => '1234444'
            ]
        );
    }

    private function deleteUserFromDB()
    {
        Db::table('users')
            ->where('id', 4)
            ->delete();
    }
}
