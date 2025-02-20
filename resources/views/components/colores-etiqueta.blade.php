<div>    
    <select {{ $attributes->class(["mt-1 w-32 h-10 "]) }} >
        @foreach($colores as $clave => $hex)
            <option value="#{{ $hex }}" {{ $seleccionado($hex)?"selected":"" }}>{{ $clave }}</option>
        @endforeach
    </select>
</div>