@extends('layouts.admin_layout')
@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Messages</h1>
        <h1 class="h4 mb-0 text-gray-800">Last message: {{$chats->updated_at->diffForHumans()}}</h1>

    </div>
        <table class="table" id="message-container">
            <thead>
            <tr>
                <th>Sender</th>
                <th>Message</th>
                <th>Message time</th>
                <th>Message Contain File?</th>
                <th>File</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection


@php
    $sender_user = App\Models\User::where('id',$chats->sender_id)->first();
@endphp

@push('custom_js')
  <script>
            var reff = firebase.database().ref("user_id_{{ $chats->sender_id }}/messages/user_id_{{ $chats->reciever_id }}");
            reff.on('child_added', function(snapshot) {
  
                var image_tag = "";
                if (snapshot.val().files == "") {

                    image_tag = "";
                } else if (snapshot.val().file_type == "image") {

                    var recent_images =
                        '<div class="col-4 col-md-2 col-xl-4"><a href="#"><img src="{{ asset('/message_media') }}/' +
                        snapshot.val().files + '" class="img-fluid rounded border" alt="" style="width:90px"></a></div>';

                    $("#shared-media").append(recent_images);

                    image_tag = '<a class="popup-media" href="{{ asset('/message_media') }}/' + snapshot.val()
                        .files +
                        '"><img class="img-fluid rounded" src="{{ asset('/message_media') }}/' + snapshot.val()
                        .files +
                        '" style="width:90px"></a>';

                } else if (snapshot.val().file_type == "video") {

                    var recent_images =
                        '<div class="col-4 col-md-2 col-xl-4"><a href="#"><video class="img-fluid rounded border" width="400" controls><source src="{{ asset('/message_media') }}/' +
                        snapshot.val().files + '" type="video/mp4"><source src="{{ asset('/message_media') }}/' +
                        snapshot.val().files + '" type="video/ogg"></video></a></div>';

                    $("#shared-media").append(recent_images);

                    image_tag =
                        '   <div class="document"><div class="btn btn-primary btn-icon rounded-circle text-light mr-2"><svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg></div><div class="document-body"><h6><a href="#" class="text-reset" title="' +
                        snapshot.val().files + '">' + snapshot.val().files + '</a></h6></div></div>';

                } else if (snapshot.val().file_type == "document") {
                    var recent_docs =
                        '<li class="list-group-item"><div class="document"><div class="btn btn-primary btn-icon rounded-circle text-light mr-2"><svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg> </div><div class="document-body"><h6 class="text-truncate"><a href="#" class="text-reset" title="' +
                        snapshot.val().files + '">' + snapshot.val().files +
                        '</a></h6><ul class="list-inline small mb-0"><li class="list-inline-item"><span class="text-muted text-uppercase">docs</span></li></ul></div><div class="document-options ml-1"><div class="dropdown"><button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg> </button><div class="dropdown-menu"><a class="dropdown-item" href="{{ asset('/message_media') }}/' +
                        snapshot.val().files + '" download="{{ asset('/message_media') }}/' + snapshot.val().files +
                        '">Download</a></div></div></div></div></li>';


                    image_tag =
                        '<div class="document"><div class="btn btn-primary btn-icon rounded-circle text-light mr-2"><svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg></div><div class="document-body"><h6><a href="#" download="{{ asset('/message_media') }}/' + snapshot.val().files+'" class="text-reset" title="' +
                        snapshot.val().files + '">' + snapshot.val().files + '</a></h6></div></div>';
                    $("#shared-docs").append(recent_docs);
                } 
                    if(snapshot.val().files == ""){
                        var have_file = '<div class="badge badge-warning">No</div>';
                    }else{
                        var have_file = '<div class="badge badge-success">Yes</div>';
                    }
                    var block =
                        '<tr><th scope="row">{{$sender_user->name}}</th><td>'+snapshot.val().text+'</td><td>'+snapshot.val().date+'</td><td>'+have_file+'</td><td>'+image_tag+'</td></tr> ';

                    $("#message-container").append(block);
                    // window.scrollTo(0, document.body.scrollHeight);

 
            });
        </script>
@endpush
