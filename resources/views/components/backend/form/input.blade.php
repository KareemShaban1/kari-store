@props([
    'type' => 'text',
    'name',
    'value' => '',
    'label',
    'class' => 'form-control',
])



<label>{{ $label }}<span class="text-danger">*</span></label>
<input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" class="{{ $class }}">
@error($name)
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
