@extends('layouts.client_layout')
@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-10">
                <div class="row">
                    <div class="col-10">
                        <h1 class="h3 mb-0 text-gray-800">All Leads</h1>
                    </div>
                    {{-- <div class="col-2">
                        <a href="{{route('client.create_app')}}" class="btn btn-primary">Create Key</a>
                    </div> --}}
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
                            <th scope="col">Visitor Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            {{-- <th scope="col">Message</th> --}}
                            <th scope="col">Website</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if (count($allLeads) > 0)
                            @php
                                $count = 1;
                                $message = [];
                            @endphp
                            @foreach ($allLeads as $allLead)
                                @foreach ($allLead as $item)
                                    {{-- @dd($item) --}}
                                    <tr>
                                        <th scope="row">{{ $count++ }}</th>
                                        <td>{{ $item->name ? $item->name : '' }}</td>
                                        <td>{{ $item->email ? $item->email : '' }}</td>
                                        <td>{{ $item->phone ? $item->phone : '' }}</td>
                                        {{-- <td>{{ $item->init_message ? $item->init_message : ''}}</td> --}}
                                        <td>{{ $item->web_url ? $item->web_url : '' }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <div class="badge badge-success">Active</div>
                                            @else
                                                <div class="badge badge-danger">In Active</div>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                        <td> <button class="btn btn-outline-primary" type="submit" data-toggle="modal"
                                                data-target="#exampleModalLeads">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @php
                                        $leadMessage = \App\Models\Lead::find($item->id);
                                        array_push($message, $leadMessage);
                                        // dd($message);
                                    @endphp
                                @endforeach
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $leads->links() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalLeads" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="exampleModalLabel">Create users</h5> --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Message</label>
                            <div>{{ $message[0]['init_message'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
