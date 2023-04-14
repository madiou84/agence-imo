@php
    $class ??= null;
@endphp
<div @class(["form-check form-switch", $class])>
    <input type="hidden" value="0" name="{{ $name }}"/>
    <input
        type="checkbox"
        name="{{ $name }}"
        id="{{ $name }}"
        value="1"
        role="switch"
        @checked(old($name, $value ?? false))
        class="form-check-input @error($name) is-invalid @enderror"
    />
    
    <label for={{ $name }}>{{ $label }}</label>


    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>