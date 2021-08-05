<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
            <img src={{ "https://ui-avatars.com/api/?name=".auth()->user()->lastname."+".auth()->user()->firstname."&background=9a55ff&color=fff&size=50" }} alt="image">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{auth()->user()->firstname.' '.auth()->user()->lastname}}</span>
          <span class="text-secondary text-small">Project Manager</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard'? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item {{ Route::currentRouteName() == 'setting.page'? 'active' : ''}}">
        <a class="nav-link" href="{{ route('setting.page') }}">
          <span class="menu-title">setting</span>
          <i class="mdi mdi-settings menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Edit Pages</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse {{ Route::currentRouteName() == 'home.page' || Route::currentRouteName() == 'board.page' || Route::currentRouteName() == 'partners.page' || Route::currentRouteName() == 'program.page' || Route::currentRouteName() == 'multimedia.page' || Route::currentRouteName() == 'contact.page'? 'show' : '' }}" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item {{ Route::currentRouteName() == 'home.page'? 'active' : '' }}"> <a class="nav-link" href="{{ route('home.page')}}">Home</a></li>
            <li class="nav-item {{ Route::currentRouteName() == 'board.page'? 'active' : '' }}"> <a class="nav-link" href="{{ route('board.page') }}">Board</a></li>
            <li class="nav-item {{ Route::currentRouteName() == 'partners.page'? 'active' : '' }}"> <a class="nav-link" href="{{ route('partners.page') }}">Partners</a></li>
            {{-- <li class="nav-item {{ Route::currentRouteName() == 'program.page'? 'active' : '' }}"> <a class="nav-link" href="{{ route('program.page') }}">Program</a></li>
            <li class="nav-item {{ Route::currentRouteName() == 'publications.page'? 'active' : '' }}"> <a class="nav-link" href="{{ route('publications.page') }}">Publication</a></li> --}}
            <li class="nav-item {{ Route::currentRouteName() == 'events.page'? 'active' : '' }}"> <a class="nav-link" href="{{ route('events.page') }}">Event</a></li>
            {{-- <li class="nav-item {{ Route::currentRouteName() == 'multimedia.page'? 'active' : '' }}"> <a class="nav-link" href="{{ route('multimedia.page') }}">Multimedia</a></li> --}}
            <li class="nav-item {{ Route::currentRouteName() == 'contact.page'? 'active' : '' }}"> <a class="nav-link" href="{{ route('contact.page') }}">Contact</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
          <span class="menu-title">What We Do</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse {{ Route::currentRouteName() == 'project.page' || Route::currentRouteName() == 'service.page' ? 'show'  : '' }}" id="ui-basic3">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item {{ Route::currentRouteName() == 'service.page'? 'active' : '' }}"> <a class="nav-link" href="{{ route('service.page')}}">Areas of focus</a></li>
            <li class="nav-item {{ Route::currentRouteName() == 'project.page'? 'active' : '' }}"> <a class="nav-link" href="{{ route('project.page') }}">Projects</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
          <span class="menu-title">Impact (multimedia)</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse {{ Route::currentRouteName() == 'photo.page' || Route::currentRouteName() == 'video.page' || Route::currentRouteName() == 'story.page' ? 'show'  : '' }}" id="ui-basic2">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item {{ Route::currentRouteName() == 'story.page'? 'active' : '' }}"> <a class="nav-link" href="{{ route('story.page')}}">Sucess Story</a></li>
            <li class="nav-item {{ Route::currentRouteName() == 'photo.page'? 'active' : '' }}"> <a class="nav-link" href="{{ route('photo.page') }}">Photos</a></li>
            <li class="nav-item {{ Route::currentRouteName() == 'video.page'? 'active' : '' }}"> <a class="nav-link" href="{{ route('video.page') }}">Videos</a></li>
          </ul>
        </div>
      </li>
      {{--  <li class="nav-item">
        <a class="nav-link" href="{{ route('tools.page') }}">
          <span class="menu-title">Tools</span>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
      </li>  --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('blog.index') }}">
          <span class="menu-title">Blog</span>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('news.page') }}">
          <span class="menu-title">News</span>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('career.page') }}">
          <span class="menu-title">Career</span>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('testimony.page') }}">
          <span class="menu-title">Testimony</span>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('story.page') }}">
          <span class="menu-title">Story</span>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('message.all') }}">
          <span class="menu-title">Messages</span>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('mailin.list') }}">
          <span class="menu-title">Mailing List</span>
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        </a>
      </li>
    <li class="nav-item sidebar-actions">
      <span class="nav-link">
        <div class="border-bottom">
          <h6 class="font-weight-normal mb-3">Administrator</h6>
        </div>
        <button class="btn btn-block btn-lg btn-gradient-primary mt-4" type="button" data-toggle="modal" data-target="#add-admin">+ Add Admin</button>
      </span>
    </li>
  </ul>
</nav>
