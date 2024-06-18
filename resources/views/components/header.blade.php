<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coffs Lawns And Property Maintenance | @yield('title', 'Default Title')</title>
    
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <!-- Facebook Open Graph -->
    <meta property="og:locale" content="en_US"/>
    <meta property="og:site_name" content="Coffs Lawns and Property Maintenance"/>
    <meta property="og:title" content="Coffs Lawns and Property Maintenance"/>
    <meta property="og:url" content="https://coffslawnsandpropertymaintenance.com/"/>
    <meta property="og:type" content="website"/>
    <meta property="og:description" content="Professional lawn mowing and property maintenance services in Coffs Harbour."/>

    <!-- Google+ / Schema.org -->
    <meta itemprop="name" content="Coffs Lawns and Property Maintenance"/>
    <meta itemprop="headline" content="Coffs Lawns and Property Maintenance"/>
    <meta itemprop="description" content="Professional lawn mowing and property maintenance services in Coffs Harbour."/>
    <meta itemprop="author" content="Coffs Lawns and Property Maintenance"/>

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="Coffs Lawns and Property Maintenance"/>
    <meta name="twitter:url" content="https://coffslawnsandpropertymaintenance.com/"/>
    <meta name="twitter:description" content="Professional lawn mowing and property maintenance services in Coffs Harbour."/>
    <meta name="twitter:card" content="summary_large_image"/>

    <?php $canonical_url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
    <link rel="canonical" href="<?php echo $canonical_url; ?>">
    <?php
        header("Referrer-Policy: strict-origin-when-cross-origin");
        header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
        header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self';");
    ?>



</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header__logo-box">
            <h1 class="logo">Coffs Lawns And Property Maintenance</h1>
            <a href="tel:+61412779731"><img class="icon icon--nofocus" src="{{ asset('imgs/phone.svg') }}" alt="Contact Us"></a>
        </div>
        <div class="hamburger icon" id="hamburger_button">
            <div class="hamburger__bar"></div>
            <div class="hamburger__bar"></div>
            <div class="hamburger__bar"></div>
        </div>
        <nav class="desktop-navigation">
            <ul>
                <li class="ul__li ul__li--animated">
                    <a href="#main" class="li__a li__a--animated">Home</a>
                </li>
                <li class="ul__li ul__li--animated">
                    <a href="#services" class="li__a li__a--animated">What We Do</a>
                </li>
                <li class="ul__li ul__li--animated">
                    <a href="#testimonials" class="li__a li__a--animated">Testimonials</a>
                </li>
                <li class="ul__li ul__li--animated">
                    <a href="#contact" class="li__a li__a--animated">Contact Us</a>
                </li>
                <li class="ul__li ul__li--animated">
                    <a href="{{ route('invoices.index') }}" class="li__a li__a--animated">Invoicing</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="fade_screen fade_screen--hidden" id="fade_screen">
        <!-- mobile menu -->
    </div>
    <div class="mobile_menu mobile_menu--hidden" id="mobile_menu">
        <div class="mobile_menu--wrapper icon--nofocus">
            <div class="wrapper">
                <a href="#" class="close-button" id="close_button">
                    <div class="in">
                        <div class="close-button-block"></div>
                        <div class="close-button-block"></div>
                    </div>
                    <div class="out">
                        <div class="close-button-block"></div>
                        <div class="close-button-block"></div>
                    </div>
                </a>
            </div>
            <nav class="mobile_menu__nav" id="mobileMenu">
                <ul class="nav__ul nav__ul--animated-mobile">
                    <li class="ul__li ul__li--animated-mobile">
                        <a href="#main" class="li__a li__a--animated-mobile li__a--mobile">Home</a>
                    </li>
                    <li class="ul__li ul__li--animated-mobile">
                        <a href="#services" class="li__a li__a--animated-mobile li__a--mobile">What We Do</a>
                    </li>
                    <li class="ul__li ul__li--animated-mobile">
                        <a href="#testimonials" class="li__a li__a--animated-mobile li__a--mobile">Testimonials</a>
                    </li>
                    <li class="ul__li ul__li--animated-mobile">
                        <a href="#contact" class="li__a li__a--animated-mobile li__a--mobile">Contact Us</a>
                    </li>
                    <li class="ul__li ul__li--animated-mobile">
                        <a href="/invoices" class="li__a li__a--animated-mobile li__a--mobile">Invoicing</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- main content -->
    <div class="main" id="main">
    