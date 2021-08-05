@extends('layouts.master')
@section('content')
<div class="banner-area all-text-white text-center" style="background-image: url(images/hero/{{ $slider->image ?? ''}});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">{{ $slider->header ?? 'Our Gallery' }}</h1>
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
        <div class="row img">
            <ul>
                @forelse ($photos as $photo)
                    <li>
                        <img src="/images/galary/{{ $photo->image }}" alt="">
                    </li>
                @empty
                    <h3 class="text-center">No photos for now, check back later</h3>
                @endforelse
            </ul>
        </div>
    </div>
</section>
@endsection

