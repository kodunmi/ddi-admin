@extends('layouts.master')
@section('content')
<div class="body-overlay"></div>
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading text-center">
                    <h2 class="section-title wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".1s"><span class="base-color">{{ $meeting->name }}</span> </h2>
                    <div class="section-heading-separator wow fadeInUpXsd" data-wow-duration="1.1s" data-wow-delay="1s"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-justify">{{ $meeting->description }}</p>
            </div>
        </div>
        <div class="box-shadow-bottom pdb40">
            <div class="row">
                @forelse ($meeting->photos as $data)
                    <div class="col-md-4 col-sm-6">
                        <img src="/images/meetings/{{ $data->image }}" alt="">
                        <p class="text-center mt10">{{ $data->description }}</p>
                    </div>
                @empty
                    <h3 class="text-light text-center">No photos check back later</h3>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
