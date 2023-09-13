@extends("template.index")

@section("title")
    {{ ucfirst("material") }}
@endsection

@section("route-create")
    {{ route("material.create") }}
@endsection

@section("thead")
    <tr>
        <th>{{ strtoupper("id") }}</th>
        <th>{{ ucfirst("name") }}</th>
        <th>{{ ucfirst("category") }}</th>
        <th>{{ ucfirst("action") }}</th>
    </tr>
@endsection

@section("tbody")
    @foreach($data as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->name }}</td>
        <td><a href="{{ route("category.show", $data->category_id) }}" target="_blank">{{ $data->category->name }}</a></td>
        <td>
            <form action="{{ route("material.destroy", $data->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <div class="btn-group" role="group" aria-label="{{ ucfirst("action") }}">
                    <a href="{{ route("material.show", $data->id) }}" type="button" class="btn btn-info btn-sm">{{ ucfirst("show") }}</a>
                    <a href="{{ route("material.edit", $data->id) }}" type="button" class="btn btn-success btn-sm">{{ ucfirst("edit") }}</a>
                    <button type="submit" class="btn btn-danger btn-sm">{{ ucfirst("delete") }}</button>
                </div>
            </form>
        </td>
    </tr>
    @endforeach
@endsection
