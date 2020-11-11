<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name">Essam Abdelnaby</p>
            <p class="app-sidebar__user-designation">Backend Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'dashboard.index' ? 'active' : '' }}"
                href="{{ route('dashboard.index')}}" >
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>

        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'categories.index' ? 'active' : '' }}"
               href="{{ route('categories.index') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Categories</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'brands.index' ? 'active' : '' }}"
               href="{{ route('brands.index') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Brands</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'products.index' ? 'active' : '' }}"
               href="{{ route('products.index') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Products</span>
            </a>
        </li>
    </ul>
</aside>
