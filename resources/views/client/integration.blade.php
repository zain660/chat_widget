@extends('layouts.client_layout')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-10">
            <h1 class="h3 mb-0 text-gray-800">Integration</h1>
        </div> 
    </div>
    <!-- Begin Page Content -->
    @if($apps->count() > 0)
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">App name</th>
            <th scope="col">Registered Website</th>
            <th scope="col">Code</th>
          </tr>
        </thead>
        <tbody>
            @php
                $count = 0;
            @endphp
            @foreach($apps as $app)
            <tr>
                <th scope="row">{{$count ++}}</th>
                <td>{{$app->app_name}}</td>
                <td>{{$app->website_url}}</td>
                <td>
                    <button class="btn btn-primary"data-toggle="modal" data-target="#exampleModal_{{$app->id}}">My Widget Code</button>
                </td>
            </tr> 

            <div class="modal fade" id="exampleModal_{{$app->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Chat widget Code</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div style="max-width: 40rem; margin: 0 auto; color: #17224f;">
                                <div style="color: #cccccc; background-color: #1f1f1f; font-family: Consolas, 'Courier New', monospace; font-size: 14px; line-height: 19px; white-space: pre;">
                                <div><span style="color: #cccccc;">&nbsp; </span><span style="color: #6a9955;">&lt;!-- Commont jquery cdn --&gt;</span></div>
                                <div><span style="color: #cccccc;">&nbsp; &nbsp; </span><span style="color: #808080;">&lt;</span><span style="color: #569cd6;">script</span><span style="color: #d4d4d4;"> </span><span style="color: #9cdcfe;">src</span><span style="color: #d4d4d4;">=</span><span style="color: #ce9178;">"<a href="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js</a>"</span><span style="color: #808080;">&gt;</span></div>
                                <div><span style="color: #808080;"> &lt;/</span><span style="color: #569cd6;">script</span><span style="color: #808080;">&gt;</span></div>
                                <div><span style="color: #cccccc;">&nbsp; &nbsp; </span><span style="color: #6a9955;">&lt;!-- Own cdn for chat widget --&gt;</span></div>
                                <div><span style="color: #cccccc;">&nbsp; &nbsp; </span><span style="color: #808080;">&lt;</span><span style="color: #569cd6;">script</span><span style="color: #d4d4d4;"> </span><span style="color: #9cdcfe;">type</span><span style="color: #d4d4d4;">=</span><span style="color: #ce9178;">"text/javascript"</span><span style="color: #d4d4d4;"> </span><span style="color: #9cdcfe;">src</span><span style="color: #d4d4d4;">=</span><span style="color: #ce9178;">"<a href="http://127.0.0.1:8000/" aria-invalid="true">http://127.0.0.1:8000/</a>js/mdb.umd.min.js"</span><span style="color: #808080;">&gt;&lt;/</span><span style="color: #569cd6;">script</span><span style="color: #808080;">&gt;</span></div>
                                <div><span style="color: #cccccc;">&nbsp; &nbsp; </span><span style="color: #6a9955;">&lt;!-- chat widget settings --&gt;</span></div>
                                <div><span style="color: #cccccc;">&nbsp; &nbsp; </span><span style="color: #808080;">&lt;</span><span style="color: #569cd6;">script</span><span style="color: #808080;">&gt;</span></div>
                                <div><span style="color: #d4d4d4;">&nbsp; &nbsp; &nbsp; &nbsp; </span><span style="color: #dcdcaa;">$</span><span style="color: #d4d4d4;">(</span><span style="color: #9cdcfe;">document</span><span style="color: #d4d4d4;">).</span><span style="color: #dcdcaa;">ready</span><span style="color: #d4d4d4;">(</span><span style="color: #569cd6;">function</span><span style="color: #d4d4d4;"> () {</span></div>
                                <div><span style="color: #d4d4d4;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><span style="color: #dcdcaa;">$</span><span style="color: #d4d4d4;">(</span><span style="color: #9cdcfe;">document</span><span style="color: #d4d4d4;">).</span><span style="color: #dcdcaa;">chatBoxInit</span><span style="color: #d4d4d4;">({</span></div>
                                <div><span style="color: #d4d4d4;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><span style="color: #9cdcfe;">app_key</span><span style="color: #9cdcfe;"> :</span><span style="color: #d4d4d4;"> </span><span style="color: #ce9178;">'{{$app->app_key}}'</span><span style="color: #d4d4d4;">,</span></div>
                                <div><span style="color: #d4d4d4;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; });</span></div>
                                <div><span style="color: #d4d4d4;">&nbsp; &nbsp; &nbsp; &nbsp; });</span></div>
                                <div><span style="color: #d4d4d4;">&nbsp; &nbsp; </span><span style="color: #808080;">&lt;/</span><span style="color: #569cd6;">script</span><span style="color: #808080;">&gt;</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
          @endforeach
        </tbody>
      </table> 
    @else
     <div class="card">
        <div class="card-body">
            <div class="alert alert-danger">Create app before integration</div>
        </div>
     </div>
     @endif
    @endsection