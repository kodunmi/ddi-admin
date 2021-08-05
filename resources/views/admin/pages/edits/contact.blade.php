@extends('admin.layout._master')
@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> Edit Contact </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="text-center mt-2 mb-2">
        @include('layouts._error')
        @include('layouts._alert')
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Contact Information</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('contact.update') }}" method="POST">
                        @csrf
                        <div class="input-group mt-2">
                            <textarea class="form-control" rows="6" placeholder="enter your office address"
                                aria-label="company address" name="address"
                            >{{ $contact->address ?? ''}}</textarea>
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-linkedin" type="button">
                                    <i class="mdi mdi-server"></i>
                                </button>
                            </div>
                        </div>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" placeholder="enter officail email"
                                aria-label="Recipient's username" name="email" value="{{ $contact->email ?? ''}}">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-twitter" type="button">
                                    <i class="mdi mdi-gmail"></i>
                                </button>
                            </div>
                        </div>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" placeholder="enter offical phone number"
                                aria-label="Recipient's username" name="phone_1"
                                value="{{ $contact->phone_1 ?? ''}}">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-youtube" type="button">
                                    <i class="mdi mdi-phone"></i>
                                </button>
                            </div>
                        </div>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" placeholder="enter offical phone number"
                                aria-label="Recipient's username" name="phone_2"
                                value="{{ $contact->phone_2 ?? ''}}">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-youtube" type="button">
                                    <i class="mdi mdi-phone"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Update Contact Address</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@include('admin.modals.add-admin')
@endsection
