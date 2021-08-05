@extends('admin.layout._master')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span> Mailing List  </h3>
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
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Subscribers</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Email </th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($subscribers as $subscriber)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $subscriber->email }} </td>
                                </tr>
                            @empty
                                <h3>No Subscribers</h3>
                            @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
        </div>
        @include('admin.modals.add-admin')
    </div>
    <!-- content-wrapper ends -->
@endsection
