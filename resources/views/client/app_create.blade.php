@extends('layouts.client_layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-10">
                <h1 class="h3 mb-0 text-gray-800">Create App</h1>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Create App</h3>
            </div>
            <div class="card-body">
                <form action="{{route('client.store_app')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="app_name">App name</label>
                            <input type="text" name="app_name" required class="form-control">
                        </div> 
                        <div class="col-6">
                            <label for="website_url">Website Url</label>
                            <input type="url" name="website_url" required class="form-control">
                        </div>
                       
                    </div>
                    <br>
                    <div class="col-6">
                        <button class="btn btn-primary">Create App</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
