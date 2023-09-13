@extends("template.edit")

@section("title")
    {{ ucfirst("analysis") }}
@endsection

@section("route-index")
    {{ route("analysis.index") }}
@endsection

@section("form")
    <form action="{{ route("analysis.update", $data->id) }}" method="POST">
        @csrf @method("PUT")
        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly>

        @include("components.input1", [
            "name"      => "sample_id",
            "type"      => "number",
            "value"     => $data->sample_id,
            "modifier"  => "required autofocus",
        ])

        <div class="row mb-3">
            <label for="{{ "indicator" }}" class="col-sm-2 col-form-label">{{ ucfirst("indicator") }}</label>
            <div class="col-sm-10">
                <select name="indicator_id" class="form-control">
                    @foreach ($global_data["indicator"] as $row)
                        <option value="{{ $row->id }}"
                            @if($row->id == $data->indicator_id)
                                {{ "selected" }}
                            @endif
                        >{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @include("components.input1", [
            "name"      => "value",
            "type"      => "number",
            "value"     => $data->value,
            "modifier"  => "required",
        ])

        @include("components.button-submit")
    </form>
@endsection
