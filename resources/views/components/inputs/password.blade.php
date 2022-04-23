<div>
    <label for="{{ $attributes->get('name') ?? $attributes->get('id') }}">{{ $slot }}</label>
    <input {{ $attributes->merge(['type' => $type, 'id' => $attributes->get('name')]) }}>
    @error($attributes->get('name'))
        {{ $message }}
    @enderror
</div>
