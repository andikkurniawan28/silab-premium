@extends("template.edit")

@section("title")
    {{ ucfirst("consumable_log") }}
@endsection

@section("route-index")
    {{ route("consumable_log.index") }}
@endsection

@section("form")
    <form action="{{ route("consumable_log.update", $data->id) }}" method="POST">
        @csrf @method("PUT")

        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly>

        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">{{ ucfirst("description") }}</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="{{ "description" }}" required>{{ $data->description }}</textarea>
            </div>
        </div>

        @include("components.input1", [
            "name"      => "quantity",
            "type"      => "number",
            "value"     => $data->quantity,
            "modifier"  => "required",
        ])

        <div class="row mb-3">
            <label for="{{ "consumable" }}" class="col-sm-2 col-form-label">{{ ucfirst("consumable") }}</label>
            <div class="col-sm-10">
                <select name="consumable_id" class="form-control">
                    @foreach ($global_data["consumable"] as $row)
                        <option value="{{ $row->id }}"
                            @if($row->id == $data->consumable_id)
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
