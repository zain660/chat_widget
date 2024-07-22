@extends('layouts.app')

@section('content')
         <!-- Main Start -->
            <!-- Chats Page Start -->
            {{-- <main class="main"> --}}
            <div class="chats">
                <div class="d-flex flex-column justify-content-center text-center h-100 w-100">
                    <div class="container">
                        <div class="avatar avatar-lg mb-2">
                            <img class="avatar-img" src="{{asset('/assets/media/avatar')}}/{{Auth::user()->avatar ?? 'avatar.png'}}" alt="">
                        </div>
                        <h5>Welcome, {{ auth()->user()->name }}!</h5>
                        <p class="text-muted">Please select a chat to Start messaging.</p>
                        <button class="btn btn-outline-primary no-box-shadow" type="button" data-toggle="modal"
                            data-target="#startConversation">
                            Start a conversation
                        </button>
                    </div>
                </div>
            </div>
            <!-- Chats Page End -->
        {{-- </main> --}}
        {{-- @include('layouts.include.profile_tab') --}}

        <!-- Main End -->
        
        <div class="modal modal-lg-fullscreen fade" id="startConversation" tabindex="-1" role="dialog" aria-labelledby="startConversationLabel" aria-modal="fase">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="startConversationLabel">New Chat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-0 hide-scrollbar">
                    <div class="row">
                        <div class="col-12">
                            <!-- Search Start -->
                            <form class="form-inline w-100 p-2 border-bottom">
                                <div class="input-group w-100 bg-light">
                                    <input type="text" onkeyup="search_for_user()" id="username_search" class="form-control form-control-md search border-right-0 transparent-bg pr-0" placeholder="Search">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparent-bg border-left-0" role="button">
                                            <!-- Default :: Inline SVG -->
                                            <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>   
                                            
                                            <!-- Alternate :: External File link -->
                                            <!-- <img class="injectable hw-20" src="./../../assets/media/heroicons/outline/search.svg" alt=""> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Search End -->
                        </div>

                        <div class="col-12">
                                <!-- List Group Start -->
                                <ul class="list-group list-group-flush" id="new_users_list">
                                
                                <!-- List Group Item Start -->
                                <li class="list-group-item">Type name to get starting conversation...</li>
                                <!-- List Group Item End -->
 
                            </ul>
                            <!-- List Group End -->
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
@endsection

@push('custom_js')
    <script>
        function search_for_user(){
            var username_search = $('#username_search').val();
            var new_users_list = $('#new_users_list');
            if(username_search != ''){
                $.ajax({
                    
                    "type": 'get',
                    "url": '/get_users_list/'+username_search+' ',
                    
                    success:function(response){
                        console.log(response.users);
                        if(response.users != "Nousersfound"){
                            new_users_list.empty();
                            $.each(response.users, function(index, user) {
                                new_users_list.append(
                                    '<li class="list-group-item">' +
                                        '<div class="media">' +
                                            '<div class="avatar avatar-online mr-2">' +
                                                '<img src="{{asset("assets/media/avatar")}}/' + user.avatar + '" alt="">' +
                                            '</div>' +
                                            '<div class="media-body">' +
                                                '<h6 class="text-truncate">' +
                                                    '<a href="/Conversation/'+user.id+'/'+user.name+' " class="text-reset">' + user.name + '</a>' +
                                                '</h6>' +
                                            '</div>' + 
                                        '</div>' +
                                    '</li>'
                                );
                            }); 
                        }else{
                            new_users_list.empty();
                            new_users_list.append('<li class="list-group-item">Type name to get starting conversation...</li>');
                        }
                             
                    }
                    
                    
                })
            }else{
                new_users_list.html('<li class="list-group-item">Type name to get starting conversation...</li>');
            }
        }
    </script>
@endpush