@extends('admin.layout._master')
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2" onclick="location.href='{{ route('message.all') }}'">
                    <i class="mdi mdi-email"></i>
                </span> Back To Message </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i
                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="btn bg-gradient-danger text-white mb-5" onclick="location.href='{{ route('message.delete', ['id' => $message->id ]) }}'">Delete Message</div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                         Sender Information
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> First Name </th>
                                        <th> Last Name </th>
                                        <th> Email </th>
                                        <th> Phone </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {{ $message->firstname }} </td>
                                        <td>
                                            {{ $message->lastname }}
                                        </td>
                                        <td>
                                           {{ $message->email }}
                                        </td>
                                        <td>
                                           {{ $message->phone }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                         Message
                    </div>
                    <div class="card-body">
                        {{ $message->message }}
                    </div>
                </div>
            </div>
        </div>

        @include('admin.modals.add-admin')
    </div>
    <!-- content-wrapper ends -->
@endsection
