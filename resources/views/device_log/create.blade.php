@extends("template.create")

@section("title")
    {{ ucfirst("device_log") }}
@endsection

@section("route-index")
    {{ route("device_log.index") }}
@endsection

@section("form")
    <form action="{{ route("device_log.store") }}" method="POST">
        @csrf @method("POST")
        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly>

        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">{{ ucfirst("description") }}</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="{{ "description" }}" required></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="{{ "device" }}" class="col-sm-2 col-form-label">{{ ucfirst("device") }}</label>
            <div class="col-sm-10">
                <select name="device_id" class="form-control">
                    @foreach ($global_data["device"] as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @include("components.button-submit")
    </form>
@endsection
