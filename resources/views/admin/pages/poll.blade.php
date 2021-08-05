@extends('admin.layout._master')
@section('js')
<script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="text" name="options[]" class="form-control m-input" required placeholder="write the option to the question" autocomplete="off">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span> Poll </h3>
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
        <div class="row">
            <div class="col-12 grid-margin">
                <form action="{{ route('poll.create') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <textarea class="form-control" required name="question" id="" rows="3" placeholder="write the question you want people to react to"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="inputFormRow">
                                <div class="input-group mb-3">
                                    <input type="text" name="options[]" class="form-control m-input" required placeholder="write the option to the question" autocomplete="off">
                                    <div class="input-group-append">
                                        <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                                    </div>
                                </div>
                            </div>
                            <div id="newRow"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" checked name="feature"> Feature this poll</label>
                              </div>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @forelse ($polls as $poll)
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @if ($poll->feature)
                                <div class="featured">
                                    <svg class="featured" xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 0 128 128" width="50px"><g><g><circle cx="64" cy="64" fill="#4ce797" r="43.125" data-original="#4CE797"/><circle cx="64" cy="64" fill="#e7f8fc" r="34.544" data-original="#E7F8FC" class="active-path" style="fill:#E7F8FC"/><path d="m58.211 81.479a3.894 3.894 0 0 1 -2.694-1.079l-11.569-11.1a3.892 3.892 0 1 1 5.388-5.618l8.59 8.239 20.468-24.03a3.893 3.893 0 1 1 5.927 5.048l-23.147 27.171a3.893 3.893 0 0 1 -2.767 1.364c-.065.003-.13.005-.196.005z" fill="#4ce797" data-original="#4CE797"/></g></g> </svg>
                                </div>
                            @endif
                            <h4 class="card-title">{{ $poll->question }}</h4>
                            <ul class="list-ticked">
                                @forelse ($poll->options as $option)
                                    <li>{{ $option->option }}</li>
                                @empty
                                    <p>No options</p>
                                @endforelse
                            </ul>
                            <div class="btn-group" role="group" aria-label="Basic example">

                                @if ($poll->feature)
                                    <a href="{{ route('poll.unfeature',['poll' => $poll->id]) }}" type="button" class="btn btn-sm btn-outline-info">Unfeature</a>
                                @else
                                    <a href="{{ route('poll.feature',['poll' => $poll->id]) }}" type="button" class="btn btn-sm btn-outline-info">Feature</a>
                                @endif
                                <a href="{{ route('poll.delete', ['poll' => $poll->id]) }}" type="button" class="btn btn-sm btn-outline-danger">Delete</a>
                              </div>
                        </div>
                    </div>
                </div>
            @empty
                <h3>empty</h3>
            @endforelse

        </div>

        @include('admin.modals.add-admin')
    </div>
    <!-- content-wrapper ends -->
@endsection
