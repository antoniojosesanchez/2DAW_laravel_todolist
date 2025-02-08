{{-- 
    Desarrollo Web en Entorno Servidor
    @author Antonio J. Sánchez Bujaldón    
--}}

@extends('layouts.main')
@section('contenido')

<div class="flex flex-col space-y-4 p-4 border rounded-lg shadow-md max-w-md mx-auto bg-white">

    <h1 class="text-3xl font-bold text-[#4B5563] text-[#4B5563] my-auto">Nueva Etiqueta</h1>

    <form action="{{ route('etiqueta.nueva') }}" method="post">

        {{-- hay que añadir protección CSRF a todos los formularios POST --}}
        @csrf

        <div class="flex items-center space-x-4">

            {{-- Nombre de la etiqueta --}}
            <div class="flex flex-col flex-1">
                <input type="text" id="nombre" name="nombre" 
                    class="mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 w-full" 
                    placeholder="Nombre de la etiqueta"
                    autofocus required />
            </div>
            
            {{-- color de la etiqueta --}}
            <div class="flex flex-col">
                <input type="color" id="color" name="color" class="mt-1 w-16 h-10 border rounded-md cursor-pointer p-1">
            </div>
        </div>
        
        {{-- botonera --}}
        <div class="flex justify-end space-x-2 mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-bold rounded-md hover:bg-blue-600">Enviar</button>
            <a href="{{ route('etiqueta.listar') }}" 
            class="px-4 py-2 bg-red-500 text-white font-bold rounded-md hover:bg-red-400">Cancelar</a>
        </div>
    </form>

    {{-- si se produce un error mostramos un mensaje --}}
    @error('nombre')
    <div class="rounded-lg w-full h-32  bg-red-500 text-[#ffffff]">
        <div class="flex flex-row w-full gap-5 justify-center items-center px-5 w-full h-full">
            <div class="my-auto text-lg">
                {{-- icono --}}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-circle" width="50" height="50">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="m15 9-6 6"></path>
                    <path d="m9 9 6 6"></path>
                </svg>
                {{-- --}}
            </div>
            {{-- mensaje de error --}}
            <div>
                <div class="font-bold text-lg">Error en el formulario</div>
                <div class=" text-base">{{ $message }}</div>
            </div>
        </div>
    </div>
 
    @enderror
</div>

@endsection

