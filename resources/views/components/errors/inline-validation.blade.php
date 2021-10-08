@props(['key'])

@error($key)
    <div class="text-red-500 text-sm">
        {{ $message }}
    </div>
@enderror