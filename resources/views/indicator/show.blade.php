@extends("template.show")

@section("title")
    {{ ucfirst("indicator") }}
@endsection

@section("route-index")
    {{ route("indicator.index") }}
@endsection

@section("form")

    @include("components.input1", [
        "name"      => "ID",
        "type"      => "text",
        "value"     => $data->id,
        "modifier"  => "readonly",
    ])

    @include("components.input1", [
        "name"      => "name",
        "type"      => "text",
        "value"     => $data->name,
        "modifier"  => "readonly",
    ])

    @include("components.input1", [
        "name"      => "unit",
        "type"      => "text",
        "value"     => $data->unit,
        "modifier"  => "readonly",
    ])

    @include("components.input1", [
        "name"      => "device",
        "type"      => "text",
        "value"     => $data->device->name,
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
