@extends('layouts.admin.app')
@section('content')
    {{-- reports --}}
    <div class="container-fluid pt-4 px-4">

        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">

                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    {{-- <i class="fa fa-chart-line fa-3x text-primary"></i> --}}
                    {{-- <i class="fa fa-tachometer-alt me-2 fa-3x text-primary"></i> --}}
                    {{-- <i class="fa fa-ticket fa-3x text-primary"></i> --}}
                    {{-- <i class="fas fa-ticket-alt me-2 fa-3x text-primary"></i> --}}
                    <a class="nav-item nav-link">
                        <i class="fas fa-calendar-check me-2 fa-3x text-primary"></i>
                    </a>
                    <div class="ms-3">
                        <p class="mb-2">Total Orders</p>
                        {{-- <h6 class="mb-0">{{ $totalCount }}</h6> --}}
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">

                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <a href="{{ route('admin.users') }}" class="nav-item nav-link">
                        {{-- <i class="fa fa-chart-bar fa-3x text-primary"></i> --}}
                        <i class="fas fa-users me-2 fa-3x text-primary"></i>
                    </a>
                    <div class="ms-3">
                        <p class="mb-2">Registered Users</p>
                        <h6 class="mb-0">{{ $allUsers }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">

                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <a href="{{ route('admin.categories.index') }}" class="nav-item nav-link">
                        <i class="fa fa-table me-2 fa-3x text-primary"></i>
                    </a>
                    <div class="ms-3">
                        <p class="mb-2">Total Categories</p>
                        <h6 class="mb-0">{{ $allCategories }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">

                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <a href="{{ route('admin.products.index') }}" class="nav-item nav-link ">
                        <i class="fa fa-address-book me-2 fa-3x text-primary"></i>
                    </a>
                    <div class="ms-3">
                        <p class="mb-2">Total Products</p>
                        <h6 class="mb-0">{{ $allProducts }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Orders --}}
    <div class="container-fluid pt-4 px-4">

        <div class="bg-light text-center rounded p-4">
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                            {{-- <th></th> --}}
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Table Number</th>
                            <th scope="col">Mobile Number</th>
                            <th scope="col">Guest Number</th>
                            <th scope="col">Date</th>
                            <th scope="col">time</th>
                            <th scope="col">status</th>
                            <th scope="col">Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($users as $user)
                        @foreach ($user->tables as $table)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>
                                    <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                                </td>
                                <td>{{$table->number}}</td>
                                <td>{{$table->pivot->mobile_number}}</td>
                                <td>{{$table->pivot->guest_number}}</td>
                                <td>{{$table->pivot->date}}</td>
                                <td>{{$table->pivot->time}}</td>
                                <td>
                                    <form action="{{URL::to('/admin/dashboard/' . $table->pivot->user_id . '/update/' . $table->pivot->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <select class="form-select" name="status" onchange="this.form.submit()">
                                            <option value="{{$table->pivot->status}}">{{$table->pivot->status}}</option>

                                            @foreach ($allStatus as $status)
                                                @if ($status == $table->pivot->status)
                                                    @php
                                                        continue
                                                    @endphp
                                                @endif
                                            <option value="{{$status}}">{{$status}}</option>
                                            @endforeach

                                        </select>

                                        <input type="hidden" name="user_id" value="{{$table->pivot->user_id}}">
                                        <input type="hidden" name="table_id" value="{{$table->pivot->table_id}}">
                                        <input type="hidden" name="mobile_number" value="{{$table->pivot->mobile_number}}">
                                        <input type="hidden" name="guest_number" value="{{$table->pivot->guest_number}}">
                                        <input type="hidden" name="date" value="{{$table->pivot->date}}">
                                        <input type="hidden" name="time" value="{{$table->pivot->time}}">
                                        <input type="hidden" name="note" value="{{$table->pivot->note}}">

                                    </form>
                                </td>
                                <td>
                                    <textarea class="form-control" id="exampleFormControlTextarea3" rows="3" readonly>{{$table->pivot->note}}</textarea>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
