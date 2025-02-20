@props(['color'   => '#0f9dff', 
        'message' => 'Se ha producido un error'])

<div class="rounded-lg w-full h-32 text-[#ffffff]" style="background-color: {{ $color }}">
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



