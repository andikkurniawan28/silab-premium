@extends("template.show")

@section("title")
    {{ ucfirst("consumable_log") }}
@endsection

@section("route-index")
    {{ route("consumable_log.index") }}
@endsection

@section("form")

    @include("components.input1", [
        "name"      => "ID",
        "type"      => "text",
        "value"     => $data->id,
        "modifier"  => "readonly",
    ])

    <div class="row mb-3">
        <label for="description" class="col-sm-2 col-form-label">{{ ucfirst("description") }}</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="{{ "description" }}" readonly>{{ $data->description }}</textarea>
        </div>
    </div>

    @include("components.input1", [
        "name"      => "quantity",
        "type"      => "number",
        "value"     => $data->quantity,
        "modifier"  => "readonly",
    ])

    @include("components.input1", [
        "name"      => "consumable",
        "type"      => "text",
        "value"     => $data->consumable->name,
        "modifier"  => "readonly",
    ])

    @include("components.input1", [
        "name"      => "user",
        "type"      => "text",
        "value"     => $data->user->name,
        "modifier"  => "readonly",
    ])

    @include("components.input1", [
        "name"      => "created_at",
        "type"      => "text",
        "value"     => $data->created_at,
        "modifier"  => "readonly",
    ])

    @include("components.input1", [
        "name"      => "updated_at",
        "type"      => "text",
        "value"     => $data->updated_at,
        "modifier"  => "readonly",
    ])

@endsection
