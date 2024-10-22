<div class="sidebar sidebar-navigation active">
    <div class="logo_content">
        <a href="{{ route('dashboard') }}" class="logo">
            Logo
        </a>
    </div>
    <ul class="nav_list ps-0 scrollbar">
        <li class="category-li">
            <span class="link_names">Dashboard</span>
        </li>
        <li>
            <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? ' active-focus' : '' }}">
                <i class="ri-home-4-line"></i>
                <span class="link_names">Dashboard</span>
            </a>
        </li>


        <li class="category-li">
            <span class="link_names">Main</span>
        </li>

        <li>
            <a href="{{ route('categories.index') }}"
            class="{{ in_array(Route::currentRoutename(), ['categories.index', 'categories.create', 'categories.edit']) ? 'active-focus' : '' }}">
                <i class="ri-command-line"></i>
                <span class="link_names">Category</span>
            </a>
        </li>
        <li>
            <a href="{{ route('subcategories.index') }}"
            class="{{ in_array(Route::currentRoutename(), ['subcategories.index', 'subcategories.create', 'subcategories.edit']) ? 'active-focus' : '' }}">
                <i class="ri-menu-add-line"></i>
                <span class="link_names">Subcategory</span>
            </a>
        </li>
        <li>
            <a href="{{ route('products.index') }}"
            class="{{ in_array(Route::currentRoutename(), ['products.index', 'products.create', 'products.edit']) ? 'active-focus' : '' }}">
                <i class="ri-product-hunt-line"></i>
                <span class="link_names">Product</span>
            </a>
        </li>


    </ul>

        


    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">

                @if (Auth::user()->image)
                    <img id="sidebarImageDB" src="{{ asset(Auth::user()->image) }}" alt="img" width="30"
                        height="30" class="rounded-circle">
                @else
                    <i class="ri-user-3-line profile-icon"></i>
                @endif

                <div class="name_job">
                    <div class="name">{{ Auth::user()->name }}</div>
                    <div class="job">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="d-flex"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="ri-logout-box-r-line" id="log_out"></i>
                </a>
            </form>
        </div>
    </div>
</div>
