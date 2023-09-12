@extends("template.create")

@section("title")
    {{ ucfirst("category") }}
@endsection

@section("route-index")
    {{ route("category.index") }}
@endsection

@section("form")
    <form action="{{ route("category.store") }}" method="POST">
        @csrf @method("POST")
        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly>
        @include("components.input1", [
            "name"      => "name",
            "type"      => "text",
            "value"     => NULL,
            "modifier"  => "required autofocus",
        ])
        @include("components.button-submit")
    </form>
@endsection
