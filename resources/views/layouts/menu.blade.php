<header class="lg:px-16 px-4 bg-white flex flex-wrap items-center py-4 shadow-md">
    <div class="hidden md:flex md:items-center md:w-auto w-full" id="menu">
        <nav>
            <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                <li><a class="md:p-4 py-3 px-0 block" href="{{ route('etiqueta.listar') }}">@lang('todolist.mnu_inicio')</a></li>
                <li><a class="md:p-4 py-3 px-0 block" href="#">@lang('todolist.mnu_usuarios')</a></li>
                <li><a class="md:p-4 py-3 px-0 block" href="#">@lang('todolist.mnu_tareas')</a></li>
                <li><a class="md:p-4 py-3 px-0 block" href="#">@lang('todolist.mnu_etiquetas')</a></li>
                <li><a class="md:p-4 py-3 px-0 block md:mb-0 mb-2" href="{{ route('logout') }}">@lang('todolist.mnu_salir')</a></li>
            </ul>
        </nav>
    </div>
</header>