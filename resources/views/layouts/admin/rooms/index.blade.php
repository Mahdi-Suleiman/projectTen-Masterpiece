@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="table-responsive">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image url</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $room->name }}</td>
                                <td>{{ $room->description }}</td>
                                <td>{{ $room->image_url }}</td>
                                <td>{{ $room->price }}</td>
                                <td>
                                    <form action="{{ route('admin.rooms.edit', $room) }}" method="post">
                                        @csrf
                                        @method('get')
                                        <input type="submit" class="btn btn-success" value="Edit">
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="post"
                                        onsubmit="return confirm('are you sure ?')">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
