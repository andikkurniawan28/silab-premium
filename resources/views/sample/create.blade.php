@extends("template.create")

@section("title")
    {{ ucfirst("sample") }}
@endsection

@section("route-index")
    {{ route("sample.index") }}
@endsection

@section("form")
    <form action="{{ route("sample.store") }}" method="POST">
        @csrf @method("POST")
        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly>

        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">{{ ucfirst("description") }}</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="{{ "description" }}" required></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="{{ "material" }}" class="col-sm-2 col-form-label">{{ ucfirst("material") }}</label>
            <div class="col-sm-10">
                <select name="material_id" class="form-control">
                    @foreach ($global_data["material"] as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @include("components.button-submit")
    </form>
@endsection
