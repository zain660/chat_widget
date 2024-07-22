<link rel="stylesheet" href="{{ asset('chat_widegt_style/css/mdb.min.css') }}" />
<link rel="stylesheet" href="https:cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link
    href="https:fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />

        <link rel="stylesheet" href="http://127.0.0.1:8000/chat_widegt_style/css/mdb.min.css">
            <style>
                  #floatingChatButton {
                  position: fixed;
                  bottom: 20px;
                  right: 20px;
                  background-color: #ffa900;
                  color: white;
                  border: none;
                  border-radius: 50%;
                  width: 60px;
                  height: 60px;
                  font-size: 24px;
                  cursor: pointer;
                  }

                  #chatContainer {
                  display: none;
                  position: fixed;
                  bottom: 90px;
                  right: 20px;
                  width: 300px;
                  height: 400px;
                  z-index: 1000;
                  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                  background-color: white;
                  border-radius: 10px;
                  }

                  .card {
                  overflow: scroll;
                  overflow: scroll;
                  margin: 0px;
                  right: 1px;
                  }
              </style>
          <button id="floatingChatButton"><i class="fa fa-paper-plane"></i></button>
        <section id="chatContainer" style="display: none;height: 360px; width:400px;">
  <div class="col-12">

      <div class="row d-flex justify-content-center">
          <div class="col-md-12 col-lg-12 col-xl-12">

              <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center p-3"
                      style="border-top: 4px solid #ffa900; position: sticky; top: 0; z-index: 10; background-color: white;">
                      <h5 class="mb-0">Chat messages</h5>
                      <div class="d-flex flex-row align-items-center">
                          <i class="fas fa-times text-muted fa-xs" id="closeChat"></i>
                      </div>
                  </div>
                  <div class="card-body" data-mdb-perfect-scrollbar-init
                      style="position: relative; height: 213px">
                      <div class="" id="info_form_div"  style="'.$style.'">
                          <form action="" method="post" id="info_form">
                          <input type="hidden" name="_token" id="token" value="'.csrf_token().'" />
                              <input type="hidden" name="app_key" id="app_key" value="'.$app_key.'" />
                              
                              <input type="hidden" name="web_url" id="web_url" value="" />
                              <div class="row">
                                  <label for="">Name</label>
                                  <input type="text" name="name" id="name" class="form-control">
                              </div>
                              <div class="row py-4">
                                  <label for="">Email</label>
                                  <input type="email" name="email" id="email" class="form-control">
                              </div>
                              <div class="row">
                                  <label for="">Phone number</label>
                                  <input type="text" name="phone" id="phone" class="form-control">
                              </div>
                              <div class="row py-4">
                                  <label for="">Message</label>
                                  <textarea name="message" id="message"
                                      class="form-control">Type your message...</textarea>

                              </div>
                              <div class="row py-4">
                                  <button class="btn btn-warning">Send message...</button>
                              </div>
                          </form>
                      </div>
                      <div id="messages" style="'.$style_for_messages.'">
                          <div class="d-flex justify-content-between">
                              <p class="small mb-1">Timona Siera</p>
                              <p class="small mb-1 text-muted">23 Jan 2:00 pm</p>
                          </div>
                          <div class="d-flex flex-row justify-content-start">
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                  alt="avatar 1" style="width: 45px; height: 100%;">
                              <div>
                                  <p class="small p-2 ms-3 mb-3 rounded-3 bg-body-tertiary">For what reason
                                      would it
                                      be advisable for me to think about business content?</p>
                              </div>
                          </div>

                          <div class="d-flex justify-content-between">
                              <p class="small mb-1 text-muted">23 Jan 2:05 pm</p>
                              <p class="small mb-1">Johny Bullock</p>
                          </div>
                          <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                              <div>
                                  <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-warning">Thank you for
                                      your believe in
                                      our
                                      supports</p>
                              </div>
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                  alt="avatar 1" style="width: 45px; height: 100%;">
                          </div>

                          <div class="d-flex justify-content-between">
                              <p class="small mb-1">Timona Siera</p>
                              <p class="small mb-1 text-muted">23 Jan 5:37 pm</p>
                          </div>
                          <div class="d-flex flex-row justify-content-start">
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                  alt="avatar 1" style="width: 45px; height: 100%;">
                              <div>
                                  <p class="small p-2 ms-3 mb-3 rounded-3 bg-body-tertiary">Lorem ipsum dolor
                                      sit amet
                                      consectetur adipisicing elit similique quae consequatur</p>
                              </div>
                          </div>

                          <div class="d-flex justify-content-between">
                              <p class="small mb-1 text-muted">23 Jan 6:10 pm</p>
                              <p class="small mb-1">Johny Bullock</p>
                          </div>
                          <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                              <div>
                                  <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-warning">Dolorum quasi
                                      voluptates quas
                                      amet in
                                      repellendus perspiciatis fugiat</p>
                              </div>
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                  alt="avatar 1" style="width: 45px; height: 100%;">
                          </div>

                      
                      <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3"
                          style="position: sticky;bottom: 0;z-index: 18;background-color: white;margin-bottom: 88px;position: fixed;">
                          <form method="post" action="'.route("message_send_from_visitor").'"
                              id="message_form">
                              <input type="hidden" name="_token" id="token" value="'.csrf_token().'" />
                              <input type="hidden" name="app_key" id="app_key" value="'.$app_key.'" /> 
                              <input type="hidden" name="session_id" id="session_id" value="" /> 
                              
                              <div class="input-group mb-0">
                                  <input type="text" class="form-control" id="message" name="message"
                                      placeholder="Type message" aria-label="Recipient\'s username"
                                      aria-describedby="button-addon2" />
                                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-warning"
                                      type="submit" id="button-addon2" style="padding-top: .55rem;">
                                      <i class="fa fa-paper-plane"></i>
                                  </button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>

          </div>
      </div>

  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">
    </script>
{{--  <script type="text/javascript" src="http://127.0.0.1:8000/js/mdb.umd.min.js"></script> --}}
<script>
         $('#floatingChatButton').on("click", function () {
                    $('#chatContainer').show();
                });

                // Hide chat container on close button click
                $('#closeChat').on("click", function () {
                    $('#chatContainer').hide();
                });
</script>