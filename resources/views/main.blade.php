@extends('layouts.main')
@section('contenido')

    <h1 class="text-3xl font-bold text-[#4B5563] text-[#4B5563] my-auto mb-8">
        @lang('todolist.msg_bienvenida', ['nombre' => Auth::user()])
    </h1>

    



@endsection