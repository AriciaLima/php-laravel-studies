@extends('layouts.fe_master')
@section('content')
<<<<<<< HEAD
    <h6>Users vindos da BD</h6>
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
=======
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Foto</th>
                <th scope="col">Email</th>
                <th scope="col">Nif</th>
<<<<<<< HEAD
                <th></th>
=======
                
>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersFromDB as $user)
                <tr>
<<<<<<< HEAD
                    <th>{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nif }}</td>
                    <td><a href="{{ route('users.view', $user->id) }}" class="btn btn-info">Ver</a></td>
                    <td><a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Apagar</a></td>
=======
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td><img src="{{ $user->photo ? asset('storage/'.$user->photo)  : asset('images/nophoto.jpeg') }}" alt="" width="50" height="50"></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nif }}</td>
                    @auth
                        <td><a href="{{ route('users.view', $user->id) }}" class="btn btn-info">Ver / Editar</a></td>
                        @if (Auth::user()->email == 'ariciafariasl@gmail.com')
                            <td><a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Apagar</a></td>
                        @endif

                    @endauth
>>>>>>> bb68aaadd51a64ce755e1cdd1cb428a0faf8a1cb
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
