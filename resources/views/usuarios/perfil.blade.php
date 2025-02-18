@extends('layouts.main')
@section('contenido')

<div class="flex flex-col w-full md:w-1/2 xl:w-2/5 2xl:w-2/5 3xl:w-1/3 mx-auto p-8 md:p-10 2xl:p-12 3xl:p-14 bg-[#ffffff] rounded-2xl shadow-xl">
    <div class="flex flex-row gap-3 pb-4">
        <!---->
         <h1 class="text-3xl font-bold text-[#4B5563] text-[#4B5563] my-auto">
            {{ config('app.name') }}
         </h1>

    </div>
    <!---->
    <form action="{{ route('perfil.guardar') }}" method="post" enctype="multipart/form-data"
          class="flex flex-col">
        
        @csrf

        {{-- NOMBRE --}}
        <div class="pb-2">
            <label for="nombre" class="block mb-2 text-sm font-medium text-[#111827]">
                @lang('todolist.lab_nombre')
            </label>
            <div class="relative text-gray-400">
                <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" /></svg>
                </span> 
                <input type="text" name="nombre" id="nombre" 
                       value="{{ Auth::user()->nombre }}"
                       class="pl-12 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 sm:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" placeholder="" autocomplete="off"
                       autofocus required>
            </div> 
        </div>

        {{-- APELLIDOS --}}
        <div class="pb-2">
            <label for="apellidos" class="block mb-2 text-sm font-medium text-[#111827]">
                @lang('todolist.lab_apellidos')
            </label>
            <div class="relative text-gray-400">
            <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" /></svg>
                </span> 
                <input type="text" name="apellidos" id="apellidos" 
                       value="{{ Auth::user()->apellidos }}"
                       class="pl-12 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 sm:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" placeholder="" autocomplete="off" />
            </div>
        </div>

        {{-- EMAIL --}}
        <div class="pb-2">
            <label for="email" class="block mb-2 text-sm font-medium text-[#111827]">
                @lang('todolist.lab_email')
            </label>
            <div class="relative text-gray-400"><span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg></span> 
                <input type="email" name="email" id="email" 
                       value="{{ Auth::user()->email }}"
                       class="pl-12 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 sm:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" placeholder="name@company.com" autocomplete="off"
                       required />
            </div>
        </div>

        {{-- PERFIL X (TWITTER) --}}
        <div class="pb-2">
            <label for="twitter" class="block mb-2 text-sm font-medium text-[#111827]">
                @lang('todolist.lab_twitter')
            </label>
            <div class="relative text-gray-400">
                <span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"></span> 
                <input type="text" name="twitter" id="twitter" 
                       value=""
                       class="pl-12 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 sm:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" placeholder="@nombreusuario" autocomplete="off"
                       required />
            </div>

            @error('twitter')
                <div class="text-red-500 font-bold">{{ $message }}</div>
            @enderror
        </div>

        {{-- PASSWORD --}}
        <div class="pb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-[#111827]">
                @lang('todolist.lab_password')
            </label>
            <div class="relative text-gray-400"><span class="absolute inset-y-0 left-0 flex items-center p-1 pl-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-asterisk"><rect width="18" height="18" x="3" y="3" rx="2"></rect><path d="M12 8v8"></path><path d="m8.5 14 7-4"></path><path d="m8.5 10 7 4"></path></svg></span> 
                <input type="password" name="password" id="password" placeholder="••••••••••" class="pl-12 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 sm:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" />
            </div>
            @error('password')
                <div class="text-red-500 font-bold">{{ $message }}</div>
            @enderror
        </div>

        {{-- FOTO DE PERFIL --}}
        <div class="pb-6">
            <label for="foto" class="block mb-2 text-sm font-medium text-[#111827]">
                @lang('todolist.lab_perfil')
            </label>
            <div class="relative text-gray-400">                
                <img src="{{ route('perfil.imagen') }}"
                     class="w-48 h-48 border-black-100 mb-2 border-2 rounded-full mx-auto" />
                <input type="file" name="foto" id="foto" placeholder="" 
                       accept=".png, .jpg"
                       class="pl-2 mb-2 bg-gray-50 text-gray-600 border focus:border-transparent border-gray-300 sm:text-sm rounded-lg ring-3 ring-transparent focus:ring-1 focus:outline-hidden focus:ring-gray-400 block w-full p-2.5 rounded-l-lg py-3 px-4" />
            </div>

            @error('foto')
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
        <button type="submit" class="w-full text-[#FFFFFF] bg-[#4F46E5] focus:ring-4 focus:outline-hidden focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-6">
            @lang('todolist.btn_aceptar')
        </button>        
        </div>
    </form>
    <!---->
</div>


@endsection