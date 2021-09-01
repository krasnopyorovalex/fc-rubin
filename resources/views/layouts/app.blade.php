<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', '')</title>
    <meta name="description" content="@yield('description', '')">
    <meta name="google" content="notranslate">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#eee">
    @stack('og')
    <link rel="stylesheet" href="{{ mix('css/all.css') }}"/>
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
    <link rel="canonical" href="@yield('canonical', request()->url())"/>
</head>
<body>
    <div class="page">
        <header>
            <div class="header-wrapper center767">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="info-list">
                                <li class="fa"><a href="tel:+89153292985">+8 (915) 329-29-85</a></li>
                                <li class="fa fa-envelope"><a href="mailto:rubin@cfu2015.com">rubin@cfu2015.com</a></li>
                                <li class="fa fa-map-marker">
                                    <address>
                                        298612, Крым респ, г. Ялта, Садовая ул, дом 5В , корпус Литер А, помещение 2
                                    </address>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="stuck_container" class="stuck_container">
                <div class="container">
                    <div class="row align-items-center header__menu">
                        <div class="col-md-2">
                            <div class="navbar-header">
                                <a href="{{ route('page.show') }}" class="logo-link">
                                    <img class="brand_img" src="{{ asset('images/logo.png') }}" title="" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <nav class="navbar navbar-default navbar-static-top center" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
                                @includeWhen($menu->get('menu_header'), 'layouts.menus.header')
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        @yield('content')
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="contacts">
                            <li class="fa fa-map-marker">298612, Крым респ, г. Ялта, Садовая ул, дом 5В , корпус Литер А, помещение 2</li>
                            <li class="fa fa-envelope"><a href="mailto:rubin@cfu2015.com">rubin@cfu2015.com</a></li>
                            <li><a href="https://vk.com/fcrubinyalta" target="_blank" rel="noopener noreferrer"><i class="fa fa-vk"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 text-right">
                        @includeWhen($menu->get('menu_footer'), 'layouts.menus.footer')
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copyright">© ФК "Рубин" Ялта {{ date('Y') }}г. Все права защищены</div>
                    </div>
                    <div class="col-md-6">
                        <div class="develop">
                            <div class="develop__link">
                                <a href="https://krasber.ru" target="_blank">
                                    Создание, продвижение и <br>техподдержка сайтов
                                </a>
                            </div>
                            <div class="develop__logo">
                                <a href="https://krasber.ru" target="_blank">
                                    <img src="{{ asset('images/krasber.svg') }}" alt="Веб-студия Красбер">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <button class="scroll-top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </button>
    <div class="notify"></div>
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/superfish.js') }}"></script>
    <script src="{{ asset('js/sticky_menu.js') }}"></script>
    <script src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @if(app()->environment('production'))

    @endif
</body>
</html>
