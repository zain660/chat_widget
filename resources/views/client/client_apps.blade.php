@extends('layouts.client_layout')
@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-10">
                <div class="row">
                    <div class="col-10">
                        <h1 class="h3 mb-0 text-gray-800">Apps & Api Keys</h1>
                    </div>
                    <div class="col-2">
                        <a href="{{route('client.create_app')}}" class="btn btn-primary">Create Key</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card py-4">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">App name</th>
                            <th scope="col">Registered Website</th>
                            <th scope="col">App key</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($apps->count() > 0)
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($apps as $app)
                                <tr>
                                    <th scope="row">{{ $count++ }}</th>
                                    <td>{{ $app->app_name }}</td>
                                    <td>{{ $app->website_url }}</td>
                                    <td>{{ $app->app_key }}</td>
                                    <td>
                                        @if ($app->status == 0)
                                            <div class="badge badge-success">Active</div>
                                        @else
                                            <div class="badge badge-danger">DeActivated</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($app->status == 0)
                                            <a class="btn btn-danger">DeActivat this key</a>
                                        @else
                                            <div class="btn btn-success">Activat this key</div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
