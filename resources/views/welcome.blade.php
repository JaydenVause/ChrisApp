        <x-layout>
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
            
            <form action="{{ route('contact.submit') }}" method="post" class="contact__form">
                @csrf
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
    </x-layout>
   
