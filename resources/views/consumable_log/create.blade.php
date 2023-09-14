@extends("template.create")

@section("title")
    {{ ucfirst("consumable_log") }}
@endsection

@section("route-index")
    {{ route("consumable_log.index") }}
@endsection

@section("form")
    <form action="{{ route("consumable_log.store") }}" method="POST">
        @csrf @method("POST")
        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly>

        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">{{ ucfirst("description") }}</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="{{ "description" }}" required></textarea>
            </div>
        </div>

        @include("components.input1", [
            "name"      => "quantity",
            "type"      => "number",
            "value"     => NULL,
            "modifier"  => "required",
        ])

        <div class="row mb-3">
            <label for="{{ "consumable" }}" class="col-sm-2 col-form-label">{{ ucfirst("consumable") }}</label>
            <div class="col-sm-10">
                <select name="consumable_id" class="form-control">
                    @foreach ($global_data["consumable"] as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @include("components.button-submit")
    </form>
@endsection
