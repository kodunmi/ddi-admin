@extends('admin.layout._master')
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span> Setting </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i
                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="text-center mt-2 mb-2">
            @include('layouts._error')
            @include('layouts._alert')
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>About Text</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('about.update') }}" method="POST">
                            @csrf
                            <textarea class="form-control" name="text" rows="3">{{ $about->text ?? '' }}</textarea>
                            <button type="submit" class="btn btn-primary mt-2">Update About Text</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Social media links</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('about.update') }}" method="POST">
                            @csrf
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="enter facebook url" aria-label="Recipient's username" name="fb_link" value="{{ $about->fb_link ?? ''}}">
                                <div class="input-group-append">
                                  <button class="btn btn-sm btn-facebook" type="button">
                                    <i class="mdi mdi-facebook"></i>
                                  </button>
                                </div>
                              </div>
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="enter linkedin url" aria-label="Recipient's username" name="linkedin_link" value="{{ $about->linkedin_link  ?? ''}}">
                                <div class="input-group-append">
                                  <button class="btn btn-sm btn-linkedin" type="button">
                                    <i class="mdi mdi-linkedin"></i>
                                  </button>
                                </div>
                              </div>
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="enter twitter url" aria-label="Recipient's username" name="twitter_link" value="{{ $about->twitter_link  ?? ''}}">
                                <div class="input-group-append">
                                  <button class="btn btn-sm btn-twitter" type="button">
                                    <i class="mdi mdi-twitter"></i>
                                  </button>
                                </div>
                              </div>
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="enter youtube url" aria-label="Recipient's username" name="youtube_link" value="{{ $about->youtube_link  ?? ''}}">
                                <div class="input-group-append">
                                  <button class="btn btn-sm btn-youtube" type="button">
                                    <i class="mdi mdi-youtube"></i>
                                  </button>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary mt-2">Update Links</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Counter</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('about.update') }}" method="POST">
                            @csrf
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="Lives We've Touched" aria-label="Recipient's username" name="lives" value="{{ $about->lives ?? ''}}">
                              </div>
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="Projects We've Done" aria-label="Recipient's username" name="projects" value="{{ $about->projects  ?? ''}}">
                              </div>
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="State We Work" aria-label="Recipient's username" name="states" value="{{ $about->states  ?? ''}}">
                              </div>
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="grant managed" aria-label="Recipient's username" name="grants" value="{{ $about->grants  ?? ''}}">
                              </div>
                              <button type="submit" class="btn btn-primary mt-2">Update Counter</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Foot Note
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('about.update') }}" method="POST">
                            @csrf
                            <input class="form-control" name="footnote" rows="3" value="{{ $about->footnote ?? '' }}">
                            <button type="submit" class="btn btn-primary mt-2">Update Footnote</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.modals.add-slide',['page' => 'home'])
    @include('admin.modals.add-admin')
@endsection

