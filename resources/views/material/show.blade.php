@extends("template.show")

@section("title")
    {{ ucfirst("material") }}
@endsection

@section("route-index")
    {{ route("material.index") }}
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
        "name"      => "category",
        "type"      => "text",
        "value"     => $data->category->name,
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
