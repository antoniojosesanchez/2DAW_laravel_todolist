<header class="lg:px-16 px-4 bg-white flex flex-wrap items-center py-4 shadow-md">
    <div class="hidden md:flex md:items-center md:w-auto w-full" id="menu">
        <nav>
            <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                
                <li><a class="md:p-4 py-3 px-0 block" href="{{ route('home') }}">@lang('todolist.mnu_inicio')</a></li>

                @if(Auth::user()->admin)
                <li><a class="md:p-4 py-3 px-0 block" href="#">@lang('todolist.mnu_usuarios')</a></li>
                @endif

                <li><a class="md:p-4 py-3 px-0 block" href="#">@lang('todolist.mnu_tareas')</a></li>
                <li><a class="md:p-4 py-3 px-0 block" href="{{ route('etiqueta.listar') }}">@lang('todolist.mnu_etiquetas')</a></li>
                <li><a class="md:p-4 py-3 px-0 block" href="{{ route('perfil') }}">@lang('todolist.mnu_perfil')</a></li>

                {{-- logout --}}
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <li><button class="md:p-4 py-3 px-0 block md:mb-0 mb-2">@lang('todolist.mnu_salir')</button></li>
                </form>
            </ul>
        </nav>
    </div>
</header>