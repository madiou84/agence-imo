@php
    $name ??= '';
    $class ??= null;
    $value ??= '';
    $label ??= ucfirst($name);
@endphp

<div @class($class)>
    <div class="form-group">
        <label for={{ $name }}>{{ $label }}</label>
        <select name="{{ $name }}[]" id="{{ $name }}" multiple class="form-select">
            @foreach ($options as $k => $v)
                <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
            @endforeach
        </select>

        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
