<div>
    <div class="mb-3">
        <label class="form-label" for="{{ $attributes->get('name') ?? $attributes->get('id') }}">{{ $slot }}</label>
        <input class="form-control" {{ $attributes->merge(['type' => $type, 'id' => $attributes->get('name')]) }}>
         @error($attributes->get('name'))
              {{ $message }}
         @enderror
    </div>
</div>
