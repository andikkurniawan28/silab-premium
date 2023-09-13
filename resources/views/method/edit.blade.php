@extends("template.edit")

@section("title")
    {{ ucfirst("method") }}
@endsection

@section("route-index")
    {{ route("method.index") }}
@endsection

@section("form")
    <form action="{{ route("method.update", $data->id) }}" method="POST">
        @csrf @method("PUT")
        @include("components.input1", [
            "name"      => "name",
            "type"      => "text",
            "value"     => $data->name,
            "modifier"  => "required autofocus",
        ])
        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">{{ ucfirst("description") }}</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="{{ "description" }}" required>{{ $data->description }}</textarea>
            </div>
        </div>
        @include("components.button-submit")
    </form>
@endsection
