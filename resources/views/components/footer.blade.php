        

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
        <script src="https://kit.fontawesome.com/8b0d68faf4.js" crossorigin="anonymous"></script>
        <!-- Script to toggle mobile menu -->
        <script>
            function toggleMobileMenu() {
                var menu = document.getElementById("mobileMenu");
                menu.classList.toggle("expanded");
                menu.classList.toggle("collapsed");
            }

            
        </script>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Add click event listener to desktop navigation links
            var desktopLinks = document.querySelectorAll(".desktop-navigation .li__a");
            desktopLinks.forEach(function(link) {
                link.addEventListener("click", handleNavigation);
            });

            // Add click event listener to mobile navigation links
            var mobileLinks = document.querySelectorAll(".mobile_menu__nav .li__a");
            mobileLinks.forEach(function(link) {
                link.addEventListener("click", handleNavigation);
            });

            function handleNavigation(event) {
                // Prevent default link behavior
                event.preventDefault();

                // Get the target section from the href attribute
                var targetSection = this.getAttribute("href");

                // Construct the URL for the home page
                var homeUrl = "<?php echo route('home'); ?>";

                // If the target starts with '#', it's a section within the same page
                if (targetSection.startsWith("#")) {
                    // Navigate to the home page and append the section's ID as a hash
                    window.location.href = homeUrl + targetSection;

                    // Smooth scroll to the target section after a short delay
                    setTimeout(function() {
                        var sectionElement = document.querySelector(targetSection);
                        if (sectionElement) {
                            sectionElement.scrollIntoView({
                                behavior: "smooth"
                            });
                        }
                    }, 100); // Adjust delay time as needed
                } else {
                    // Navigate to the target page
                    window.location.href = targetSection;
                }
            }
        });






        </script>
        <script src="<?php echo asset("js/mobile_menu.js"); ?>"></script>
    </body>
</html>