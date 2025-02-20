{{-- 
    Desarrollo Web en Entorno Servidor
    @author Antonio J. Sánchez Bujaldón    
--}}

<div>
     <h3 class="font-bold" style="color: {{ $color }}">
        <h1 {{ $cabecera->attributes->merge(["class" => "font-bold text-3xl"]) }}>{{ $cabecera }}</h1>
        {{ $slot }}
    </h3>
</div>