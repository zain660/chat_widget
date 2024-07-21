@extends('layouts.admin_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">

        </div>
        <div class="row">
            <div class="col-10">
                <h1 class="h3 mb-0 text-gray-800">All Users</h1>
            </div>
            <div class="col-2 d-flex justify-content-start">
                <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#exampleModal">Create
                    Agents</button>
            </div>
        </div>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    {{-- <th scope="col">Display Picture</th> --}}
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Account Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($all_user->count() > 0)
                    @php
                        $count = 1;
                    @endphp
                    {{-- {{dd($all_user)}} --}}
                    @foreach ($all_user as $item)
                    {{-- {{dd($item)}} --}}
                        <tr>
                            <th scope="row">{{ $count++ }}</th>
                            <td>{{ $item->name }}</td>
                            {{-- <td><img src="{{ asset('/assets/media/avatar') }}/{{ $item->avatar }}" alt=""
                                    class="shadow p-3 mb-5 bg-white" style="width: 50px;border-radius: 100px;"></td> --}}
                            <td>{{ $item->email }}</td>
                            {{-- {{dd($item->role)}} --}}
                            <td>
                                @if ($item->role == 'client')
                                <div class="badge badge-dark">Client</div>
                                @else
                                <div class="badge badge-primary">Agent</div>
                                @endif
                            </td>
                            <td>
                                @if ($item->account_is_active == 1)
                                    <div class="badge badge-success">Active</div>
                                @else
                                    <div class="badge badge-danger">Deactive</div>
                                @endif
                            </td>
                            <td>
                                @if ($item->account_is_active == 1)
                                    <a href="{{ route('admin.deactive_user', $item->id) }}"class="btn btn-danger">Deactivate
                                        Account</a>
                                @else
                                    <a href="{{ route('admin.active_user', $item->id) }}" class="btn btn-success">Activate
                                        Account</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>No data found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $all_user->links() }}
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.create_user') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <label>Name</label>
                            <input type="text" required class="form-control" name="name" placeholder="User full name">

                            <br>
                            <label>Email</label>
                            <input type="text" required class="form-control" name="email" placeholder="User email">
                            <br>

                            <label>Phone</label>
                            <input type="text" required class="form-control" name="phone" placeholder="User Phone">
                            <br>

                            <label>User avatar (Optional)</label>
                            <input type="file" class="form-control" name="avatar" placeholder="User Phone">
                            <br>

                            <div class="alert alert-info">User default password is <strong>"12345678"</strong> User can
                                change it any time after login</div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Agent</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
