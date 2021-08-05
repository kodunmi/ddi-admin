<footer class="fund-footer">
    <div class="main-footer all-text-white section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-footer__top text-center pdb10">
                        <a href="#" class="footer-logo"><img src="/images/logo.png" alt="logo"></a>
                        <p>{{ $about->text ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="row row-eq-rs-height">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="widget widget--footer widget--userfull-link">
                        <div class="widget__heading">
                            <h4 class="widget__title">USEFULL LINKS</h4>
                        </div>
                        <div class="widget__text-content">
                            <ul>
                                <li>Join our volunteer team.</li>
                                <li>Read our Letest News.</li>
                                <li>Check the upcoming Events.</li>
                                <li>Watch Our Mission.</li>
                                <li>Privacy & cookies policy.</li>
                            </ul>
                        </div>
                    </div><!--/.widget-->
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="widget widget--footer widget--contact">
                        <div class="widget__heading">
                            <h4 class="widget__title">QUICK CONTACT</h4>
                        </div>
                        <div class="widget__text-content">
                            <div class="contact-way">
                                <span class="base-bg contact-icon"><i class="fa fa-location-arrow"></i></span>
                                <span class="contact-text">{{ $contact->address  ?? ''}}</span>
                            </div>
                            <div class="contact-way">
                                <span class="base-bg contact-icon"><i class="fa fa-phone"></i></span>
                                <span class="contact-text">{{ $contact->phone_1  ?? ''}}</span>
                            </div>
                            <div class="contact-way">
                                <span class="base-bg contact-icon"><i class="fa fa-envelope-o"></i></span>
                                <span class="contact-text">{{ $contact->email  ?? ''}}</span>
                            </div>
                            <div class="social-icons pdt5">
                                <span>Follow Us On : </span>
                                <ul class="list-inline pdl20">
                                    <li><a href="{{ $about->fb_link ?? '#'}}"><i class="fa fa-facebook"></i> </a> </li>
                                    <li><a href="{{ $about->twitter_link ?? '#'}}"><i class="fa fa-twitter"></i> </a> </li>
                                    <li><a href="{{ $about->linkedin_link ?? '#'}}"><i class="fa fa-linkedin"></i> </a> </li>
                                    <li><a href="{{ $about->youtube_link ?? '#'}}"><i class="fa fa-youtube-play" aria-hidden="true"></i> </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div><!--/.widget-->
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="widget widget--footer widget--userfull-link">
                        <div class="widget__heading">
                            <h4 class="widget__title">NEWSLETTERS</h4>
                        </div>
                        <div class="widget__text-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicingse elit do eiusmod.</p>
                            <form class="newsletter-form" id="subscribe" method="POST" action="{{ route('subscribe') }}">
                                <input type="email" placeholder="Your email address" class="form-control newsletter-form__input" id="subscriber_email"/>
                                <input type="submit"  value="JOIN US" class="btn base-bg newsletter-form__submit">
                            </form>
                        </div>
                    </div><!--/.widget-->
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area all-text-white pdt25 pdb25">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="copyright-text text-xs-center">
                        {{ $about->footnote ?? '' }}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <ul class="footer-menu text-xs-center">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <a href="#" id="toTop" class="cd-top"><i class="fa fa-angle-up"></i></a>
</footer>
