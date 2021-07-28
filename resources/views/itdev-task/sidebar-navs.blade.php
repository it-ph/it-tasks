
<section class="header-section">
    <section class="header-container">
        <a href="{{ route('itdev-task.dashboard') }}">
            <img src="{{ asset('personiv/logo-white.png') }}" onclick="{{ route('itdev-task.dashboard') }}" width="40px" alt="logo">
            <h1>IT Team Tasks </h1>
        </a>
    </section>

    <?php
        $segment = Request::segment(2);  // specify the # of segment position to get
        //  echo $segment;
    ?>

    <span>
        <i class='bx bxs-user-circle'></i>
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('profile.changepassword') }}">
                <i class='bx bx-cog' ></i> {{ __('My Profile') }}
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out'></i> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </span>
</section>

<section id="sidebar">
    {{-- <section class="links-1-container">
        <a href="{{ route('itdev-task.dashboard') }}" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false">
            <div class="links-1">
                <div class="icon">
                    <i class='bx bxs-user-circle'></i>
                </div>
                <span>{{ Auth::user()->name }}</span>
            </div>
        </a>
        </section>
    --}}

    <section class="links-container">
        {{-- <div class="row mb-2">
            <div class="col">
                <div class="collapse multi-collapse">
                    <a class="dropdown-item" href="{{ route('profile.settings') }}">
                        <i class='bx bx-cog' ></i> {{ __('My Profile') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class='bx bx-log-out'></i> {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div> --}}
        <a href="{{ route('itdev-task.dashboard') }}">
            <div class="links @if($segment==strtoLower('Dashboard') || Request::segment(1)==strtoLower('Home'))
                links-active
                @endif
            ">
                <div class="icon">
                    <i class='bx bxs-dashboard'></i>
                </div>
                <span>Dashboard</span>
            </div>
        </a>
        <a href="{{ route('itdev-task.tasklist') }}">
            <div class="links @if($segment==strtoLower('task'))
                links-active
                @endif
            ">
                <div class="icon">
                    <i class='bx bx-task'></i>
                </div>
                <span>Tasks</span>
            </div>
        </a>
        <a href="{{ route('itdev-task.typelist') }}">
            <div class="links @if($segment==strtoLower('type'))
                links-active
                @endif
            ">
                <div class="icon">
                    <i class='bx bx-category'></i>
                </div>
                <span>Type</span>
            </div>
        </a>
        <a href="{{ route('itdev-task.statlist') }}">
            <div class="links @if($segment==strtoLower('status'))
                links-active
                @endif
            ">
                <div class="icon">
                    <i class='bx bx-stats'></i>
                </div>
                <span>Status</span>
            </div>
        </a>
        </a>
        <a href="{{ route('itdev-task.overdue') }}">
            <div class="links @if($segment==strtoLower('overdue'))
                links-active
                @endif
            ">
                <div class="icon">
                    <i class='bx bx-timer'></i>
                </div>
                <span>Overdue</span>

                    @if(countOverdues() > 0 )
                        <span id="overdue_notif" class="badge badge-danger" style="margin-left:25px; padding:4px 4px">
                        {{ countOverdues() }}
                    @endif
                </span>
            </div>
        </a>
    </section>
</section>
