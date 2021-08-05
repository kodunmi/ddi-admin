<div id="edit{{ $slide->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Edit slide</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('slide.edit',['page' => $page, 'id' => $slide->id]) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="my-textarea1">Header text</label>
                        <input id="my-textarea1" class="form-control" name="header" value="{{ $slide->header }}">
                    </div>
                    <div class="form-group">
                        <label for="my-textarea2">Sub HeaderText</label>
                        <input id="my-textarea2" class="form-control" name="sub_header" value="{{ $slide->sub_header }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" data-dismiss="modal" aria-label="Close">Close</button>
                    <button class="btn btn-primary" type="submit">Update Text</button>
                </div>
            </form>
        </div>
    </div>
</div>

