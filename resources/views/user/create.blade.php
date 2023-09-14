@extends("template.create")

@section("title")
    {{ ucfirst("user") }}
@endsection

@section("route-index")
    {{ route("user.index") }}
@endsection

@section("form")
    <form action="{{ route("user.store") }}" method="POST">
        @csrf @method("POST")
        {{-- <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly> --}}

        @include("components.input1", [
            "name"      => "name",
            "type"      => "text",
            "value"     => NULL,
            "modifier"  => "required autofocus",
        ])

        @include("components.input1", [
            "name"      => "username",
            "type"      => "text",
            "value"     => NULL,
            "modifier"  => "required",
        ])

        @include("components.input1", [
            "name"      => "password",
            "type"      => "password",
            "value"     => NULL,
            "modifier"  => "required",
        ])

        <div class="row mb-3">
            <label for="{{ "role" }}" class="col-sm-2 col-form-label">{{ ucfirst("role") }}</label>
            <div class="col-sm-10">
                <select name="role_id" class="form-control">
                    @foreach ($global_data["role"] as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @include("components.button-submit")
    </form>
@endsection
