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
                            <th scope="col">Name<span style="color: red">*</span></th>
                            <th scope="col">Category<span style="color: red">*</span></th>
                            <th scope="col">Description<span style="color: red">*</span></th>
                            <th scope="col">Price<span style="color: red">*</span></th>
                            <th scope="col">Image url<span style="color: red">*</span></th>
                            <th scope="col">Stock<span style="color: red">*</span></th>
                            <th scope="col">Discount(out of 100%)<span style="color: red">*</span></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('admin.products.store') }}" method="POST">
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
                                    <select name="category_id" class="form-select" aria-label="Default select example">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    {{-- <input type="text" name="description" class="form-control" required> --}}
                                    <textarea name="description" class="form-control" rows="3" required></textarea>

                                    @error('description')
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
                                    <textarea name="image_url" class="form-control" rows="3" required></textarea>
                                    @error('image_url')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" name="stock" min="0" class="form-control" required>
                                    @error('stock')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="number" name="discount" class="form-control" required>
                                    @error('discount')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-primary" value="Add Category">
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
