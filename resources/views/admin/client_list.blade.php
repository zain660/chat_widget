@extends('layouts.admin_layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">

        </div>
        <div class="row">
            <div class="col-10">
                <h1 class="h3 mb-0 text-gray-800">All Client App</h1>
            </div>
        </div>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">App Name</th>
                    {{-- <th scope="col">Display Picture</th> --}}
                    <th scope="col">Client Name</th>
                    <th scope="col">App Key</th>
                    <th scope="col">Website URL</th>
                    <th scope="col">Total Leads</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @if ($client_list->count() > 0)
                    @php
                        $count = 1;
                    @endphp
                    {{-- {{dd($all_user)}} --}}
                    @foreach ($client_list as $item)
                    {{-- {{dd($item)}} --}}
                        <tr>
                            <th scope="row">{{ $count++ }}</th>
                            <td>{{ $item->app_name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->app_key }}</td>
                            <td>{{ $item->website_url }}</td>
                            <td>{{ $leadsCount }}</td>
                            <td>
                                @if ($item->status == 1)
                                    <div class="badge badge-success">Active</div>
                                @else
                                    <div class="badge badge-danger">In-Active</div>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                            <td>
                                @if ($item->status == 0)
                                    <a href="{{ route('admin.client_status_active', $item->id) }}"class="btn btn-success">Activate App</a>
                                @else
                                    <a href="{{ route('admin.client_status_deactivate', $item->id) }}"class="btn btn-danger">Deactivate App</a>
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
        {{ $client_list->links() }}
    </div>

    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
    </div> --}}
@endsection
