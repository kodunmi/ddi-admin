<div id="add-project" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Add Project</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('project.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-center">
                    <div class="form-group">
                        <label for="service">what service does the project belongs ?</label>
                        <select class="custom-select" name="service" id="service">
                            <option value="1">Business Support & Enterprise Management</option>
                            <option value="2">Agricultural Value Chain Improvement</option>
                            <option value="3">Renewable/Off-Grid Energy Support</option>
                            <option value="4">Agricultural Commodity Market Access Services</option>
                            <option value="5">Youth/Women-led Enterprise Support</option>
                            <option value="6">Grants Management</option>
                            <option value="7">Employability Program</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Name of the project" required name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <textarea class="form-control" placeholder="project summary" required name="summary"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <textarea class="form-control summernote" placeholder="project description" required name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="venue of the project" required name="venue">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gradient-primary text-white"><i
                                        class="mdi mdi-account"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="sponsor of the project" required name="sponsor">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="inputFormRow">
                                <div class="input-group mb-3">
                                    <input type="file" name="images[]" class="form-control m-input" required placeholder="write the option to the question" autocomplete="off">
                                    <div class="input-group-append">
                                        <button id="addNewRow" type="button" class="btn btn-info">Add Row</button>
                                    </div>
                                </div>
                            </div>
                            <div id="newImgRow"></div>
                        </div>
                    </div>
                    <div class="form-check form-check-primary">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked name="feature"> Feature </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-gradient-primary mr-2">Add Tool</button>
                    <button class="btn btn-light" data-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
