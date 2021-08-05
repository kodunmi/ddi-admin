<div id="add-meeting" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Add Return</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('meeting.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-center">
                    <div class="form-group">
                        <label for="tool_id">Select Tool the event belongs to</label>
                        <select class="custom-select" name="tool_id" id="tool_id" required>
                            <option value=''>Select Tool</option>
                            @foreach ($tools as $tool)
                                <option value="{{ $tool->id }}">{{ $tool->what_we_do }} - {{ $tool->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div>upload the cover picture of the meeting</div>
                        <div class="input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <input type="file" class="form-control" placeholder="Image" required name="image">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="what is the title of the meeting" required name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <textarea type="text" rows="20" class="form-control" required placeholder="Write the description of the meeting" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-check form-check-primary">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked name="feature"> Feature this meeting  </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-gradient-primary mr-2">Add meeting</button>
                    <button class="btn btn-light" data-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
