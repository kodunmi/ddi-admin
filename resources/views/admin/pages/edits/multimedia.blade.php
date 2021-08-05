@extends('admin.layout._master')
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span> Multimedia Edit Page </h3>
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
            @foreach ($slides as $slide)
            <div class="col-md-6">
                <div class="wrapper">
                    <div class="product-img">
                        <img  src="/images/hero/{{ $slide->image }}" class="product-img-img" onclick="location.href='{{ route('feature', ['id' => $slide->id , 'page' => 'multimedia' ]) }}'">
                    </div>
                    <div class="product-info">
                        @if ($slide->feature)
                            <div class="featured">
                                <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 0 128 128" width="50px" class=""><g><g><circle cx="64" cy="64" fill="#4ce797" r="43.125" data-original="#4CE797"/><circle cx="64" cy="64" fill="#e7f8fc" r="34.544" data-original="#E7F8FC" class="active-path" style="fill:#E7F8FC"/><path d="m58.211 81.479a3.894 3.894 0 0 1 -2.694-1.079l-11.569-11.1a3.892 3.892 0 1 1 5.388-5.618l8.59 8.239 20.468-24.03a3.893 3.893 0 1 1 5.927 5.048l-23.147 27.171a3.893 3.893 0 0 1 -2.767 1.364c-.065.003-.13.005-.196.005z" fill="#4ce797" data-original="#4CE797"/></g></g> </svg>
                            </div>
                        @endif

                        <div class="text-center {{ $slide->feature ? 'mt-1' : 'mt-5'}}">
                        <h3>{{ $slide->text }}</h3>
                        </div>
                        <div class="buttons">
                        <span class="buttons-btn" data-toggle="modal" data-target="#edit{{ $slide->id }}">
                            <svg id="Effect" enable-background="new 0 0 36 36" height="45" viewBox="0 0 36 36" width="45" xmlns="http://www.w3.org/2000/svg"><g><path d="m8.377 31.833c6.917 0 11.667 3.583 15 3.583s10.333-1.916 10.333-17.249-9.417-17.584-13.083-17.584c-17.167 0-24.5 31.25-12.25 31.25z" fill="#efefef"/></g><g><path d="m20.25 9.75h-2v1c0 .552-.448 1-1 1h-5.5c-.552 0-1-.448-1-1v-1h-2c-1.1 0-2 .9-2 2v12.5c0 1.1.9 2 2 2h11.5c1.1 0 2-.9 2-2v-12.5c0-1.1-.9-2-2-2z" fill="#f3f3f1"/></g><g><path d="m18.25 8.75v2c0 .552-.448 1-1 1h-5.5c-.552 0-1-.448-1-1v-2h1.75c0-1.1.9-2 2-2s2 .9 2 2z" fill="#2fdf84"/></g><g><path d="m21.532 28.72-3.005.53.53-3.005 7.425-7.425c.391-.391.847-.567 1.237-.177l1.237 1.237c.391.391.391 1.024 0 1.414z" fill="#2fdf84"/></g><g><path d="m20.5 10.75v-.975c-.083-.011-.164-.025-.25-.025h-2v1c0 .552-.448 1-1 1h2.25c.552 0 1-.448 1-1z" fill="#d5dbe1"/></g><g><path d="m9 24.25v-12.5c0-1.014.768-1.849 1.75-1.975v-.025h-2c-1.1 0-2 .9-2 2v12.5c0 1.1.9 2 2 2h2.25c-1.1 0-2-.9-2-2z" fill="#d5dbe1"/></g><g><path d="m13 10.75v-2h1.75c0-.683.348-1.289.875-1.65-.321-.22-.708-.35-1.125-.35-1.1 0-2 .9-2 2h-1.75v2c0 .552.448 1 1 1h2.25c-.552 0-1-.448-1-1z" fill="#00b871"/></g><g><path d="m21.308 26.245 7.007-7.007-.595-.595c-.391-.391-.847-.214-1.237.177l-7.425 7.425-.53 3.005 2.322-.41z" fill="#00b871"/></g><g><path d="m18.527 30c-.197 0-.389-.078-.53-.22-.173-.173-.251-.42-.208-.66l.53-3.005c.026-.152.1-.292.208-.4l7.425-7.425c.913-.913 1.808-.668 2.298-.177l1.237 1.237c.683.683.683 1.792 0 2.475l-7.425 7.425c-.108.108-.248.182-.4.208l-3.005.53c-.043.008-.087.012-.13.012zm1.228-3.392-.303 1.717 1.717-.303 7.258-7.258c.098-.098.098-.256 0-.354l-1.228-1.228c-.01.019-.086.066-.187.167z"/></g><g><path d="m16.01 27h-7.26c-1.517 0-2.75-1.233-2.75-2.75v-12.5c0-1.517 1.233-2.75 2.75-2.75h1.88v1.5h-1.88c-.689 0-1.25.561-1.25 1.25v12.5c0 .689.561 1.25 1.25 1.25h7.26z"/></g><g><path d="m23 18.81h-1.5v-7.06c0-.689-.561-1.25-1.25-1.25h-1.87v-1.5h1.87c1.517 0 2.75 1.233 2.75 2.75z"/></g><g><path d="m17.25 12.5h-5.5c-.965 0-1.75-.785-1.75-1.75v-2c0-.414.336-.75.75-.75h1.104c.328-1.153 1.39-2 2.646-2s2.318.847 2.646 2h1.104c.414 0 .75.336.75.75v2c0 .965-.785 1.75-1.75 1.75zm-5.75-3v1.25c0 .138.112.25.25.25h5.5c.138 0 .25-.112.25-.25v-1.25h-1c-.414 0-.75-.336-.75-.75 0-.689-.561-1.25-1.25-1.25s-1.25.561-1.25 1.25c0 .414-.336.75-.75.75z"/></g><g><path d="m9.75 14h9.5v1.5h-9.5z"/></g><g><path d="m9.75 17h9.5v1.5h-9.5z"/></g><g><path d="m9.75 20h9.5v1.5h-9.5z"/></g><g><path d="m28.314 14.78c-.827 0-1.5-.673-1.5-1.5s.673-1.5 1.5-1.5 1.5.673 1.5 1.5-.672 1.5-1.5 1.5zm0-2c-.275 0-.5.225-.5.5s.225.5.5.5.5-.225.5-.5-.224-.5-.5-.5z" fill="#a4afc1"/></g><g><g><path d="m16.375 3.25h2v1h-2z" fill="#a4afc1"/></g><g><path d="m10.625 3.25h2v1h-2z" fill="#a4afc1"/></g><g><path d="m14.125 0h1v2h-1z" fill="#a4afc1"/></g></g></svg>
                            <p class="text-muted">edit</p>
                        </span>
                        <span class="buttons-btn"  data-toggle="modal" data-target="#delete{{ $slide->id }}">
                            <svg id="Effect" enable-background="new 0 0 36 36" height="45" viewBox="0 0 36 36" width="45" xmlns="http://www.w3.org/2000/svg"><g><path d="m4.167 27.623c0-6.917-3.583-11.667-3.583-15s1.916-10.333 17.249-10.333 17.583 9.417 17.583 13.083c.001 17.167-31.249 24.5-31.249 12.25z" fill="#efefef"/></g><g><path d="m20.25 9.75h-2v1c0 .552-.448 1-1 1h-5.5c-.552 0-1-.448-1-1v-1h-2c-1.1 0-2 .9-2 2v12.5c0 1.1.9 2 2 2h11.5c1.1 0 2-.9 2-2v-12.5c0-1.1-.9-2-2-2z" fill="#f3f3f1"/></g><g><path d="m18.25 8.75v2c0 .552-.448 1-1 1h-5.5c-.552 0-1-.448-1-1v-2h1.75c0-1.1.9-2 2-2s2 .9 2 2z" fill="#2fdf84"/></g><g><path d="m27.75 18.77h.5c.552 0 1 .448 1 1v4.5c0 .552-.448 1-1 1h-.5c-.552 0-1-.448-1-1v-4.5c0-.55.45-1 1-1z" fill="#2fdf84"/></g><g><path d="m26.5 19.78c-.56-.32-2.06-1.01-4.74-1.01h-.51c-.94 0-1.79.68-1.94 1.6-.01 0-.56 2.72-.56 2.99 0 1.03.84 1.91 1.91 1.91h2.5s-.47.7-.47 1.87c0 1.4.7 2.11 1.17 2.11.46 0 .95-.48.95-1.65 0-1.31 1.41-2.32 1.97-2.67z" fill="#2fdf84"/></g><g><path d="m20.5 10.75v-.975c-.083-.011-.164-.025-.25-.025h-2v1c0 .552-.448 1-1 1h2.25c.552 0 1-.448 1-1z" fill="#d5dbe1"/></g><g><path d="m9 24.25v-12.5c0-1.014.768-1.849 1.75-1.975v-.025h-2c-1.1 0-2 .9-2 2v12.5c0 1.1.9 2 2 2h2.25c-1.1 0-2-.9-2-2z" fill="#d5dbe1"/></g><g><path d="m13 10.75v-2h1.75c0-.683.348-1.289.875-1.65-.321-.22-.708-.35-1.125-.35-1.1 0-2 .9-2 2h-1.75v2c0 .552.448 1 1 1h2.25c-.552 0-1-.448-1-1z" fill="#00b871"/></g><g><path d="m21 23.36c0-.27.55-2.99.56-2.99.125-.765.735-1.357 1.477-1.538-.395-.036-.812-.062-1.277-.062h-.51c-.94 0-1.79.68-1.94 1.6-.01 0-.56 2.72-.56 2.99 0 1.03.84 1.91 1.91 1.91h2.25c-1.07 0-1.91-.88-1.91-1.91z" fill="#00b871"/></g><g><path d="m25.41 25.27h-2.25s-.47.7-.47 1.87c0 1.4.7 2.11 1.17 2.11.46 0 .95-.48.95-1.65 0-.241.059-.468.141-.687.056-1.03.459-1.643.459-1.643z" fill="#00b871"/></g><g><path d="m28.25 26.02h-.5c-.965 0-1.75-.785-1.75-1.75v-4.5c0-.965.785-1.75 1.75-1.75h.5c.965 0 1.75.785 1.75 1.75v4.5c0 .964-.785 1.75-1.75 1.75zm-.5-6.5c-.136 0-.25.114-.25.25v4.5c0 .138.112.25.25.25h.5c.138 0 .25-.112.25-.25v-4.5c0-.138-.112-.25-.25-.25z"/></g><g><path d="m23.86 30c-.943 0-1.92-1.07-1.92-2.86 0-.427.053-.803.128-1.12h-1.408c-1.467 0-2.66-1.193-2.66-2.659 0-.093 0-.247.29-1.739.124-.638.208-1.072.292-1.37l-.013-.002c.208-1.271 1.36-2.229 2.681-2.229h.51c2.762 0 4.389.695 5.113 1.109l-.746 1.303c-.479-.274-1.862-.912-4.367-.912h-.51c-.584 0-1.111.427-1.2.972-.005.028-.011.057-.019.083-.072.311-.51 2.518-.532 2.813.001.611.522 1.131 1.161 1.131h2.5c.277 0 .531.152.662.397.13.244.115.54-.039.771s-.343.551-.343 1.452c0 .897.353 1.317.48 1.368-.043-.028.139-.259.139-.908 0-1.672 1.625-2.869 2.323-3.306l.795 1.271c-.782.489-1.618 1.281-1.618 2.034.001 1.659-.853 2.401-1.699 2.401z"/></g><g><path d="m16.69 27h-7.94c-1.517 0-2.75-1.233-2.75-2.75v-12.5c0-1.517 1.233-2.75 2.75-2.75h1.88v1.5h-1.88c-.689 0-1.25.561-1.25 1.25v12.5c0 .689.561 1.25 1.25 1.25h7.94z"/></g><g><path d="m23 15.78h-1.5v-4.03c0-.689-.561-1.25-1.25-1.25h-1.87v-1.5h1.87c1.517 0 2.75 1.233 2.75 2.75z"/></g><g><path d="m17.25 12.5h-5.5c-.965 0-1.75-.785-1.75-1.75v-2c0-.414.336-.75.75-.75h1.104c.328-1.153 1.39-2 2.646-2s2.318.847 2.646 2h1.104c.414 0 .75.336.75.75v2c0 .965-.785 1.75-1.75 1.75zm-5.75-3v1.25c0 .138.112.25.25.25h5.5c.138 0 .25-.112.25-.25v-1.25h-1c-.414 0-.75-.336-.75-.75 0-.689-.561-1.25-1.25-1.25s-1.25.561-1.25 1.25c0 .414-.336.75-.75.75z"/></g><g><path d="m9.75 14h9.5v1.5h-9.5z"/></g><g><path d="m9.75 17h7.53v1.5h-7.53z"/></g><g><path d="m9.75 20h6.42v1.5h-6.42z"/></g><g><path d="m14.125 0h1v2h-1z" fill="#a4afc1"/></g><g><path d="m10.625 3h2v1h-2z" fill="#a4afc1"/></g><g><path d="m16.375 3h2v1h-2z" fill="#a4afc1"/></g><g><path d="m30.98 16.25c-.827 0-1.5-.673-1.5-1.5s.673-1.5 1.5-1.5 1.5.673 1.5 1.5-.672 1.5-1.5 1.5zm0-2c-.275 0-.5.225-.5.5s.225.5.5.5.5-.225.5-.5-.224-.5-.5-.5z" fill="#a4afc1"/></g></svg>
                            <p class="text-muted">delete</p>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.modals.edit-slide-modal',['slide' => $slide, 'page' => 'multimedia' ])
            @include('admin.modals.delete-slide',['slide' => $slide, 'page' => 'multimedia' ])
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add new image to gallary</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mt-2">
                                  <div class="input-group-prepend">
                                    <select name="feature" class="form-control bg-gradient-primary black" name="">
                                        <option value='1'>feature</option>
                                        <option value='0'>dont feature</option>
                                    </select>
                                  </div>
                                <input type="file" name="image" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <button class="btn btn-sm btn-gradient-primary" type="submit">Upload</button>
                                </div>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            @foreach ($photos as $photo)
            <div class="col-md-3 mb-2">
                <img class="photo rounded photoId" src="/images/galary/{{ $photo->image }}" alt="{{ $photo->id }}" onclick="location.href='{{ route('photo.feature', ['id' => $photo->id]) }}'" photoId="{{ $photo->id }}">
                <div class="photo-button-container">
                    @if ($photo->feature)
                        <div class="photo-featured">
                            <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 0 128 128" width="50px" class=""><g><g><circle cx="64" cy="64" fill="#4ce797" r="43.125" data-original="#4CE797"/><circle cx="64" cy="64" fill="#e7f8fc" r="34.544" data-original="#E7F8FC" class="active-path" style="fill:#E7F8FC"/><path d="m58.211 81.479a3.894 3.894 0 0 1 -2.694-1.079l-11.569-11.1a3.892 3.892 0 1 1 5.388-5.618l8.59 8.239 20.468-24.03a3.893 3.893 0 1 1 5.927 5.048l-23.147 27.171a3.893 3.893 0 0 1 -2.767 1.364c-.065.003-.13.005-.196.005z" fill="#4ce797" data-original="#4CE797"/></g></g> </svg>
                        </div>
                    @endif
                </div>
            </div>
            @include('admin.modals.delete-photo', ['photo' => $photo])
            @endforeach

        </div>
    </div>
    @include('admin.modals.add-slide', ['page' => 'multimedia'])
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
@endsection

