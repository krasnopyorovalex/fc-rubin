<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', '- Компания LLC CERNEL INDASTRIS GROUP')</title>
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
                                <li class="fa">
                                    <a href="tel:+359876092441">+35 987 609 24 41</a>
                                    <img src="{{ asset('images/viber.svg') }}" alt="">
                                </li>
                                <li class="fa">
                                    <a href="tel:+79681934546">+7 968 193 45 46</a>
                                    <img src="{{ asset('images/whatsapp.svg') }}" alt="">
                                </li>
                                <li class="fa"><a href="tel:+74993440580">+7 499 344 05 80</a> <span>Fax</span></li>
                                <li class="fa fa-envelope"><a href="mailto:сernelgroup@te.net.ua">сernelgroup@te.net.ua</a></li>
                                <li class="fa fa-map-marker">
                                    <address>КИПР, г.ЛИМАССОЛ, УЛ.ERESSOU 1 MESA GEITONIA. 4002</address>
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
                            <li class="fa fa-map-marker">КИПР, г.ЛИМАССОЛ, УЛ.ERESSOU 1 MESA GEITONIA. 4002</li>
                            <li class="fa fa-phone"><a href="tel:+380509821879">+38 (050) 982-18-79</a></li>
                            <li class="fa fa-envelope"><a href="mailto:lloydcg.uk@gmail.com">lloydcg.uk@gmail.com</a></li>
                            <li class="fa fa-envelope"><a href="mailto:certiscapgroup@hotmail.com">certiscapgroup@hotmail.com</a></li>
                            <li class="fa fa-envelope"><a href="mailto:сernelgroup@te.net.ua">сernelgroup@te.net.ua</a></li>
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
                        <div class="copyright">© CERTIS CAPITAL GROUP LTD, 2013-{{ date('Y') }}гг. Все права защищены</div>
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
