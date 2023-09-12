@extends("template.create")

@section("title")
    {{ ucfirst("vendor") }}
@endsection

@section("route-index")
    {{ route("vendor.index") }}
@endsection

@section("form")
    <form action="{{ route("vendor.store") }}" method="POST">
        @csrf @method("POST")
        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly>
        @include("components.input1", [
            "name"      => "name",
            "type"      => "text",
            "value"     => NULL,
            "modifier"  => "required autofocus",
        ])
        @include("components.input1", [
            "name"      => "email",
            "type"      => "email",
            "value"     => NULL,
            "modifier"  => "required",
        ])
        @include("components.input1", [
            "name"      => "phone",
            "type"      => "text",
            "value"     => NULL,
            "modifier"  => "required",
        ])
        @include("components.button-submit")
    </form>
@endsection
