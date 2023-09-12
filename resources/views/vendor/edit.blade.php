@extends("template.edit")

@section("title")
    {{ ucfirst("vendor") }}
@endsection

@section("route-index")
    {{ route("vendor.index") }}
@endsection

@section("form")
    <form action="{{ route("vendor.update", $data->id) }}" method="POST">
        @csrf @method("PUT")
        @include("components.input1", [
            "name"      => "name",
            "type"      => "text",
            "value"     => $data->name,
            "modifier"  => "required autofocus",
        ])
        @include("components.input1", [
            "name"      => "email",
            "type"      => "email",
            "value"     => $data->email,
            "modifier"  => "required",
        ])
        @include("components.input1", [
            "name"      => "phone",
            "type"      => "text",
            "value"     => $data->phone,
            "modifier"  => "required",
        ])
        @include("components.button-submit")
    </form>
@endsection
