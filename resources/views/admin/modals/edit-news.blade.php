<div id="edit-news{{ $news->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Edit slide</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('news.edit',['id' => $news->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-center">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <input value="{{$news->title}}" type="text" class="form-control" placeholder="what is the title of the news" required name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <input value="{{$news->link}}" type="text" class="form-control" placeholder="what is the link of the news" required name="link">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <input value="{{$news->date}}" type="date" class="form-control" placeholder="what is the link of the news" required name="date">
                        </div>
                    </div>

                      <div class="form-check form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" checked name="feature"> Feature this news  </label>
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

