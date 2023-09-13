@extends("template.edit")

@section("title")
    {{ ucfirst("indicator") }}
@endsection

@section("route-index")
    {{ route("indicator.index") }}
@endsection

@section("form")
    <form action="{{ route("indicator.update", $data->id) }}" method="POST">
        @csrf @method("PUT")

        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly>

        @include("components.input1", [
            "name"      => "name",
            "type"      => "text",
            "value"     => $data->name,
            "modifier"  => "required autofocus",
        ])

        @include("components.input1", [
            "name"      => "unit",
            "type"      => "text",
            "value"     => $data->unit,
            "modifier"  => "required",
        ])

        <div class="row mb-3">
            <label for="{{ "device" }}" class="col-sm-2 col-form-label">{{ ucfirst("device") }}</label>
            <div class="col-sm-10">
                <select name="device_id" class="form-control">
                    @foreach ($global_data["device"] as $row)
                        <option value="{{ $row->id }}"
                            @if($row->id == $data->device_id)
                                {{ "selected" }}
                            @endif
                        >{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="{{ "method" }}" class="col-sm-2 col-form-label">{{ ucfirst("method") }}</label>
            <div class="col-sm-10">
                <select name="method_id" class="form-control">
                    @foreach ($global_data["method"] as $row)
                        <option value="{{ $row->id }}"
                            @if($row->id == $data->method_id)
                                {{ "selected" }}
                            @endif
                        >{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @include("components.button-submit")
    </form>
@endsection
