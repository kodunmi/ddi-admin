@extends('admin.layout._master')
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span> {{ $meeting->name }} page
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i
                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="btn btn-primary" data-toggle="modal" data-target="#my-modal">Add Slide</div>
        <div class="text-center mt-2 mb-2">
            @include('layouts._error')
            @include('layouts._alert')
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add new images to {{ $meeting->tool->what_we_do }} -> {{ $meeting->tool->name }} -> {{ $meeting->name }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('photo.create',['meeting'=>$meeting->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row" id="inputFormRow">
                                <div class="col-md-4">
                                    <div class="input-group">
                                      <input type="file" name="image[]" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                  </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" name="description[]" class="form-control" placeholder="what is the title of the picture">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-gradient-primary" type="button" id="addRow">Add New</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="newPhoto"></div>

                            <button class="btn btn-primary mt-2" href="{{ route('meeting.create') }}" role="button">Add Photos</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            @foreach ($meeting->adminPhotos as $photo)
            <div class="col-md-3 mb-2">
                <img class="photo rounded photoId" src="/images/meetings/{{ $photo->image }}" alt="{{ $photo->id }}" onclick="location.href='{{ route('meeting.photo.feature', ['photo' => $photo->id]) }}'" photoId="{{ $photo->id }}">
                <div class="photo-button-container">
                    @if ($photo->feature)
                        <div class="photo-featured">
                            <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 0 128 128" width="50px" class=""><g><g><circle cx="64" cy="64" fill="#4ce797" r="43.125" data-original="#4CE797"/><circle cx="64" cy="64" fill="#e7f8fc" r="34.544" data-original="#E7F8FC" class="active-path" style="fill:#E7F8FC"/><path d="m58.211 81.479a3.894 3.894 0 0 1 -2.694-1.079l-11.569-11.1a3.892 3.892 0 1 1 5.388-5.618l8.59 8.239 20.468-24.03a3.893 3.893 0 1 1 5.927 5.048l-23.147 27.171a3.893 3.893 0 0 1 -2.767 1.364c-.065.003-.13.005-.196.005z" fill="#4ce797" data-original="#4CE797"/></g></g> </svg>
                        </div>
                    @endif
                </div>
                <p>{{ $photo->description }}</p>
            </div>
            @include('admin.modals.delete-meeting-photo', ['photo' => $photo])
            @endforeach

        </div>
    </div>
    @include('admin.modals.add-admin')
@endsection

@section('js')
    <script>
        var tld = 0;
        $(".photo").mousedown(function() {
            var id = $(this).attr('photoId');
            tld = setTimeout(function(){
                deletePhoto(id)
            }, 1000);
            return false;
        })
        $(".photoId").mouseup(function() {
            clearTimeout(tld);
        })

        $(".photo").on('pointerdown',(function() {
            var id = $(this).attr('photoId');
            tld = setTimeout(function(){
                deletePhoto(id)
            }, 1000);
            return false;
        }))
        $(".photoId").on("pointerup", (function() {
            clearTimeout(tld);
        }))

        function deletePhoto (id) {
            $(`#delete-photo${id}`).modal('show');
        }

    </script>
    <script type="text/javascript">
        // add row
        $("#addRow").click(function () {
            var html = '<div class="row mt-2" id="inputFormRow"><div class="col-md-4"><div class="input-group"><input type="file" name="image[]" class="form-control" placeholder="Recipients username" aria-label="Recipients username" aria-describedby="basic-addon2"></div></div><div class="col-md-8"><div class="input-group"><input type="text" name="description[]" class="form-control" placeholder="what is the title of the picture"><div class="input-group-append"><button class="btn btn-sm btn-gradient-danger removeRow" type="button" id="removeRow">Remove</button></div></div></div></div>';

            $('#newPhoto').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>
@endsection

