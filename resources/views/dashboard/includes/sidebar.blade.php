<!-- BEGIN: SIDBAR-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{url('/')}}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Alhasnaa store</h2>
                </a></li>
            {{-- <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li> --}}
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            
            <li class=" nav-item"><a href="{{url('/')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Main Dash</span><span class="badge badge badge-warning badge-pill float-right mr-2">2</span></a>
                
            </li>
            <li class=" navigation-header"><span>Apps</span>
            </li>
            
            
            <li class=" nav-item"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Ecommerce">المنتجات</span></a>
                <ul class="menu-content">
                    <li><a href="{{route('products')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">عرض المنتجات</span></a>
                    </li>
                    <li><a href="{{route('product.create')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">اضافة منتج</span></a>
                    </li>
                    
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Ecommerce">الاقسام</span></a>
                <ul class="menu-content">
                    <li><a href="{{url('pages.category.showCato')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">عرض الاقسام</span></a>
                    </li>
                    <li><a href="{{url('pages.category.newcato')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">اضافة قسم</span></a>
                    </li>
                   
                </ul>
            </li>
        </ul>
    </div>
</div>