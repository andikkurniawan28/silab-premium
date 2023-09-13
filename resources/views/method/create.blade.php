@extends("template.create")

@section("title")
    {{ ucfirst("method") }}
@endsection

@section("route-index")
    {{ route("method.index") }}
@endsection

@section("form")
    <form action="{{ route("method.store") }}" method="POST">
        @csrf @method("POST")
        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly>
        @include("components.input1", [
            "name"      => "name",
            "type"      => "text",
            "value"     => NULL,
            "modifier"  => "required autofocus",
        ])
        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">{{ ucfirst("description") }}</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="{{ "description" }}" required></textarea>
            </div>
        </div>
        @include("components.button-submit")
    </form>
@endsection
