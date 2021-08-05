<div id="edit-publication{{ $publication->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Edit slide</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('publication.edit',['id' => $publication->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-center">
                    <div class="form-group">
                        <div class="form-group">
                            <div>upload new cover picture of the publication</div>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-primary text-white"><i
                                            class="mdi mdi-account"></i></span>
                                </div>
                                <input type="file" class="form-control" placeholder="Image" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>upload new publication document</div>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-primary text-white"><i
                                            class="mdi mdi-account"></i></span>
                                </div>
                                <input type="file" class="form-control" placeholder="doc" name="doc">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-primary text-white"><i
                                            class="mdi mdi-account"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $publication->name }}" required name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-primary text-white"><i
                                            class="mdi mdi-account"></i></span>
                                </div>
                                <textarea type="text" class="form-control" required placeholder="Write the description of the publication" name="description">{{ $publication->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                    <button class="btn btn-light" data-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

