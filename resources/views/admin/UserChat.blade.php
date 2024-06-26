@extends('layouts.admin_layout')
@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Users Chat </h1>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            {{-- <th scope="col">Display Picture</th> --}}
            <th scope="col">Email</th>
            <th scope="col">Account Status</th>
            <th scope="col">Actions</th>
            
        </tr>
        </thead>
        <tbody>
        @if($userChat->count() > 0)
        @php
            $count = 1;
        @endphp
            @foreach ($userChat as $item)
            <tr>
                <td scope="row">{{$count ++}}</td>
                <td>{{$item->name}}</td>
                {{-- <td><img src="{{asset('/assets/media/avatar')}}/{{$item->avatar}}" alt="" class="shadow p-3 mb-5 bg-white" style="width: 50px;border-radius: 100px;"></td> --}}
                <td>{{$item->email}}</td>
                <td>
                    @if ($item->account_is_active == 1)
                        <div class="badge badge-primary">Active Account</div>
                    @else 
                    <div class="badge badge-danger">Deactive Account</div>
                    @endif
                </td>
                <td>
                    <a href="{{route('admin.chat_conv',$item->id)}}" class="btn btn-success">All Chats</a>
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
    {{$userChat->links()}}
</div>
@endsection
