@extends('layouts.master')
@section('content')
<div class="body-overlay"></div>
<section class="section-padding pdr20 pdl20 section-bg-img" style="background-image: url('/images/home/deplomacy.jpg'); ">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-heading text-center">
                <h2 class="section-title wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".1s"><span class="base-color">What We DO</span> </h2>
                <div class="section-heading-separator wow fadeInUpXsd" data-wow-duration="1.1s" data-wow-delay="1s"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".2s">
            <div class="who-we-are">
                <div class="about-feature-two">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image-layer about-1"
                            style="background-image: url('/images/home/deplomacy.jpg')">
                        </div>
                        <div class="icon-box"><i class="fa fa-handshake-o" aria-hidden="true"></i>
                        </div>
                        <h4>Diplomacy</h4>
                        <div class="text">Lorem ipsum dolor sit amet
                            constur adipisicing elit sed.</div>
                        <div class="link-box"><a href="{{ route('diplomacy') }}" class="theme-btn btn-style-four">know
                                More</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".4s">
            <div class="who-we-are">
                <div class="about-feature-two">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="image-layer about-2"
                            style="background-image: url('/images/home/democracy.jpg')">
                        </div>
                        <div class="icon-box"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="50" height="50" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g xmlns="http://www.w3.org/2000/svg"><path d="m153.384 203.243c-2.371 0-4.653.386-6.792 1.089v-7.813c0-12.016-9.775-21.792-21.791-21.792-2.607 0-5.108.461-7.427 1.305-2.344-9.504-10.938-16.575-21.156-16.575s-18.812 7.07-21.156 16.575c-2.319-.844-4.82-1.305-7.427-1.305-12.016 0-21.792 9.775-21.792 21.735l-.6 79.562-10.536-10c-7.668-7.276-19.502-7.577-27.53-.697-8.517 7.3-9.58 20.229-2.371 28.82 1.927 2.296 56.24 67.236 58.193 69.149-7.196 4.745-11.957 12.897-11.957 22.142v119.062c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-88.61h94.131v88.61c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-119.061c0-8.874-4.388-16.739-11.103-21.553 6.835-6.559 11.103-15.773 11.103-25.972v-112.88c.003-12.015-9.773-21.791-21.789-21.791zm6.792 197.647h-94.132v-15.45c0-6.347 5.163-11.51 11.51-11.51h71.112c6.347 0 11.51 5.163 11.51 11.51zm0-62.975c0 11.588-9.427 21.015-21.015 21.015h-50.627c-6.228 0-12.097-2.737-16.1-7.509l-56.134-66.913c-1.949-2.323-1.661-5.817.641-7.791 2.17-1.859 5.371-1.777 7.443.188l18.055 17.138c3.035 2.88 7.484 3.686 11.336 2.047 3.851-1.637 6.359-5.398 6.392-9.584l.678-89.986c0-3.745 3.047-6.792 6.792-6.792s6.792 3.047 6.792 6.792v60.786c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-76.056c0-3.745 3.047-6.792 6.792-6.792s6.792 3.047 6.792 6.792v76.056c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-60.786c0-3.745 3.047-6.792 6.792-6.792s6.791 3.047 6.791 6.792v60.786c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-32.271c0-3.745 3.047-6.792 6.792-6.792s6.792 3.047 6.792 6.792v112.88zm148.14-123.783c2.387-2.281 59.256-70.345 61.541-73.068 7.448-8.877 6.349-22.233-2.448-29.774-8.292-7.108-20.52-6.798-28.441.721l-11.737 11.14-.637-84.55c0-12.426-10.109-22.536-22.536-22.536-2.852 0-5.58.538-8.093 1.509-2.269-10.046-11.259-17.574-21.98-17.574s-19.711 7.528-21.978 17.574c-2.514-.971-5.241-1.509-8.093-1.509-12.426 0-22.536 10.109-22.536 22.536v8.765c-2.358-.839-4.893-1.3-7.536-1.3-12.426 0-22.536 10.109-22.536 22.536v118.758c0 10.788 4.586 20.521 11.902 27.369-7.184 4.966-11.902 13.256-11.902 22.631v267.14c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-235.494h99.815v235.494c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-267.14c.001-9.762-5.117-18.346-12.805-23.228zm-102.01-145.531c0-4.155 3.38-7.536 7.536-7.536s7.536 3.38 7.536 7.536v33.952c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-63.952c0-4.155 3.381-7.536 7.536-7.536s7.536 3.38 7.536 7.536v63.952c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-63.952-16.065c0-4.155 3.38-7.536 7.536-7.536s7.536 3.38 7.536 7.536v16.065 63.952c0 4.142 3.358 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-63.952c0-4.155 3.381-7.536 7.536-7.536s7.536 3.38 7.536 7.592l.716 94.974c.032 4.185 2.541 7.946 6.392 9.583 3.851 1.638 8.301.834 11.336-2.047l19.257-18.277c2.327-2.207 5.917-2.298 8.353-.211 2.583 2.215 2.906 6.137.719 8.744l-59.057 70.398c-4.286 5.109-10.569 8.039-17.238 8.039h-53.264c-12.407 0-22.5-10.093-22.5-22.5v-118.759zm99.816 185.405h-99.815v-16.646c0-6.893 5.607-12.5 12.5-12.5h74.815c6.893 0 12.5 5.607 12.5 12.5zm201.069 40.142c7.209-8.592 6.146-21.521-2.371-28.82-8.025-6.879-19.861-6.579-27.53.698l-10.536 9.999-.599-79.505c0-12.016-9.775-21.792-21.792-21.792-2.607 0-5.108.461-7.427 1.305-2.344-9.505-10.938-16.575-21.156-16.575s-18.812 7.071-21.156 16.575c-2.319-.843-4.82-1.305-7.427-1.305-12.016 0-21.791 9.775-21.791 21.792v7.813c-2.139-.703-4.42-1.089-6.792-1.089-12.016 0-21.792 9.776-21.792 21.792v112.88c0 10.198 4.268 19.413 11.103 25.972-6.715 4.814-11.103 12.678-11.103 21.553v119.059c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-88.61h71.631c4.142 0 7.5-3.357 7.5-7.5s-3.358-7.5-7.5-7.5h-71.631v-15.45c0-6.347 5.163-11.51 11.51-11.51h71.112c6.347 0 11.51 5.163 11.51 11.51v119.06c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-119.061c0-9.246-4.761-17.397-11.957-22.142 1.97-1.932 56.283-66.87 58.194-69.149zm-67.625 57.273c-4.003 4.771-9.872 7.509-16.1 7.509h-50.627c-11.587 0-21.015-9.427-21.015-21.015v-112.88c0-3.745 3.047-6.792 6.792-6.792s6.792 3.047 6.792 6.792v32.271c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-60.786c0-3.745 3.047-6.792 6.792-6.792s6.791 3.047 6.791 6.792v60.786c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-60.786-15.27c0-3.745 3.047-6.792 6.792-6.792s6.792 3.047 6.792 6.792v76.056c0 4.143 3.358 7.5 7.5 7.5s7.5-3.357 7.5-7.5v-60.786c0-3.745 3.047-6.792 6.792-6.792s6.792 3.047 6.792 6.848l.678 89.93c.032 4.185 2.541 7.946 6.392 9.583 3.851 1.636 8.3.833 11.337-2.048l18.054-17.136c2.073-1.967 5.273-2.049 7.443-.189 2.302 1.974 2.59 5.468.641 7.791z" fill="#ffffff" data-original="#000000" style="" class=""/></g></g></svg>

                        </div>
                        <h4>Democracy</h4>
                        <div class="text">Lorem ipsum dolor sit amet
                            constur adipisicing elit sed.</div>
                        <div class="link-box"><a href="{{ route('democracy') }}" class="theme-btn btn-style-four">know
                                More</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".4s">
            <div class="who-we-are">
                <div class="about-feature-two">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="image-layer about-3"
                            style="background-image: url('/images/home/development.png')">
                        </div>
                        <div class="icon-box"><i class="fa fa-money"></i>
                        </div>
                        <h4>Development</h4>
                        <div class="text">Lorem ipsum dolor sit amet
                            constur adipisicing elit sed.</div>
                        <div class="link-box"><a href="{{ route('development') }}" class="theme-btn btn-style-four">know
                                More</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
@endsection
