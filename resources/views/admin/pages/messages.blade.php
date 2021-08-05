@extends('admin.layout._master')
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span> Messages </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i
                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('layouts._error')
                @include('layouts._alert')
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
                                        <th> Email </th>
                                        <th> Sent </th>
                                        <th> Read </th>
                                        <th> View </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr class="{{ $message->read_at == null ? 'bg-light' : '' }}">
                                            <td> {{ $message->firstname }} </td>
                                            <td>
                                            {{ $message->email }}
                                            </td>
                                            <td>
                                            {{ $message->created_at->diffForHumans() }}
                                            </td>
                                            <td>
                                            {{ $message->read_at ? $message->read_at->diffForHumans() : 'Unread' }}
                                            </td>
                                            <td>
                                                <a href="{{ route('message.read',['id' => $message->id]) }}">
                                                    <span class="page-title-icon bg-gradient-danger text-white mr-2">
                                                        <i type="button" class="mdi mdi-eye user-table-icon"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.modals.add-admin')
    </div>
    <!-- content-wrapper ends -->
@endsection
