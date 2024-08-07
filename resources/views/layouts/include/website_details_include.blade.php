   <!-- Sidebar Start -->
   <aside class="sidebar">
    <!-- Tab Content Start -->
    <div class="tab-content">
        <!-- Chat Tab Content Start -->
        <div class="tab-pane active" id="chats-content">
            <div class="d-flex flex-column h-100">
                <div class="hide-scrollbar h-100" id="chatContactsList">

                    <!-- Chat Header Start -->
                    <div class="sidebar-header sticky-top p-2">

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Chat Tab Pane Title Start -->
                            <h5 class="font-weight-semibold mb-0">Chats</h5>
                            <!-- Chat Tab Pane Title End -->

                            <ul class="nav flex-nowrap">

                                <li class="nav-item list-inline-item mr-1">
                                    <a class="nav-link text-muted px-1" href="#" title="Notifications"
                                        role="button" data-toggle="modal" data-target="#notificationModal">
                                        <!-- Default :: Inline SVG -->
                                        <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                            </path>
                                        </svg>

                                        <!-- Alternate :: External File link -->
                                        <!-- <img src="./../assets/media/heroicons/outline/bell.svg" alt="" class="injectable hw-20"> -->
                                    </a>
                                </li>

                                <li class="nav-item list-inline-item mr-0">
                                    <div class="dropdown">
                                        <a class="nav-link text-muted px-1" href="#" role="button"
                                            title="Details" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <!-- Default :: Inline SVG -->
                                            <svg class="hw-20" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                </path>
                                            </svg>

                                            <!-- Alternate :: External File link -->
                                            <!-- <img src="./../assets/media/heroicons/outline/dots-vertical.svg" alt="" class="injectable hw-20"> -->
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">

                                            <a class="dropdown-item" href="#" role="button"
                                                data-toggle="modal" data-target="#createGroup">Create
                                                Group</a>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>


                        <!-- Sidebar Header Start -->
                        <div class="sidebar-sub-header">
                            <!-- Sidebar Header Dropdown Start -->
                            <div class="dropdown mr-2">
                                <!-- Dropdown Button Start -->
                                <button class="btn btn-outline-default dropdown-toggle" type="button"
                                    data-chat-filter-list="" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    All Chats
                                </button>
                                <!-- Dropdown Button End -->

                                <!-- Dropdown Menu Start -->
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" data-chat-filter="" data-select="all-chats"
                                        href="#">All Chats</a>

                                    <a class="dropdown-item" data-chat-filter="" data-select="groups"
                                        href="#">Groups</a>

                                </div>
                                <!-- Dropdown Menu End -->
                            </div>
                            <!-- Sidebar Header Dropdown End -->

                            <!-- Sidebar Search Start -->
                            <form class="form-inline">
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control search border-right-0 transparent-bg pr-0"
                                        placeholder="Search users...">
                                    <div class="input-group-append">
                                        <div class="input-group-text transparent-bg border-left-0" role="button">
                                            <!-- Default :: Inline SVG -->
                                            <svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>

                                            <!-- Alternate :: External File link -->
                                            <!-- <img class="injectable hw-20" src="./../assets/media/heroicons/outline/search.svg" alt=""> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Sidebar Search End -->
                        </div>
                        <!-- Sidebar Header End -->
                    </div>
                    <!-- Chat Header End -->
                     
                    <!-- Chat Contact List Start -->
                    <ul class="contacts-list" id="chatContactTab" data-chat-list="">
                        <!-- Chat Item Start -->
                        @if ($get_leads->count() > 0)
                        @foreach ($get_leads as $contact) 
                            <!-- Chat Item Start -->
                            @php
                                 $web_url_details = App\Models\ClientApp::where('website_url',$contact->web_url)->first();
                                 if(!isset($id)){
                                    $id = null;
                                 }
                             @endphp
                             @if($web_url_details != null)
                            <li
                                class="contacts-item @if($contact->id == $id) active @endif">
                                <a class="contacts-link"
                                    href="{{route('Conversation',[$contact->id, str_replace(' ', '-',$contact->name)])}}">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('/assets/media/avatar') }}/{{ $contact->avatar ?? 'avatar.png' }}"
                                            alt="">
                                    </div>
                                    <div class="contacts-content">
                                        <div class="contacts-info">
                                            <h6 class="chat-name">
                                                {{ $contact->name }}</h6>
                                            <div class="chat-time">
                                                <span>{{ $contact->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <div class="contacts-texts">
                                            <p class="text-truncate">
                                                {{$contact->init_message}}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endif
                            <!-- Chat Item End -->
                        @endforeach
                    @endif
       
                    </ul>
                    <!-- Chat Contact List End -->
                </div>
            </div>
        </div>

    </div>
    <!-- Chats Tab Content End -->

        <!-- Profile Tab Content Start -->
        <div class="tab-pane" id="profile-content">
            <div class="d-flex flex-column h-100">
                <div class="hide-scrollbar">
                    <!-- Sidebar Header Start -->
                    <div class="sidebar-header sticky-top p-2 mb-3">
                        <h5 class="font-weight-semibold">Profile</h5>
                        <p class="text-muted mb-0">Personal Information & Settings</p>
                    </div>
                    <!-- Sidebar Header end -->

                    <!-- Sidebar Content Start -->
                    <div class="container-xl">
                        <div class="row">
                            <div class="col">

                                <!-- Card Start -->
                                <div class="card card-body card-bg-5">

                                    <!-- Card Details Start -->
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="avatar avatar-lg mb-3">
                                            <img class="avatar-img" id="profile_display"
                                                src="{{ asset('/assets/media/avatar') }}/{{ Auth::user()->avatar }}"
                                                alt="">
                                        </div>

                                        <div class="d-flex flex-column align-items-center">
                                            <h5><span id="display_name">{{ Auth::user()->name }}</span> <i
                                                    class="fa fa-check-circle" aria-hidden="true"
                                                    style="color: skyblue;" title="Premium"></i></h5>
                                        </div>

                                        <div class="d-flex">
                                            <a class="btn btn-outline-default mx-1"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                type="button">
                                                <!-- Default :: Inline SVG -->
                                                <form id="logout-form" action="{{ route('logout') }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                <svg class="hw-18 d-none d-sm-inline-block" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                                </svg>

                                                <!-- Alternate :: External File link -->
                                                <!-- <img class="injectable hw-18" src="./../assets/media/heroicons/outline/logout.svg" alt=""> -->
                                                <span>Logout</span>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Card Details End -->

                                    <!-- Card Options Start -->
                                    <div class="card-options">
                                        <div class="dropdown">
                                            <button
                                                class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted text-muted"
                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <!-- Default :: Inline SVG -->
                                                <svg class="hw-20" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                </svg>

                                                <!-- Alternate :: External File link -->
                                                <!-- <img class="injectable hw-20" src="./../assets/media/heroicons/outline/dots-vertical.svg" alt=""> -->
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item change_profile">Change Profile
                                                    Picture
                                                    <form method="post" id="update_profile_pic_form"
                                                        enctype="multipart/form-data">
                                                        <input type="hidden" id="token"
                                                            value="{{ csrf_token() }}">
                                                        <input type="file" name="files" id="profile_input"
                                                            onchange="readURLfor_profile(this);"
                                                            style="display: none;">
                                                    </form>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Options End -->

                                </div>
                                <!-- Card End -->

                                <!-- Card Start -->
                                <div class="card mt-3">

                                    <!-- List Group Start -->
                                    <ul class="list-group list-group-flush">


                                        <!-- List Group Item Start -->
                                       

                                        <!-- List Group Item Start -->
                                        <li class="list-group-item py-2">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <p class="small text-muted mb-0">Phone</p>
                                                    <p class="mb-0"id="phone">{{ Auth::user()->phone ?? 'N/A' }}
                                                    </p>
                                                </div>
                                                <!-- Default :: Inline SVG -->
                                                <svg class="text-muted hw-20 ml-1" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                </svg>

                                                <!-- Alternate :: External File link -->
                                                <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/heroicons/outline/phone.svg" alt=""> -->
                                            </div>
                                        </li>
                                        <!-- List Group Item End -->

                                        <!-- List Group Item Start -->
                                        <li class="list-group-item py-2">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <p class="small text-muted mb-0">Email</p>
                                                    <p class="mb-0" id="email">
                                                        {{ Auth::user()->email ?? 'N/A' }}</p>
                                                </div>

                                                <!-- Default :: Inline SVG -->
                                                <svg class="text-muted hw-20 ml-1" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>

                                                <!-- Alternate :: External File link -->
                                                <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/heroicons/outline/mail.svg" alt=""> -->
                                            </div>
                                        </li>
                                        <!-- List Group Item End -->

                                    </ul>
                                    <!-- List Group End -->

                                </div>
                                <!-- Card End -->

                                <!-- Card Start -->
                                <!--<div class="card my-3">-->

                                    <!-- List Group Start -->
                                <!--    <ul class="list-group list-group-flush">-->

                                        <!-- List Group Item Start -->
                                <!--        <li class="list-group-item py-2">-->
                                <!--            <div class="media align-items-center">-->
                                <!--                <div class="media-body">-->
                                <!--                    <p class="small text-muted mb-0">Facebook</p>-->
                                <!--                    <a class="font-size-sm font-weight-medium"-->
                                <!--                        href="#">{{ Auth::user()->facebook ?? 'N/A' }}</a>-->
                                <!--                </div>-->
                                                <!-- Alternate :: External File link -->
                                                <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/icons/facebook.svg" alt=""> -->
                                <!--            </div>-->
                                <!--        </li>-->
                                        <!-- List Group Item End -->

                                        <!-- List Group Item Start -->
                                <!--        <li class="list-group-item py-2">-->
                                <!--            <div class="media align-items-center">-->
                                <!--                <div class="media-body">-->
                                <!--                    <p class="small text-muted mb-0">Youtube</p>-->
                                <!--                    <a class="font-size-sm font-weight-medium"-->
                                <!--                        href="#">{{ Auth::user()->youtube ?? 'N/A' }}</a>-->
                                <!--                </div>-->
                                                <!-- Alternate :: External File link -->
                                                <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/icons/twitter.svg" alt=""> -->
                                <!--            </div>-->
                                <!--        </li>-->
                                        <!-- List Group Item End -->

                                        <!-- List Group Item Start -->
                                <!--        <li class="list-group-item py-2">-->
                                <!--            <div class="media align-items-center">-->
                                <!--                <div class="media-body">-->
                                <!--                    <p class="small text-muted mb-0">Twitch</p>-->
                                <!--                    <a class="font-size-sm font-weight-medium"-->
                                <!--                        href="#">{{ Auth::user()->twitch ?? 'N/A' }}</a>-->
                                <!--                </div>-->
                                                <!-- Alternate :: External File link -->
                                                <!-- <img class="injectable text-muted hw-20 ml-1" src="./../assets/media/icons/instagram.svg" alt=""> -->
                                <!--            </div>-->
                                <!--        </li>-->
                                        <!-- List Group Item End -->

                                <!--    </ul>-->
                                    <!-- List Group End -->

                                <!--</div>-->
                                <!-- Card End -->

                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Content End -->
                </div>
            </div>
        </div>
        <!-- Profile Tab Content End -->
        
    <!-- Tab Content End -->
</aside>
<!-- Sidebar End -->
