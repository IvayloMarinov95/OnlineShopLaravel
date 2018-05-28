<header class="top-nav">
        <nav>
            <ul>
                <li {{Request::is('admin')? 'class=active' : '' }}><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li {{Request::is('admin/product*')? 'class=active' : '' }}><a href="{{ route('admin.shop.index') }}">Products</a></li>
                <li {{Request::is('admin/category*') || Request::is('admin/shop/categories*') ? 'class=active' : '' }}><a href="{{ route('admin.shop.categories') }}">Categories</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
            </ul>
        </nav>
</header>