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
                            {{-- $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->text('description');
            $table->float('price');
            $table->text('image_url');
            $table->integer('stock');
            $table->float('discount')->nullable(); --}}
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image url</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Discount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($products as $product)
                            <tr>
                                {{-- {{ dd($product->category) }} --}}
                                <td>{{ ++$i }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->image_url }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->discount }}</td>
                                <td>
                                    <form action="{{ route('admin.products.edit', $product) }}" method="post">
                                        @csrf
                                        @method('get')
                                        <input type="submit" class="btn btn-success" value="Edit">
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="post"
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
