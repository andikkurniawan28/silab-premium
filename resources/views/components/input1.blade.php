<div class="row mb-3">
    <label for="{{ $name }}" class="col-sm-2 col-form-label">{{ ucfirst($name) }}</label>
    <div class="col-sm-10">
        <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" {{ $modifier }}>
    </div>
</div>
