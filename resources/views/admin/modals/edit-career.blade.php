<div id="edit-career{{ $career->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Edit slide</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('career.edit',['id' => $career->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-center">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="what is the title of the career" value="{{$career->title}}" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="what is the location of the career" value="{{$career->location}}" name="location">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <input type="number" class="form-control" placeholder="what is the salary expectation of the career" value="{{$career->salary}}" name="salary">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tool_id">Select Type of career</label>
                        <select class="custom-select" name="type" id="tool_id" required>
                            <option {{$career->type ? 'full' :'selected' }} value="full">Full Time</option>
                            <option {{$career->type ? 'part' :'selected' }} value="part">Part Time</option>
                            <option {{$career->type ? 'contract' :'selected' }} value="contract">Contract</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ca_id">description of career</label>
                        <div class="input-group">

                            <textarea id="ca_id" type="text" rows="20" class="form-control summernote" value="{{$career->description}}"  placeholder="Write the description of the career" name="description">{{$career->description}}</textarea>
                        </div>
                    </div>


                      <div class="form-check form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" checked name="feature"> Feature this career  </label>
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

