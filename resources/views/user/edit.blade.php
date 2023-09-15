@extends("template.edit")

@section("title")
    {{ ucfirst("user") }}
@endsection

@section("route-index")
    {{ route("user.index") }}
@endsection

@section("form")
    <form action="{{ route("user.update", $data->id) }}" method="POST">
        @csrf @method("PUT")

        {{-- <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly> --}}

        @include("components.input1", [
            "name"      => "name",
            "type"      => "text",
            "value"     => $data->name,
            "modifier"  => "required autofocus",
        ])

        @include("components.input1", [
            "name"      => "username",
            "type"      => "text",
            "value"     => $data->username,
            "modifier"  => "required",
        ])

        <div class="row mb-3">
            <label for="{{ "role" }}" class="col-sm-2 col-form-label">{{ ucfirst("role") }}</label>
            <div class="col-sm-10">
                <select name="role_id" class="form-control">
                    @foreach ($global_data["role"] as $row)
                        <option value="{{ $row->id }}"
                            @if($row->id == $data->role_id)
                                {{ "selected" }}
                            @endif
                        >{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @include("components.input1", [
            "name"      => "is_active",
            "type"      => "number",
            "value"     => $data->is_active,
            "modifier"  => "required",
        ])

        @include("components.button-submit")
    </form>
@endsection
