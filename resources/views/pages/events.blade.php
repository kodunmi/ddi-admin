@extends('layouts.master')
@section('content')
<div class="banner-area all-text-white text-center" style="background-image: url(/images/event.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">Our Events</h1>
                <ul class="fund-breadcumb">
                    <li>List Of Upcoming Events</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="body-overlay"></div>
<section class="section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading text-center">
                    <h2 class="section-title wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".1s">our<span class="base-color"> event</span> </h2>
                    <div class="section-heading-separator wow fadeInUpXsd" data-wow-duration="1.1s" data-wow-delay="1s"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($events->count() > 0)
            @foreach ($events as $event)
                <div class="col-md-6 col-sm-6">
                    <div class="upcomming-event">
                        <div class="upcomming-event__image-wrap">
                            <img data-toggle="modal" data-target="#my-modal{{ $event->id }}" height="170" width="170" src="images/events/{{ $event->image }}" class="upcomming-event__image" alt="event">
                            <div class="upcomming-event__date">
                                <i class="fa fa-calendar"></i>
                                <span>{{ $event->day }}  {{ $event->month }}</span>
                            </div>
                        </div>
                        <div class="upcomming-event__text-content">
                            <h4 data-toggle="modal" data-target="#my-modal{{ $event->id }}" class="upcomming-event__title"><a>{{ Str::limit($event->title, 20) }}</a></h4>
                            <div class="upcomming-event__meta-info">
                                <span class="upcomming-event__time"><i class="fa fa-clock-o base-color"></i>{{ $event->time }} </span>
                            </div>
                            {{--  <p>{{ str_limit($event->description, $limit = 150, $end = '...') }}</p>  --}}
                            <p>{{ Str::limit($event->description, 150) }}</p>
                        </div>
                    </div><!--/.upcomming-event-->
                </div>

                {{--  modal  --}}

                <div id="my-modal{{ $event->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="my-modal-title">{{ $event->title }}</h5>
                                <button class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $event->description }}</p>
                                <span class="text-muted">{{ $event->month }}</span>
                                <span class="text-muted">{{ $event->day }}</span>
                                <span class="text-muted">{{ $event->time }}</span>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
            @else
                <h2 class="text-center">No event</h2>
            @endif

        </div>
    </div>
</section>
@endsection
