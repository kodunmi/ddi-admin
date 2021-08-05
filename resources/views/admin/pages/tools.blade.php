@extends('admin.layout._master')
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span> tools Edit Page </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i
                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="text-center mt-2 mb-2">
            @include('layouts._error')
            @include('layouts._alert')
        </div>
        <div class="btn btn-primary" data-toggle="modal" data-target="#add-tool">Add New tool</div>
        <div class="row mt-5">
            @forelse ($tools as $tool)
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if ($tool->feature)
                            <div class="featured">
                                <svg class="featured" xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 0 128 128" width="50px"><g><g><circle cx="64" cy="64" fill="#4ce797" r="43.125" data-original="#4CE797"/><circle cx="64" cy="64" fill="#e7f8fc" r="34.544" data-original="#E7F8FC" class="active-path" style="fill:#E7F8FC"/><path d="m58.211 81.479a3.894 3.894 0 0 1 -2.694-1.079l-11.569-11.1a3.892 3.892 0 1 1 5.388-5.618l8.59 8.239 20.468-24.03a3.893 3.893 0 1 1 5.927 5.048l-23.147 27.171a3.893 3.893 0 0 1 -2.767 1.364c-.065.003-.13.005-.196.005z" fill="#4ce797" data-original="#4CE797"/></g></g> </svg>
                            </div>
                        @endif
                        <h4 class="card-title">{{ $tool->what_we_do }} - {{  $tool->name  }}</h4>
                        <ul class="list-ticked">
                            <li>color : <span style="padding: 5px; background-color:{{ $tool->color }};border-radius: 23px;">{{ $tool->color }}</span></li>
                            <li>icon: <i class="fa fa-{{ $tool->icon }}" aria-hidden="true"></i></li>
                            <li>meetings: {{ $tool->meetings->count() }} </li>

                        </ul>
                        <button data-toggle="modal" data-target="#edit{{ $tool->id }}" type="button" class="btn btn-primary btn-sm btn-block mb-2">Edit</button>
                        <div class="btn-group btn-block" role="group" aria-label="Basic example">
                            @if ($tool->feature)
                                <a href="{{ route('tool.unfeature',['tool' => $tool->id]) }}" type="button" class="btn btn-sm btn-outline-info">Unfeature</a>
                            @else
                                <a href="{{ route('tool.feature',['tool' => $tool->id]) }}" type="button" class="btn btn-sm btn-outline-info">Feature</a>
                            @endif
                            <button data-toggle="modal" data-target="#delete{{ $tool->id }}" type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                          </div>
                    </div>
                </div>
            </div>
            @include('admin.modals.delete-tool',['tool' => $tool])
            @include('admin.modals.edit-tool',['tool' => $tool])
            @empty
                <h3>No Tool</h3>
            @endforelse ($tools as $tool)
        </div>
    </div>
    @include('admin.modals.add-tool')
    @include('admin.modals.add-admin')
@endsection

