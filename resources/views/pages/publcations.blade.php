@extends('layouts.master')
@section('content')
<div class="body-overlay"></div>
<section class="section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading text-center">
                    <h2 class="section-title wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".1s">our<span class="base-color"> publications</span> </h2>
                    <div class="section-heading-separator wow fadeInUpXsd" data-wow-duration="1.1s" data-wow-delay="1s"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($publications->count() > 0)
            @foreach ($publications as $publication)
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 center mb20">
                    <div class="publication" data-toggle="modal" data-target="#{{ $publication->id }}">
                        <img width="200" height="250" src="/images/publications/{{ $publication->image }}" alt="">
                    </div>
                </div>
                <div id="{{ $publication->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="my-modal-title">{{ $publication->name }}</h5>
                                <button class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $publication->description }}</p>
                            </div>
                            <div class="modal-footer">
                                <div class="btn-group" role="group" aria-label="Vertical button group">
                                    <a href="{{ route('publication.download', ['id' => $publication->id]) }}" class="btn btn-primary" type="button"> <span>{{ $publication->count()->sum('counts') }}</span> Downloads</a>
                                    <a href="/documents/publications/{{ $publication->doc }}" target="_blank" class="btn btn-info" type="button">Read</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <h2 class="text-center">No publications</h2>
            @endif
        </div>
    </div>
</section>
@endsection
