<header class="fund-header">
    <div class="top-bar base-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 text-xs-center">
                    <div class="top-bar__contact">
                        <i class="fa fa-envelope"></i> <span class="pdl5">{{ $contact->email ?? ''}}</span>
                        <span class="pdl15 pdr15">|</span>
                        <i class="fa fa-phone-square"></i> <span class="pdl5">{{ $contact->phone_1 ?? ''}}</span>
                    </div>
                </div>
                <div class="col-sm-6 text-right text-xs-center">
                    <div class="social-icons ">
                        <span>Follow Us On : </span>
                        <ul class="list-inline pdl20">
                            <li><a href="{{ $about->fb_link ?? '#'}}"><i class="fa fa-facebook"></i> </a> </li>
                            <li><a href="{{ $about->twitter_link ?? '#'}}"><i class="fa fa-twitter"></i> </a> </li>
                            <li><a href="{{ $about->linkedin_link ?? '#'}}"><i class="fa fa-linkedin"></i> </a> </li>
                            <li><a href="{{ $about->youtube_link ?? '#'}}"><i class="fa fa-youtube-play" aria-hidden="true"></i> </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
