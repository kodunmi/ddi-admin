@extends('layouts.master')
@section('content')
<div class="banner-area all-text-white text-center" style="background-image: url(images/hero/{{ $slider->image ?? ''}});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">{{ $tool->name }}</h1>
                <ul class="fund-breadcumb">
                    <li>{{ $tool->what_we_do }}</li>
                    <li>{{ $tool->name }}</li>
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
                    <h2 class="section-title wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".1s"><span class="base-color">{{ $tool->name }}</span></h2>
                    <div class="section-heading-separator wow fadeInUpXsd" data-wow-duration="1.1s" data-wow-delay="1s"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($tool->meetings as $item)
            <div class="col-md-4">
                <div class="meeting-card">
                    <ul class="ul">
                        @foreach ($item->photos as $img)
                            <li>
                                <img src="/images/meetings/{{ $img->image }}" style="border-radius: "/>
                            </li>
                            @if ($loop->iteration == 3)
                                @break
                            @endif

                        @endforeach
                    </ul>
                    <img class="cover-img" src="/images/meetings/{{ $item->image }}" alt="Paris">
                    <div class="con-text">
                        <h3 class="text-light">{{ $item->name }}</h3>
                        <p>
                            {{ Str::limit($item->description, 150) }}

                            <a href="{{ route('meeting',['meeting' => $item->id]) }}">See more</a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

