@php
    $name ??= "";
    $type ??= "text";
    $class ??= null;
    $value ??= "";
    $label ??= ucfirst($name);
@endphp

<div @class(["form-group", $class])>
    <label for={{ $name }}>{{ $label }}</label>
    @if ($type === "textarea")
        <textarea
            id={{ $name }}
            name={{ $name }}
            type="{{ $type }}"
            class="form-control @error($name) is-invalid @enderror">{{ old($name, $value) }}</textarea>
    @else
        <input
            id={{ $name }}
            name={{ $name }}
            type="{{ $type }}"
            value="{{ old($name, $value) }}"
            class="form-control @error($name) is-invalid @enderror"
        />
    @endif

    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>