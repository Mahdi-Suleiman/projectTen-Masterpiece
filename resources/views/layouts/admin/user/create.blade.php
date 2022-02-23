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
                            <th scope="col">Email<span style="color: red">*</span></th>
                            <th scope="col">Password<span style="color: red">*</span></th>
                            <th scope="col">Mobile Number <small style="color: red">optional</small></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('admin.users.store') }}" method="POST">
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
                                    <input type="email" name="email" class="form-control" required>
                                    @error('email')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="password" name="password" class="form-control" minlength="8" required>
                                    @error('password')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="tel" name="mobile_number" class="form-control" maxlength="10">
                                    @error('mobile_number')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-primary" value="Add user">
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
