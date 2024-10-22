<header>
    <div id="top-navbar" class="container-fluid">
        <div class="left-header-content">
            <div>
                <i class="ri-menu-2-line" id="btn" style="font-size: 22px;"></i>
            </div>
        </div>
        
        <ul>
            <li>
                <a href="#" class="dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center"> 
                        <div class="me-sm-2 me-0">
                            <img id="profileImage" class="d-none" src="" alt="img" width="30" height="30" class="rounded-circle"> 
                            
                            @if(Auth::user()->image)
                                <img id="profileImageDB" src="{{ asset(Auth::user()->image) }}" alt="img" width="30" height="30" class="rounded-circle"> 
                            @else
                                <i class="ri-user-3-line profile-icon"></i>
                            @endif
                            
                        </div> 
                        <div> 
                            <p class="fw-semibold mb-0 lh-1">{{ Auth::user()->name }}</p>
                            <span class="op-7 fw-normal d-block fs-11">{{ Auth::user()->designation }}</span>
                        </div>
                    </div>
                </a>

                <ul class="main-header-dropdown dropdown-menu">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item d-flex" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="ri-logout-box-r-line fs-18 me-3 op-7"></i>Log Out
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
