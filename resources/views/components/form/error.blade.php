@props(['name'])
@error($name)
<small id="helpId" class="form-text text-muted text-red-500">{{ $message }}</small>
@enderror
