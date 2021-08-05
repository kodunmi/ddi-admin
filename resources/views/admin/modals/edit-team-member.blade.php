<div id="edit-team{{ $team->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Edit slide</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('team.edit',['id' => $team->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-center">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <input type="file" class="form-control" placeholder="Image" name="image"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <input value="{{ $team->name }}" type="text" class="form-control" placeholder="Name" required name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"> <i
                                        class="mdi mdi-email-outline"></i> </span>
                            </div>
                            <input value="{{ $team->position }}" type="text" class="form-control" placeholder="Position" required name="position">
                        </div>
                    </div>
                    <h3 class="text-center">Social Media Links</h3>
                    <div class="input-group mt-2">
                        <input type="email" class="form-control" placeholder="enter email" value="{{ $team->email }}"aria-label="Recipient's username" name="email">
                        <div class="input-group-append">
                          <button class="btn btn-sm btn-info" type="button">
                            <i class="mdi mdi-email"></i>
                          </button>
                        </div>
                      </div>
                    <div class="input-group mt-2">
                        <input type="number" class="form-control" placeholder="enter phone number" value="{{ $team->phone }}" aria-label="Recipient's username" name="phone">
                        <div class="input-group-append">
                          <button class="btn btn-sm btn-secondary" type="button">
                            <i class="mdi mdi-phone"></i>
                          </button>
                        </div>
                      </div>
                    <div class="input-group mt-2">
                        <input type="text" value="{{ $team->fb_link }}" class="form-control" placeholder="enter facebook url" aria-label="Recipient's username" name="fb_link">
                        <div class="input-group-append">
                          <button class="btn btn-sm btn-facebook" type="button">
                            <i class="mdi mdi-facebook"></i>
                          </button>
                        </div>
                      </div>
                    <div class="input-group mt-2">
                        <input type="text" class="form-control" placeholder="enter linkedin url" aria-label="Recipient's username" name="linkedin_link" value="{{ $team->linkedin_link }}">
                        <div class="input-group-append">
                          <button class="btn btn-sm btn-linkedin" type="button">
                            <i class="mdi mdi-linkedin"></i>
                          </button>
                        </div>
                      </div>
                    <div class="input-group mt-2">
                        <input type="text" class="form-control" placeholder="enter twitter url" aria-label="Recipient's username" name="twitter_link" value="{{ $team->twitter_link }}">
                        <div class="input-group-append">
                          <button class="btn btn-sm btn-twitter" type="button">
                            <i class="mdi mdi-twitter"></i>
                          </button>
                        </div>
                      </div>
                      <div class="input-group mt-2">
                        <input type="text" class="form-control" placeholder="enter instagram url" aria-label="Recipient's username" value="{{ $team->instagram_link }}" name="instagram_link" >
                        <div class="input-group-append">
                          <button class="btn btn-sm btn-instagram" type="button">
                            <i class="mdi mdi-instagram"></i>
                          </button>
                        </div>
                      </div>
                    <div class="input-group mt-2">
                        <input type="text" class="form-control" placeholder="enter youtube url" aria-label="Recipient's username" name="youtube_link" value="{{ $team->youtube_link }}">
                        <div class="input-group-append">
                          <button class="btn btn-sm btn-youtube" type="button">
                            <i class="mdi mdi-youtube"></i>
                          </button>
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

