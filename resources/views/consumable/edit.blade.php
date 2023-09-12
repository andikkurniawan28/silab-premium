@extends("template.edit")

@section("title")
    {{ ucfirst("consumable") }}
@endsection

@section("route-index")
    {{ route("consumable.index") }}
@endsection

@section("form")
    <form action="{{ route("consumable.update", $data->id) }}" method="POST">
        @csrf @method("PUT")

        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" readonly>

        @include("components.input1", [
            "name"      => "name",
            "type"      => "text",
            "value"     => $data->name,
            "modifier"  => "required autofocus",
        ])

        <div class="row mb-3">
            <label for="{{ "vendor" }}" class="col-sm-2 col-form-label">{{ ucfirst("vendor") }}</label>
            <div class="col-sm-10">
                <select name="vendor_id" class="form-control">
                    @foreach ($global_data["vendor"] as $row)
                        <option value="{{ $row->id }}"
                            @if($row->id == $data->vendor_id)
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
