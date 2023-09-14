@extends("template.index")

@section("title")
    {{ ucfirst("consumable_log") }}
@endsection

@section("route-create")
    {{ route("consumable_log.create") }}
@endsection

@section("thead")
    <tr>
        <th>{{ strtoupper("id") }}</th>
        <th>{{ ucfirst("description") }}</th>
        <th>{{ ucfirst("quantity") }}</th>
        <th>{{ ucfirst("consumable") }}</th>
        <th>{{ ucfirst("action") }}</th>
    </tr>
@endsection

@section("tbody")
    @foreach($data as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->description }}</td>
        <td>{{ $data->quantity }}</td>
        <td><a href="{{ route("consumable.show", $data->consumable_id) }}" target="_blank">{{ $data->consumable->name }}</a></td>
        <td>
            <form action="{{ route("consumable_log.destroy", $data->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <div class="btn-group" role="group" aria-label="{{ ucfirst("action") }}">
                    <a href="{{ route("consumable_log.show", $data->id) }}" type="button" class="btn btn-info btn-sm">{{ ucfirst("show") }}</a>
                    <a href="{{ route("consumable_log.edit", $data->id) }}" type="button" class="btn btn-success btn-sm">{{ ucfirst("edit") }}</a>
                    <button type="submit" class="btn btn-danger btn-sm">{{ ucfirst("delete") }}</button>
                </div>
            </form>
        </td>
    </tr>
    @endforeach
@endsection
