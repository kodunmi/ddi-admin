<nav class="mobile-background-nav">
    <div class="mobile-inner">
        <span class="mobile-menu-close"><i class="icon-icomooon-close"></i></span>
        <ul class="menu-accordion">
            <li><a href="{{ 'about' }}" class="has-submenu">Who we are <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown">
                    <li><a href="{{ 'about' }}">About Us</a></li>
                    <li><a href="{{ 'about' }}#values">Our Core Values</a></li>
                    <li><a href="{{ 'about' }}#visionandmission">Mission and Vision</a></li>
                    <li><a href="{{ 'about' }}#framework">Strategic framework</a></li>
                    <li><a href="{{ 'board' }}">Our Board</a></li>
                    <li><a href="{{ 'partners' }}">Our Partners</a></li>
                </ul>
            </li>
            <li><a class="has-submenu">What we do <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown">
                    <li><a href="{{ 'diplomacy' }}">Diplomacy</a></li>
                    <li><a href="{{ 'democracy' }}#values">Democracy</a></li>
                    <li><a href="{{ 'development' }}#visionandmission">Development</a></li>
                </ul>
            </li>
            {{--  <li><a href="events.html" class="has-submenu">Events<i class="fa fa-angle-down"></i></a>
                <ul class="dropdown">
                    <li><a href="events.html">Events</a></li>
                    <li><a href="event-details.html">Event Details</a></li>
                </ul>
            </li>  --}}
            {{--  <li><a href="blog.html" class="has-submenu">Blog<i class="fa fa-angle-down"></i></a>
                <ul class="dropdown">
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="blog-details.html">Blog Details</a></li>
                </ul>
            </li>  --}}
            {{--  <li><a href="causes.html" class="has-submenu">Causes<i class="fa fa-angle-down"></i></a>
                <ul class="dropdown">
                    <li><a href="causes.html">Causes</a></li>
                    <li><a href="causes-details.html">Causes Details</a></li>
                </ul>
            </li>  --}}
            <li><a href="/events">Events</a></li>
            <li><a href="{{ route('media') }}">Multimedia</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="{{ route('publications') }}">Publications</a></li>
       </ul>
    </div>
</nav>
<div class="main-menu-area main-menu-area--absolute slider-area">
    <div class="container">
        <div class="menu-logo">
            <div class="logo">
                <a href="/" class="logo-index"><img src="/images/logo.png" alt="" /></a>
            </div>
            <nav id="easy-menu">
                <ul class="menu-list">
                    <li><a href="{{ 'about' }}">Who we are <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown">
                            <li><a href="{{ 'about' }}">About Us</a></li>
                            <li><a href="{{ 'about' }}#values">Our Core Values</a></li>
                            <li><a href="{{ 'about' }}#visionandmission">Mission and Vision</a></li>
                            <li><a href="{{ 'about' }}#framework">Strategic framework</a></li>
                            <li><a href="{{ 'board' }}">Our Board</a></li>
                            <li><a href="{{ 'partners' }}">Our Partners</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('whatWeDo') }}">What we do <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown">
                            <li><a href="{{ route('diplomacy') }}">Diplomacy</a></li>
                            <li><a href="{{ route('democracy') }}">Democracy</a></li>
                            <li><a href="{{ route('development') }}">Development</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('events') }}">Events</a></li>
                    {{--  <li><a href="causes.html">Causes <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown">
                            <li><a href="causes.html">Causes</a></li>
                            <li><a href="causes-details.html">Causes Details</a></li>
                        </ul>
                    </li>  --}}
                    {{--  <li><a href="about-us.html">About Us</a></li>  --}}
                    <li><a href="{{ route('media') }}">Multimedia</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
               </ul>
           </nav><!--#easy-menu-->
           <div class="donate-button-wrap">
               <a href="{{ 'publications' }}" class="btn base-bg hidden-xs hidden-sm">Publications</a>
               <a href="#" class="hidden-lg hidden-md" id="humbarger-icon"><i class="fa fa-bars"></i> </a>
           </div>
        </div>
    </div>
</div>
