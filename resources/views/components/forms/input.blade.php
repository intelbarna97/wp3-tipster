<div class="mb-3">
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    @if ($label)
    
    <label for="{{ $name }}">
        {{ $label }}
    </label>

    @endif
    <input 
    class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}"
    type="{{ $type }}" 
    name="{{ $name }}" 
    value="{{ old($name, $value) }}">
    @if ($errors->has($name))
        <p class="invalid-feedback">
            {{$errors->first($name)}} </p>
    @endif
</div>