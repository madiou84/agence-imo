@php
    $name ??= '';
    $type ??= 'text';
    $class ??= null;
    $value ??= '';
    $label ??= ucfirst($name);
    $placeholder ??= $label;
@endphp

<div @class(['form-floating', $class])>
    @if ($type === 'textarea')
        <textarea placeholder="{{ $placeholder }}" id={{ $name }} name={{ $name }} type="{{ $type }}"
            class="form-control @error($name) is-invalid @enderror">{{ old($name, $value) }}</textarea>
    @else
        <input placeholder="{{ $placeholder }}" id={{ $name }} name={{ $name }} type="{{ $type }}" value="{{ old($name, $value) }}"
            class="form-control @error($name) is-invalid @enderror" />
    @endif
    <label for={{ $name }}>{{ $label }}</label>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
