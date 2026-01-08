@extends('layouts.fe_master')
@section('content')
    <h6>Aqui vamos carregar todos os users que estão na base de dados</h6>
    
    @if (session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Nif</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersFromDB as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nif }}</td>
                    @auth
                    @if (Auth::user()->email == 'ariciafariasl@gmail.com')
                        <td><a href="{{route('users.view', $user->id)}}" class="btn btn-info">Ver / Editar</a></td>
                       <td><a href="{{route('users.delete', $user->id)}}" class="btn btn-danger">Apagar</a></td>
                    @endif
                 
                    @endauth
                    </tr>
                  
            @endforeach
        </tbody>
    </table>
@endsection