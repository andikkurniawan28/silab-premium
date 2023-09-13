@extends("template.create")

@section("title")
    {{ ucfirst("analysis") }}
@endsection

@section("route-index")
    {{ route("analysis.index") }}
@endsection

@section("form")
    <form action="{{ route("analysis.store") }}" method="POST">
        @csrf @method("POST")
        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly>

        @include("components.input1", [
            "name" => "sample_id",
            "type" => "number",
            "value" => NULL,
            "modifier" => "required autofocus",
        ])

        <div class="row mb-3">
            <label for="{{ "indicator" }}" class="col-sm-2 col-form-label">{{ ucfirst("indicator") }}</label>
            <div class="col-sm-10">
                <select name="indicator_id" class="form-control">
                    @foreach ($global_data["indicator"] as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @include("components.input1", [
            "name" => "value",
            "type" => "number",
            "value" => NULL,
            "modifier" => "required",
        ])

        @include("components.button-submit")
    </form>
@endsection
