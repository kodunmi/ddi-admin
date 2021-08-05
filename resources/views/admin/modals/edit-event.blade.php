<div id="edit-event{{ $event->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Edit slide</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('event.edit',['id' => $event->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-center">
                    <div class="form-group">
                        <div class="form-group">
                            <div>upload new cover picture of the event</div>
                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-primary text-white"><i
                                            class="mdi mdi-account"></i></span>
                                </div>
                                <input type="file" class="form-control" placeholder="Image" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-primary text-white"><i
                                            class="mdi mdi-account"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{ $event->title }}" required name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-primary text-white"><i
                                            class="mdi mdi-account"></i></span>
                                </div>
                                <textarea type="text" class="form-control" required placeholder="Write the description of the event" name="description">{{ $event->description }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-gradient-primary text-white"><i
                                                    class="mdi-calendar-multiple"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $event->month }}" placeholder="month" name="month">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-gradient-primary text-white"><i
                                                    class="mdi-calendar"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $event->day }}"  placeholder="day" name="day">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-gradient-primary text-white"><i
                                                    class="mdi-calendar-clock"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ $event->time }}" placeholder="time" name='time'>
                                    </div>
                                </div>
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

