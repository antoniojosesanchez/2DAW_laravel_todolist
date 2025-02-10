{{-- 
    Desarrollo Web en Entorno Servidor
    @author Antonio J. Sánchez Bujaldón    
--}}

@extends('layouts.main')
@section('contenido')

    <h1 class="text-3xl font-bold text-[#4B5563] text-[#4B5563] my-auto mb-8">
        @lang('todolist.msg_bienvenida', ['nombre' => 'Antonio José'])
    </h1>

    <a href="{{ route('etiqueta.nueva') }}"
       class="text-white bg-[#374151] text-[#ffffff] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none dark:focus:ring-blue-800"">Nueva</a>

    <div class="mt-8 overflow-hidden shadow-md rounded-lg">
        <table class="table-fixed w-full text-left">
            <thead class="uppercase bg-[#000000] text-[#ffffff]" style="background-color: #000000; color: #ffffff;">
                <tr>
                    <!--[-->
                    <td class="py-1 border border-gray-200 text-center font-bold p-4">ETIQUETA</td>
                    <td class="py-1 border border-gray-200 text-center font-bold p-4">COLOR</td>
                    <td class="py-1 border border-gray-200 text-center font-bold p-4"></td>
                    <!--]-->
                </tr>
            </thead>
            <tbody class="bg-white text-gray-500 bg-[#FFFFFF] text-[#6b7280]" style="background-color: #FFFFFF; color: #6b7280;">
                @foreach($etiquetas as $item)
                <tr class=" py-5">
                    <!--[-->
                    <td class=" py-5 border border-gray-200 text-center  p-4">{{ $item->etiqueta }}</td>
                    <td class=" py-5 border border-gray-200 text-center  p-4">
                        <span @style([ "background-color: $item->color" ])
                            class="text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-black-400 border border-black-400">
                            {{ $item->color }}
                        </span>                    
                    </td>
                    <td class=" py-5 border border-gray-200 text-center  p-4">
                    <a href="{{ route('etiqueta.editar', $item) }}"
                           class="text-white bg-[#374151] text-[#ffffff] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none dark:focus:ring-blue-800">
                           @lang('todolist.btn_editar')
                        </a>
                        <a href="{{ route('etiqueta.borrar', $item) }}"
                           class="text-white bg-red-500 ml-2 text-[#ffffff] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none dark:focus:ring-blue-800">
                           @lang('todolist.btn_borrar')
                        </a>
                    </td>
                    <!--]-->
                </tr>
                @endforeach
            </tbody>
        </table>       
    </div>

    <h1 class="text-3xl font-bold text-[#4B5563] text-[#4B5563] my-auto mb-8">
        {{ trans_choice('todolist.msg_registros', $etiquetas->count(), ['num' => $etiquetas->count()]) }}
    </h1>
@endsection