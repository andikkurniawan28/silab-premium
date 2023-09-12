@extends("template.edit")

@section("title")
    {{ ucfirst("category") }}
@endsection

@section("route-index")
    {{ route("category.index") }}
@endsection

@section("form")
    <form action="{{ route("category.update", $data->id) }}" method="POST">
        @csrf @method("PUT")
        @include("components.input1", [
            "name"      => "name",
            "type"      => "text",
            "value"     => $data->name,
            "modifier"  => "required autofocus",
        ])
        @include("components.button-submit")
    </form>
@endsection
