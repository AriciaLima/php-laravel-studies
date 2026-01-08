@extends('layouts.fe_master')

@section('content')
    <h5>Aqui vamos ver os dados de uma task</h5>

    <h6>Nome: {{ $task->name }}</h6>
    <h6>Estado: {{ $task->status }}</h6>
    <h6>Data: {{ $task->due_at }}</h6>
    <h6>{{ $task->username }}</h6>
@endsection