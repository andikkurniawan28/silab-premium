@extends("template.edit")

@section("title")
    {{ ucfirst("material") }}
@endsection

@section("route-index")
    {{ route("material.index") }}
@endsection

@section("form")
    <form action="{{ route("material.update", $data->id) }}" method="POST">
        @csrf @method("PUT")

        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly>

        @include("components.input1", [
            "name"      => "name",
            "type"      => "text",
            "value"     => $data->name,
            "modifier"  => "required autofocus",
        ])

        <div class="row mb-3">
            <label for="{{ "category" }}" class="col-sm-2 col-form-label">{{ ucfirst("category") }}</label>
            <div class="col-sm-10">
                <select name="category_id" class="form-control">
                    @foreach ($global_data["category"] as $row)
                        <option value="{{ $row->id }}"
                            @if($row->id == $data->category_id)
                                {{ "selected" }}
                            @endif
                        >{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @include("components.button-submit")
    </form>
@endsection
