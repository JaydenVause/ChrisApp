<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Coffs Lawns And Property Maintenance | Home</title>

        <link rel="stylesheet" href="<?php echo asset("css\styles.css"); ?>">
    </head>
    <body>
        <!-- Header -->
        <header class="header">
            <div class="header__logo-box">
                <h1 class="logo">Coffs Lawns And Property Maintenance</h1>
                <a href="tel:+61412779731"><img class="icon icon--nofocus"  fill="currentColor" src="<?php echo asset("imgs/phone.svg"); ?>" alt="Contact Us"></a>
            </div>
            <div class="hamburger icon" id="hamburger_button">
                <div class="hamburger__bar"></div>
                <div class="hamburger__bar"></div>
                <div class="hamburger__bar"></div>
            </div>
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
                    <ul class="nav__ul nav__ul--mobile">
                        <li class="ul__li ul__li--mobile">
                            <a href="#main" class="li__a li__a--mobile">Home</a>
                        </li>
                        <li class="ul__li ul__li--mobile">
                            <a href="#services" class="li__a li__a--mobile">What We Do</a>
                        </li>
                        
                        <li class="ul__li ul__li--mobile">
                            <a href="#testimonials" class="li__a li__a--mobile">Testimonials</a>
                        </li>
                        
                        <li class="ul__li ul__li--mobile">
                            <a href="#contact" class="li__a li__a--mobile">Contact Us</a>
                        </li>
                    </ul>
                </nav>
                
            </div>
        </div>
        <!-- main content -->
        <div class="main" id="main">
            <div class="hero-section">
                <video autoplay muted loop class="hero-video" >
                    <source src="<?php echo asset("videos/lawn01.mp4"); ?>" type="video/mp4">
                </video>
                <!-- <img class="hero-section__image" src="https://th.bing.com/th/id/R.c002f934e1f040498f198a632e6adccc?rik=%2b5GS9jcFjD4KXg&riu=http%3a%2f%2fwww.cameraegg.org%2fwp-content%2fuploads%2f2012%2f09%2fnikon-d600-sample-images.jpg&ehk=711QrJdIO8zFSeTR4V7jZeJVcOjX7jTba0oQ93rP0Mo%3d&risl=&pid=ImgRaw&r=0" alt="Hero Image"> -->
                <div class="hero-section__content">
                    <h1 class="hero__title">The Best Commercial and Domestic Lawn and Maintenance in Coffs Harbour</h1>
                    <p class="hero__subtitle">Providing top-notch lawn care services to keep your property looking its best.</p>
                    <a href="tel:+61412779731" class="hero__button">Get A Quote</a>
                </div>
            </div>
        </div>
        <section id="services" class="services">
            <h2 class="services__title">Our Services</h2>
            <ul class="services__list">
                <li class="services__item">
                    <h3 class="services__item-title">Lawn Mowing</h3>
                    <div class="services__image">
                        <div class="image__circle image__circle--01"></div>
                    </div>
                    <p class="services__item-description">We provide regular lawn mowing services tailored to your schedule and lawn type.</p>
                </li>
                <li class="services__item">
                    <h3 class="services__item-title">Hedge Trimming</h3>
                    <div class="services__image">
                        <div class="image__circle image__circle--02"></div>
                    </div>
                    
                    <p class="services__item-description">Keep your hedges neat and tidy with our professional trimming services.</p>
                </li>
                <li class="services__item">
                    <h3 class="services__item-title">Garden Maintenance</h3>
                    <div class="services__image">
                        <div class="image__circle image__circle--03"></div>
                    </div>
                    <p class="services__item-description">Let us take care of your garden beds, including weeding, pruning, and mulching.</p>
                </li>
                <li class="services__item">
                    <h3 class="services__item-title">Property Clean-Up</h3>
                    <div class="services__image">
                        <div class="image__circle image__circle--04"></div>
                    </div>
                    <p class="services__item-description">We offer property clean-up services to remove debris and maintain a clean outdoor space.</p>
                </li>
            </ul>
        </section>

        

        <!-- About Us Section -->
        <section id="about" class="about">
            <h2 class="about__title">About Us</h2>
            <p class="about__content">Coffs Lawns And Property Maintenance is a locally-owned and operated business dedicated to providing high-quality lawn care services to our community. With years of experience and a passion for outdoor maintenance, we take pride in delivering exceptional results for every client.</p>
        </section>

        <section id="testimonials" class="testimonials">
            <div class='sk-ww-google-reviews' data-embed-id='25420241'></div><script src='https://widgets.sociablekit.com/google-reviews/widget.js' async defer></script>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact">
            <div class="contact__flex-div">
                <h2 class="contact__title">Contact Us</h2>
                <p class="contact__content">Ready to transform your outdoor space? Contact us today for a free quote!</p>
            </div>
            
            <form action="#" method="post" class="contact__form">
                <label for="name" class="contact__label">Name:</label>
                <input type="text" id="name" name="name" class="contact__input" placeholder="Please enter your name" required>
                <label for="phone" class="contact__label">Phone Number:</label>
                <input type="tel" id="phone" name="phone" class="contact__input" placeholder="e.g. 04xxxxxxxx" required pattern="(\+61\d{1} \d{4} \d{4}|\+61\d{1}\d{4}\d{4}|04\d{2} \d{3} \d{3}|04\d{2}\d{3}\d{3})">
                <label for="email" class="contact__label">Email:</label>
                <input type="email" id="email" name="email" class="contact__input" placeholder="Sample@gmail.com" required>
                <label for="message" class="contact__label">Message:</label>
                <textarea id="message" name="message" class="contact__textarea" placeholder="Leave us a message" required></textarea>
                <button type="submit" class="contact__button">Submit</button>
            </form>
        </section>
        
        

        <!-- Footer Section -->
        <footer class="footer">
            <p class="footer__text">&copy; 2024 Coffs Lawns And Property Maintenance. All rights reserved.</p>
            <nav class="footer__navigation">
                <ul>
                    <li class="footer__navigation-item"><a href="#services" class="footer__navigation-link">Services</a></li>
                    <li class="footer__navigation-item"><a href="#about" class="footer__navigation-link">About Us</a></li>
                    <li class="footer__navigation-item"><a href="#contact" class="footer__navigation-link">Contact</a></li>
                </ul>
            </nav>
        </footer>

        <!-- Script to toggle mobile menu -->
        <script>
            function toggleMobileMenu() {
                var menu = document.getElementById("mobileMenu");
                menu.classList.toggle("expanded");
                menu.classList.toggle("collapsed");
            }
        </script>
        <script src="<?php echo asset("js/mobile_menu.js"); ?>"></script>
    </body>
</html>
