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
                            <th scope="col">Email</th>
                            <th scope="col">New Password</th>
                            <th scope="col">Mobile #</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('admin.users.update', $user) }}" method="POST">
                            @csrf
                            @method('put')
                            <tr>
                                <td>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                        required>
                                    @error('name')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                        readonly>
                                    @error('email')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="password" name="password" class="form-control" minlength="8">
                                    @error('password')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="tel" name="mobile_number" class="form-control" maxlength="10"
                                        value="{{ $user->mobile_number }}">
                                    @error('mobile_number')
                                        <span class="badge" style="color: red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-success" value="Edit user">
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
