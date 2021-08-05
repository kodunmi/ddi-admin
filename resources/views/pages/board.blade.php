@extends('layouts.master')
@section('content')
<div class="banner-area all-text-white text-center" style="background-image: url(images/hero/{{ $slider->image ?? ''}});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">{{ $slider->header ?? 'Our Board' }}</h1>
                <ul class="fund-breadcumb">
                    <li>{{ $slider->sub_header ?? '' }}</li>
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
                    <h2 class="section-title wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".1s">our<span class="base-color"> board</span> </h2>
                    <div class="section-heading-separator wow fadeInUpXsd" data-wow-duration="1.1s" data-wow-delay="1s"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($boards->count() > 0)
            @foreach ($boards as $board)
            <div class="team-block col-xl-3 col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="inner-box wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms"
                    style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                    <figure class="image-box"><a><img
                                src="images/board/{{ $board->image }}" alt=""></a>
                    </figure>
                    <div class="lower-box">
                        <div class="content">
                            <h3><a>{{ $board->name }}</a></h3>
                            <div class="designation">{{ $board->position }}</div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    @if ($board->fb_link )
                                    <li>
                                        <a href="{{ $board->fb_link }}" target="_blank" rel="nofollow">
                                            <i aria-hidden="true" class="fa fa-facebook-f"></i> </a>
                                    </li>
                                    @endif
                                    @if ($board->twitter_link )
                                    <li>
                                        <a href="{{ $board->twitter_link }}" target="_blank" rel="nofollow">
                                            <i aria-hidden="true" class="fa fa-twitter"></i> </a>
                                    </li>
                                    @endif
                                    @if ($board->linkedin_link )
                                    <li>
                                        <a href="{{ $board->linkedin_link }}" target="_blank" rel="nofollow">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i> </a>
                                    </li>
                                    @endif
                                    @if ($board->youtube_link )
                                    <li>
                                        <a href="{{ $board->youtube_link }}" target="_blank" rel="nofollow">
                                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                         </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <h2 class="text-center">No board</h2>
            @endif

        </div>
    </div>
</section>
@endsection

