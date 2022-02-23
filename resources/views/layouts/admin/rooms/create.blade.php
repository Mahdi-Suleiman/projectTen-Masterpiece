@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Room name<span style="color: red">*</span></th>
                            <th scope="col">Room description<span style="color: red">*</span></th>
                            <th scope="col">Image URL<span style="color: red">*</span></th>
                            <th scope="col">Room price<span style="color: red">*</span></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('admin.rooms.store') }}" method="POST">
                            @csrf
                            @method('post')
                            <tr>
                                <td>
                                    <input type="text" name="name" class="form-control" required>
                                    @error('name')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    {{-- <input type="text" name="description" class="form-control" required> --}}
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea3"
                                        rows="2" required></textarea>

                                    @error('description')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" name="image_url" class="form-control" required>
                                    @error('image_url')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" step="0.01" name="price" class="form-control" min="1" required>
                                    @error('price')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-primary" value="Add Room">
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
