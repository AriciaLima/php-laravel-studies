@extends('layouts.fe_master')
@section('content')
    <h4>Olá, aqui podes adicionar utilizadores</h4>
    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user }}
            </li>
        @endforeach
    </ul>
@endsection
