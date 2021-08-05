@extends('layouts.master')
@section('content')
<div class="banner-area all-text-white text-center" style="background-image: url(images/hero/{{ $slider->image ?? ''}});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">{{ $slider->header ?? 'Partners' }}</h1>
                <ul class="fund-breadcumb">
                    <li>{{ $slider->sub_header ?? 'Our Partners'}}</li>
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
                    <h2 class="section-title wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".1s">our<span class="base-color"> partners</span> </h2>
                    <div class="section-heading-separator wow fadeInUpXsd" data-wow-duration="1.1s" data-wow-delay="1s"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($partners->count() > 0)
            @foreach ($partners as $partner)
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 center mb20">
                    <div class="partner">
                        <img width="150" height="150" src="/images/partner/{{ $partner->image }}" alt="">
                    </div>
                </div>
            @endforeach
            @else
                <h2 class="text-center">No Partners</h2>
            @endif

        </div>
    </div>
</section>
@endsection

