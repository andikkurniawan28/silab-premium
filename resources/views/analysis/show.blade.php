@extends("template.show")

@section("title")
    {{ ucfirst("analysis") }}
@endsection

@section("route-index")
    {{ route("analysis.index") }}
@endsection

@section("form")

    @include("components.input1", [
        "name"      => "ID",
        "type"      => "text",
        "value"     => $data->id,
        "modifier"  => "readonly",
    ])

    @include("components.input1", [
        "name"      => "sample_id",
        "type"      => "text",
        "value"     => $data->sample_id,
        "modifier"  => "readonly",
    ])

    @include("components.input1", [
        "name"      => "material",
        "type"      => "text",
        "value"     => $data->sample->material->name,
        "modifier"  => "readonly",
    ])

    @include("components.input1", [
        "name"      => "indicator",
        "type"      => "text",
        "value"     => $data->indicator->name,
        "modifier"  => "readonly",
    ])

    @include("components.input1", [
        "name"      => "value",
        "type"      => "text",
        "value"     => $data->value,
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
