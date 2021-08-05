<div id="delete-meeting{{$meeting->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Delete Meeting</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to deleted</p>
                <h3>{{ $meeting->name }}</h3>
            </div>
            <div class="modal-footer">
                <a class="btn btn-gradient-danger mr-2" href="{{route('meeting.delete' ,['id' => $meeting->id])}}">Delete</a>
                <button class="btn btn-light" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>
