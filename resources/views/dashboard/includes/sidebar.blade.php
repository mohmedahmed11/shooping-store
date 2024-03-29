<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{url('/')}}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Hasnaa Store</h2>
                </a></li>
            {{-- <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li> --}}
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item"><a href="{{url('/admin')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">الرئيسية</span></a>

            </li>

            <li class=" navigation-header"><span>Apps</span>
            </li>

            <li class=" nav-item"><a href="{{route('category')}}"><i class="feather icon-menu"></i><span class="menu-title" data-i18n="Dashboard">الاقسام</span><span class="badge badge badge-warning badge-pill float-right mr-2">{{ App\Models\Category::count() }}</span></a>

            </li>
            <li class=" nav-item"><a href="table-ag-grid.html">
                <i class="feather icon-grid"></i>
                <span class="menu-title" data-i18n="ag-grid">القائمة الرئيسية</span>
                <span class="badge badge badge-primary badge-pill float-right mr-2">New</span>
              </a>
                <ul class="menu-content">

                    <li><a href="{{route('homeApps')}}"><i class="feather icon-trending-up"></i><span class="menu-item" data-i18n="Shop"> الأكثر مببيعاً</span></a>
                    </li>
                    <li><a href="{{route('latestproducts')}}"><i class="feather icon-heart"></i><span class="menu-item" data-i18n="Details"> أحدث العروض</span></a>
                    </li>
                               </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Ecommerce">المنتجات</span></a>
                <ul class="menu-content">
                    <li><a href="{{route('products')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">عرض المنتجات</span></a></li>
                    <li><a href="{{route('product.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">اضافة منتج</span></a></li>
                    <li><a href="{{ route('suppliers') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">الموردين</span></a></li>
                    <li><a href="{{ route('trademarks') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">العلامات التجاريه</span></a></li>

                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Ecommerce">الطلبات</span></a>
                <ul class="menu-content">
                    <li><a href="{{route('order')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">عرض الطلبات </span></a></li>
                    {{--  <li><a href="{{ route('order.create') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">اضافه طلب</span></a></li>  --}}
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Ecommerce">الاعدادات</span></a>
                <ul class="menu-content">
                    <li><a href="{{route('regon')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">مناطق التوصيل</span></a></li>
                    <li><a href="{{ route('banner') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">إعلانات</span></a></li>
                    <li><a href="{{ route('banner.create') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">اضافه إعلان</span></a></li>
                    <li><a href="{{ route('settings') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">إعدادات التطبيق</span></a></li>
                    <li><a href="{{ route('notification') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">الاشعارات</span></a></li>
                    @if (auth()->user()->hasPermission('users_read'))
                        <li><a href="{{route('admins')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">المشرفين</span></a></li>
                    @endif
                    <li><a href="{{route('customers')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">العملاء</span></a></li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="feather icon-database"></i><span class="menu-title" data-i18n="Ecommerce">الخزينة</span></a>
                <ul class="menu-content">
                    <li><a href="{{route('revenues')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop"> الايرادات </span></a></li>
                    <li><a href="{{ route('expenses') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">المصروفات</span></a></li>
                    <li><a href="{{ route('retriever') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">المسترجع</span></a></li>
                    <li><a href="{{ route('capital') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">سجل الدفيات</span></a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
