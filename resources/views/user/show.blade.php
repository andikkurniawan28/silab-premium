@extends("template.show")

@section("title")
    {{ ucfirst("user") }}
@endsection

@section("route-index")
    {{ route("user.index") }}
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
        "name"      => "username",
        "type"      => "text",
        "value"     => $data->username,
        "modifier"  => "readonly",
    ])

    @include("components.input1", [
        "name"      => "role",
        "type"      => "text",
        "value"     => $data->role->name,
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
