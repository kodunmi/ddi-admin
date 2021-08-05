@extends('layouts.master')
@section('content')
<div class="body-overlay"></div>
<section class="section-padding pdr20 pdl20 section-bg-img" style="background-image: url('/images/home/development.png'); ">

<div>
    <div class="row">
        <div class="col-md-12">
            <div class="section-heading text-center">
                <h2 class="section-title wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".1s"><span class="base-color">Development</span> </h2>
                <div class="section-heading-separator wow fadeInUpXsd" data-wow-duration="1.1s" data-wow-delay="1s"></div>
            </div>
        </div>
    </div>
    <div class="row">
        @forelse ($tools as $tool)
        <div class="col-md-6 wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".2s">
            <div class="course">
                <div class="course-preview" style="background-color: {{ $tool->color }}">
                    <i class="icon fa fa-{{ $tool->icon }}" aria-hidden="true"></i>
                    <a href="{{ route('tool',['tool' => $tool->id]) }}">View all meetings <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="course-info">
                    <div class="progress-container">
                        <div class="progress" style="background-color: {{ $tool->color }}"></div>
                        <span class="progress-text">
                            {{ $loop->iteration }}/{{ $tools->count() }}
                        </span>
                    </div>
                    <div class="course-info-text">
                        <h6>Democracy</h6>
                        <h2 class="mt5">{{ $tool->name }}</h2>
                    </div>
                    <a href="{{ route('tool',['tool' => $tool->id]) }}" class="course-btn" style="background-color: {{ $tool->color }}">View</a>
                </div>
            </div>
        </div>
        @empty
            <h3 class="text-center text-light pr">No Tools</h3>
        @endforelse
    </div>
</div>

</section>
@endsection
