@extends('layouts.master')
@section('content')
<div class="banner-area all-text-white text-center" style="background-image: url(images/hero/team.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">Meet Our team</h1>
                <ul class="fund-breadcumb">
                    <li>our team members</li>
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
                    <h2 class="section-title wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".1s">our<span class="base-color"> team</span> </h2>
                    <div class="section-heading-separator wow fadeInUpXsd" data-wow-duration="1.1s" data-wow-delay="1s"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($teams->count() > 0)
            @foreach ($teams as $team)
            <div class="team-block col-xl-3 col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="inner-box wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms"
                    style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                    <figure class="image-box"><a><img
                                src="images/team/{{ $team->image }}" alt=""></a>
                    </figure>
                    <div class="lower-box">
                        <div class="content">
                            <h3><a>{{ $team->name }}</a></h3>
                            <div class="designation">{{ $team->position }}</div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    @if ($team->phone )
                                    <li>
                                        <a href="{{ $team->phone }}" target="_blank" rel="nofollow">
                                            <i aria-hidden="true" class="fa fa-phone"></i> </a>
                                    </li>
                                    @endif
                                    @if ($team->email )
                                    <li>
                                        <a href="{{ $team->email }}" target="_blank" rel="nofollow">
                                            <i aria-hidden="true" class="fa fa-email"></i> </a>
                                    </li>
                                    @endif
                                    @if ($team->fb_link )
                                    <li>
                                        <a href="{{ $team->fb_link }}" target="_blank" rel="nofollow">
                                            <i aria-hidden="true" class="fa fa-facebook-f"></i> </a>
                                    </li>
                                    @endif
                                    @if ($team->twitter_link )
                                    <li>
                                        <a href="{{ $team->twitter_link }}" target="_blank" rel="nofollow">
                                            <i aria-hidden="true" class="fa fa-twitter"></i> </a>
                                    </li>
                                    @endif
                                    @if ($team->linkedin_link )
                                    <li>
                                        <a href="{{ $team->linkedin_link }}" target="_blank" rel="nofollow">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i> </a>
                                    </li>
                                    @endif
                                    @if ($team->instagram_link )
                                    <li>
                                        <a href="{{ $team->instagram_link }}" target="_blank" rel="nofollow">
                                            <i class="fa fa-instagram" aria-hidden="true"></i> </a>
                                    </li>
                                    @endif
                                    @if ($team->youtube_link )
                                    <li>
                                        <a href="{{ $team->youtube_link }}" target="_blank" rel="nofollow">
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
                <h2 class="text-center">No team</h2>
            @endif

        </div>
    </div>
</section>
@endsection

