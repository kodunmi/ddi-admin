@extends('admin.layout._master')
@section('js')
<script type="text/javascript">
    // add row
    $("#addNewRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="file" name="images[]" class="form-control m-input" required placeholder="write the option to the question" autocomplete="off">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += '</div>';
        html += '</div>';

        $('#newImgRow').append(html);
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
                </span> {{$project->name}} </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i
                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- <div class="btn btn-primary" data-toggle="modal" data-target="#my-modal">Add Slide</div> -->
        <div class="text-center mt-2 mb-2">
            @include('layouts._error')
            @include('layouts._alert')
        </div>


        <div class="row">
            <form action="{{route('project.edit',['project' =>$project->id])}}" method="POST">
                @csrf
                <div class="text-center">
                <div class="form-group">
                    <select class="custom-select" name="service" id="service">
                        {{$project->service}}
                        <option {{$project->service == 1 ? 'selected':''}} value="1">Business Support & Enterprise Management</option>
                        <option {{$project->service == 2 ? 'selected':''}} value="2">Agricultural Value Chain Improvement</option>
                        <option {{$project->service == 3 ? 'selected':''}} value="3">Renewable/Off-Grid Energy Support</option>
                        <option {{$project->service == 4 ? 'selected':''}} value="4">Agricultural Commodity Market Access Services</option>
                        <option {{$project->service == 5 ? 'selected':''}} value="5">Youth/Women-led Enterprise Support</option>
                        <option {{$project->service == 6 ? 'selected':''}} value="6">Grants Management</option>
                        <option {{$project->service == 7 ? 'selected':''}} value="7">Employability Program</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-gradient-primary text-white"><i
                                    class="mdi mdi-account"></i></span>
                        </div>
                        <input type="text" class="form-control" value="{{$project->name}}" placeholder="Name of the project" required name="name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-gradient-primary text-white"><i
                                    class="mdi mdi-account"></i></span>
                        </div>
                        <textarea class="form-control" placeholder="project summary" required name="summary">{{$project->summary}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <textarea class="form-control summernote" placeholder="project description" required name="description">{{$project->description}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-gradient-primary text-white"><i
                                    class="mdi mdi-account"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="venue of the project" value="{{$project->venue}}" required name="venue">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-gradient-primary text-white"><i
                                    class="mdi mdi-account"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="sponsor of the project" value="{{$project->sponsor}}" required name="sponsor">
                    </div>
                </div>

                <div class="form-check form-check-primary">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" {{$project->is_featured ? 'checked':''}}  name="feature"> Feature </label>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Update Project</button>
            </div>
            </form>

            <div class="row mt-5 w-100">
                <div class="col-lg-12">
                    <button id="addNewRow" type="button" class="btn btn-info w-100 mb-5">Add New Images</button>
                    <div id="newImgRow"></div>
                </div>
            </div>
            <div class="row mt-5 text-center">
                @forelse ($project->images as $image)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <img  class="rounded  px-3" src={{$image->secure_url}} />
                        <a href="{{ route('project.delete.image', ['image' => $image->id])}}" class="btn btn-danger mt-3" >Delete</a>
                    </div>

                @empty
                    <div>No images for this project</div>
                @endforelse
            </div>

        </div>
    </div>
@endsection

