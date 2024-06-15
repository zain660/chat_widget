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
               <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#exampleModal">Create User</button>
           </div>
       </div>
       <br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Display Picture</th>
            <th scope="col">Email</th>
            <th scope="col">Account Status</th>
            <th scope="col">Actions</th>
            
        </tr>
        </thead>
        <tbody>
        @if($all_user->count() > 0)
        @php
            $count = 1;
        @endphp
            @foreach ($all_user as $item)
            <tr>
                <th scope="row">{{$count ++}}</th>
                <td>{{$item->name}}</td>
                <td><img src="{{asset('/assets/media/avatar')}}/{{$item->avatar}}" alt="" class="shadow p-3 mb-5 bg-white" style="width: 50px;border-radius: 100px;"></td>
                <td>{{$item->email}}</td>
                <td>
                    @if ($item->account_is_active == 1)
                        <div class="badge badge-primary">Active Account</div>
                    @else 
                    <div class="badge badge-danger">Deactive Account</div>
                    @endif
                </td>
                <td>
                @if ($item->account_is_active == 1)
                    <a href="{{route('admin.deactive_user',$item->id)}}"class="btn btn-danger">Deactive Account</a>
                @else 
                <a href="{{route('admin.active_user',$item->id)}}" class="btn btn-success">Active Account</a>
                @endif
                </td>
            </tr> 
            @endforeach

            {{$all_user->links()}}
            @else
            <tr>
                <td>No data found.</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('admin.create_user')}}" enctype="multipart/form-data">
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
                
                <div class="alert alert-info">User default password is <strong>"12345678"</strong> User can change it any time after login</div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create user</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
