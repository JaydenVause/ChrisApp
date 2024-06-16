<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coffs Lawns And Property Maintenance</title>

    <!-- Corrected stylesheet link -->
    <link rel="stylesheet" href="<?php echo asset("css/styles.css"); ?>">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header__logo-box">
            <h1 class="logo">Coffs Lawns And Property Maintenance</h1>
            <a href="tel:+61412779731"><img class="icon icon--nofocus" src="<?php echo asset("imgs/phone.svg"); ?>" alt="Contact Us"></a>
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
                    <a href="<?php echo route('invoices.index'); ?>" class="li__a li__a--animated">Invoicing</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Mobile menu and main content sections -->
    <!-- Ensure to add appropriate headings to sections -->
    <div class="fade_screen fade_screen--hidden" id="fade_screen"></div>
    <div class="mobile_menu mobile_menu--hidden" id="mobile_menu"></div>

    <!-- Main content -->
    <div class="main" id="main">

