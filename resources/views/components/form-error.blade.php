@props(['field' => null])

@error($field)
    <div class="invalid-feedback d-block">
        {{ $message }}
    </div>
@enderror
