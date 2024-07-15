<link rel="stylesheet" href="{{ asset('chat_widegt_style/css/mdb.min.css') }}" />
<link rel="stylesheet" href="https:cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link
    href="https:fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">


<style>
    #chatContainer {
        height: $ {
            settings.chatBoxHeight
        }

        ;
    }

    .card {
        margin: 0;
    }
</style>

<section>
    <div class="">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center p-3"
                        style="border-top: 4px solid ${settings.chatBoxPrimaryColor};">
                        <h5 class="mb-0">Support Live Chat</h5>
                        <div class="d-flex flex-row align-items-center">
                            <i class="fas fa-times text-muted fa-xs" id="closeChat"></i>
                        </div>
                    </div>
                    <div class="card-body" data-mdb-perfect-scrollbar-init
                        style="position: relative; height: calc(${settings.chatBoxHeight} - 100px); overflow: auto;">
                        <!-- Chat messages here -->
                        <div class="d-flex justify-content-between">
                            <p class="small mb-1">Timona Siera</p>
                            <p class="small mb-1 text-muted">23 Jan 2:00 pm</p>
                        </div>
                        <div class="d-flex flex-row justify-content-start">
                            <img src="https:mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                            <div>
                                <p class="small p-2 ms-3 mb-3 rounded-3 bg-body-tertiary">For what reason would it be
                                    advisable for me to think about business content?</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small mb-1 text-muted">23 Jan 2:05 pm</p>
                            <p class="small mb-1">Johny Bullock</p>
                        </div>
                        <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                            <div>
                                <p class="small p-2 me-3 mb-3 text-white rounded-3"
                                    style="background-color:${settings.chatBoxPrimaryColor}">Thank you for your belief
                                    in our support</p>
                            </div>
                            <img src="https:mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="small mb-1">Timona Siera</p>
                            <p class="small mb-1 text-muted">23 Jan 5:37 pm</p>
                        </div>
                        <div class="d-flex flex-row justify-content-start">
                            <img src="https:mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                            <div>
                                <p class="small p-2 ms-3 mb-3 rounded-3 bg-body-tertiary">Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit similique quae consequatur</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                        <div class="input-group mb-0">
                            <input type="text" class="form-control" placeholder="Type message"
                                aria-label="Recipient's username" aria-describedby="button-addon2" />
                            <button data-mdb-button-init data-mdb-ripple-init class="btn text-white" type="button"
                                id="button-addon2"
                                style="background-color: ${settings.chatBoxPrimaryColor}; padding-top: .55rem;">
                                <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var settings = $.extend({
        buttonColor: '#ffa900',
        buttonText: 'Chat',
        chatBoxWidth: '300px',
        chatBoxHeight: '400px'
    }, options);

    Create the floating chat button
    var $button = $('<button>', {
        id: 'floatingChatButton',
        html: '<i class="fa fa-paper-plane"></i>',
        css: {
            position: 'fixed',
            bottom: '20px',
            right: '20px',
            backgroundColor: settings.chatBoxPrimaryColor,
            color: 'white',
            border: 'none',
            borderRadius: '50%',
            width: '60px',
            height: '60px',
            fontSize: '24px',
            cursor: 'pointer'
        }
    });

    Create the chat container
    var $chatContainer = $('<div>', {
        id: 'chatContainer',
        css: {
            display: 'none',
            position: 'fixed',
            bottom: '90px',
            Position above the floating button
            right: '20px',
            width: settings.chatBoxWidth,
            zIndex: '1000',
            boxShadow: '0 4px 8px rgba(0,0,0,0.2)',
            backgroundColor: 'white',
            borderRadius: '10px'
        }
    });

    $('body').append(response.chat_widget);
    $button.on('click', function() {
        $chatContainer.show();
    });

    // Hide chat box on close icon click
    $chatContainer.on('click', '#closeChat', function() {
        $chatContainer.hide();
    });
</script>
