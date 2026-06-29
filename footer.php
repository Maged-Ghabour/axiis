<?php 
$site_logo = function_exists('get_field') && get_field('site_logo', get_option('page_on_front')) ? get_field('site_logo', get_option('page_on_front')) : get_template_directory_uri() . '/assets/logo.png';
$whatsapp = function_exists('get_field') && get_field('whatsapp_number', get_option('page_on_front')) ? get_field('whatsapp_number', get_option('page_on_front')) : '+095 123 4567';
$phone = function_exists('get_field') && get_field('phone_number', get_option('page_on_front')) ? get_field('phone_number', get_option('page_on_front')) : '+095 123 4567';
$email = function_exists('get_field') && get_field('email_address', get_option('page_on_front')) ? get_field('email_address', get_option('page_on_front')) : 'example@hotmail.com';

$facebook = function_exists('get_field') && get_field('facebook_url', get_option('page_on_front')) ? get_field('facebook_url', get_option('page_on_front')) : '#';
$twitter = function_exists('get_field') && get_field('twitter_url', get_option('page_on_front')) ? get_field('twitter_url', get_option('page_on_front')) : '#';
$instagram = function_exists('get_field') && get_field('instagram_url', get_option('page_on_front')) ? get_field('instagram_url', get_option('page_on_front')) : '#';
$linkedin = function_exists('get_field') && get_field('linkedin_url', get_option('page_on_front')) ? get_field('linkedin_url', get_option('page_on_front')) : '#';
?>
    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <!-- Column 1 (Logo & Desc) -->
                <div class="footer-col">
                    <img loading="lazy" src="<?php echo esc_url($site_logo); ?>" alt="<?php bloginfo('name'); ?>" class="footer-logo">
                    <p class="footer-desc">
                        <?php 
                        if( function_exists('get_field') && get_field('footer_description', get_option('page_on_front')) ) {
                            echo nl2br( esc_html( get_field('footer_description', get_option('page_on_front')) ) );
                        } else {
                            echo 'هذا وصف تجريبي';
                        }
                        ?>
                    </p>
                </div>
                
                <!-- Column 2 (Quick Links / Footer Menu) -->
                <div class="footer-col">
                    <h3>روابط هامة</h3>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'footer-links',
                        'fallback_cb'    => function() {
                            echo '<ul class="footer-links">';
                            echo '<li><a href="'.home_url('/').'">الرئيسية</a></li>';
                            echo '<li><a href="#">من نحن</a></li>';
                            echo '<li><a href="#">الخدمات</a></li>';
                            echo '<li><a href="#">اتصل بنا</a></li>';
                            echo '</ul>';
                        }
                    ) );
                    ?>
                </div>

                <!-- Column 3 (Contact Info) -->
                <div class="footer-col">
                    <h3>تواصل معنا</h3>
                    <ul class="contact-info">
                        <li>
                            <i class="fa-brands fa-whatsapp"></i>
                            <span dir="ltr"><?php echo esc_html($whatsapp); ?></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <span dir="ltr"><?php echo esc_html($phone); ?></span>
                        </li>
                        <li>
                            <i class="fa-regular fa-envelope"></i>
                            <span dir="ltr"><?php echo esc_html($email); ?></span>
                        </li>
                    </ul>
                </div>
                
                <!-- Column 4 (Social Media) -->
                <?php
                $enable_social_media = function_exists('get_field') ? get_field('enable_social_media', get_option('page_on_front')) : true;
                if ($enable_social_media === null) $enable_social_media = true;
                if ($enable_social_media) : 
                ?>
                <div class="footer-col">
                    <h3>تابعنا على وسائل التواصل</h3>
                    <div class="social-icons">
                        <?php if(!empty($facebook) && $facebook != '#'): ?><a href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="fa-brands fa-facebook"></i></a><?php endif; ?>
                        <?php if(!empty($twitter) && $twitter != '#'): ?><a href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a><?php endif; ?>
                        <?php if(!empty($instagram) && $instagram != '#'): ?><a href="<?php echo esc_url($instagram); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a><?php endif; ?>
                        <?php if(!empty($linkedin) && $linkedin != '#'): ?><a href="<?php echo esc_url($linkedin); ?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a><?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; جميع الحقوق محفوظة <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.works-swiper', {
                slidesPerView: 1.2,
                spaceBetween: 20,
                centeredSlides: true,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3.5,
                        spaceBetween: 30,
                    },
                }
            });
            var testimonialsSwiper = new Swiper('.testimonials-swiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                speed: 800, /* Smooth transition */
                grabCursor: true, /* Hand cursor to encourage swiping */
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 25,
                    },
                }
            });
        });
    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Menu Toggle with GSAP Animation
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const navMenu = document.getElementById('nav-menu');
            
            if (mobileMenuBtn && navMenu) {
                const menuItems = navMenu.querySelectorAll('.nav-links li, .nav-actions button');
                
                // Use GSAP matchMedia to only apply animations on mobile
                let mm = gsap.matchMedia();
                
                mm.add("(max-width: 768px)", () => {
                    // Create GSAP Timeline for Menu
                    const menuTl = gsap.timeline({ paused: true, reversed: true });
                    
                    // Animate the menu container down
                    menuTl.to(navMenu, {
                        top: 0,
                        duration: 0.6,
                        ease: "power4.inOut"
                    })
                    // Animate links and buttons staggering in
                    .from(menuItems, {
                        y: 30,
                        opacity: 0,
                        duration: 0.4,
                        stagger: 0.05,
                        ease: "back.out(1.5)"
                    }, "-=0.3");

                    // Click handler
                    const clickHandler = () => {
                        const icon = mobileMenuBtn.querySelector('i');
                        
                        if (menuTl.reversed()) {
                            menuTl.play();
                            icon.classList.remove('fa-bars');
                            icon.classList.add('fa-xmark');
                        } else {
                            menuTl.reverse();
                            icon.classList.remove('fa-xmark');
                            icon.classList.add('fa-bars');
                        }
                    };

                    mobileMenuBtn.addEventListener('click', clickHandler);

                    // Cleanup function when window is resized above 768px
                    return () => {
                        mobileMenuBtn.removeEventListener('click', clickHandler);
                        // Reset icon to bars
                        const icon = mobileMenuBtn.querySelector('i');
                        if(icon) {
                            icon.classList.remove('fa-xmark');
                            icon.classList.add('fa-bars');
                        }
                    };
                });
            }

            // Register ScrollTrigger
            if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
                gsap.registerPlugin(ScrollTrigger);

                // 1. Hero Section Animations (Text Reveal)
                const heroH1 = document.querySelector(".hero-content h1");
                if (heroH1) {
                    const htmlContent = heroH1.innerHTML;
                    const parts = htmlContent.split(/<br\s*\/?>/i);
                    heroH1.innerHTML = "";
                    
                    parts.forEach((part, index) => {
                        const words = part.trim().split(/\s+/);
                        words.forEach(word => {
                            if (!word) return;
                            const wrap = document.createElement("span");
                            wrap.className = "word-reveal-wrap";
                            const inner = document.createElement("span");
                            inner.className = "word-reveal-inner";
                            inner.innerText = word;
                            wrap.appendChild(inner);
                            heroH1.appendChild(wrap);
                            heroH1.appendChild(document.createTextNode(" "));
                        });
                        
                        if (index < parts.length - 1) {
                            heroH1.appendChild(document.createElement("br"));
                        }
                    });
                }

                const heroTimeline = gsap.timeline();
                heroTimeline.from(".word-reveal-inner", {
                    y: "100%",
                    duration: 0.8,
                    stagger: 0.1,
                    ease: "power3.out"
                })
                .from(".hero-content p", {
                    y: 30,
                    opacity: 0,
                    duration: 0.8,
                    ease: "power3.out"
                }, "-=0.6")
                .from(".hero-content .cta-group", {
                    y: 20,
                    opacity: 0,
                    duration: 0.8,
                    ease: "power3.out"
                }, "-=0.4");

                // 2. Section Headers Animation (Re-usable)
                gsap.utils.toArray('.section-header').forEach(header => {
                    gsap.from(header, {
                        scrollTrigger: {
                            trigger: header,
                            start: "top 85%", 
                            toggleActions: "play none none none"
                        },
                        y: 40,
                        opacity: 0,
                        duration: 0.8,
                        ease: "power2.out"
                    });
                });

                // 3. Services Grid Stagger
                gsap.from(".service-card", {
                    scrollTrigger: {
                        trigger: ".services-grid",
                        start: "top 80%",
                    },
                    y: 50,
                    opacity: 0,
                    duration: 0.6,
                    stagger: 0.15,
                    ease: "power2.out",
                    clearProps: "all"
                });

                // 4. Features Grid Stagger
                gsap.from(".feature-card", {
                    scrollTrigger: {
                        trigger: ".features-grid",
                        start: "top 80%",
                    },
                    y: 50,
                    opacity: 0,
                    duration: 0.6,
                    stagger: 0.15,
                    ease: "power2.out",
                    clearProps: "all"
                });

                // 5. Timeline / Process Section
                const timelineContainer = document.querySelector(".timeline-container");
                if (timelineContainer) {
                    const processTimeline = gsap.timeline({
                        scrollTrigger: {
                            trigger: ".timeline-container",
                            start: "top 75%",
                        }
                    });
                    
                    // Adjust transform origin based on window width
                    let origin = window.innerWidth <= 768 ? "center top" : "right center";
                    let scaleProp = window.innerWidth <= 768 ? "scaleY" : "scaleX";

                    // Animate line
                    processTimeline.from(".timeline-line", {
                        [scaleProp]: 0,
                        transformOrigin: origin,
                        duration: 1.5,
                        ease: "power2.inOut"
                    })
                    .from(".timeline-step", {
                        y: window.innerWidth <= 768 ? 0 : -30,
                        x: window.innerWidth <= 768 ? -30 : 0,
                        opacity: 0,
                        duration: 0.5,
                        stagger: 0.3,
                        ease: "back.out(1.7)"
                    }, "-=1.5");
                }

                // 6. Testimonials Swiper
                gsap.from(".testimonials-swiper", {
                    scrollTrigger: {
                        trigger: ".testimonials-section",
                        start: "top 75%",
                    },
                    y: 40,
                    opacity: 0,
                    duration: 0.8,
                    ease: "power2.out"
                });

                // 7. CTA Banner
                gsap.from(".cta-banner-container", {
                    scrollTrigger: {
                        trigger: ".cta-banner-section",
                        start: "top 80%",
                    },
                    y: 50,
                    opacity: 0,
                    duration: 0.8,
                    ease: "power3.out"
                });

                // 8. Footer Columns
                gsap.from(".footer-col", {
                    scrollTrigger: {
                        trigger: ".main-footer",
                        start: "top 90%",
                    },
                    y: 30,
                    opacity: 0,
                    duration: 0.6,
                    stagger: 0.2,
                    ease: "power2.out"
                });
            }

            /* ========================================= */
            /*       PREMIUM FEATURES START (JS)         */
            /* ========================================= */

            // 1. Preloader Fade Out
            const preloader = document.getElementById("preloader");
            if(preloader && typeof gsap !== 'undefined') {
                window.addEventListener('load', () => {
                    gsap.to("#preloader", {
                        yPercent: -100, // Slide up
                        opacity: 0,
                        duration: 0.8,
                        ease: "power3.inOut",
                        onComplete: () => {
                            preloader.style.display = "none";
                        }
                    });
                });
            }

            // 2. Scroll Progress Bar
            if(document.getElementById("progress-bar") && typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
                gsap.to("#progress-bar", {
                    width: "100%",
                    ease: "none",
                    scrollTrigger: {
                        trigger: document.body,
                        start: "top top",
                        end: "bottom bottom",
                        scrub: 0.3
                    }
                });
            }

            // 3. Custom GSAP Cursor
            if (window.matchMedia("(pointer: fine)").matches && typeof gsap !== 'undefined') {
                const cursorDot = document.getElementById("cursor-dot");
                const cursorOutline = document.getElementById("cursor-outline");
                
                if (cursorDot && cursorOutline) {
                    document.body.classList.add("custom-cursor-active");
                    window.addEventListener("mousemove", (e) => {
                        gsap.set(cursorDot, { x: e.clientX, y: e.clientY });
                        gsap.to(cursorOutline, { x: e.clientX, y: e.clientY, duration: 0.15, ease: "power2.out" });
                    });

                    const interactiveElements = document.querySelectorAll("a, button");
                    interactiveElements.forEach(el => {
                        el.addEventListener("mouseenter", () => cursorOutline.classList.add("hover-state"));
                        el.addEventListener("mouseleave", () => cursorOutline.classList.remove("hover-state"));
                    });
                }
            }

            // 4. Parallax Scrolling Effects
            if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
                gsap.to(".hero-section", {
                    backgroundPosition: "50% 100px",
                    ease: "none",
                    scrollTrigger: {
                        trigger: ".hero-section",
                        start: "top top",
                        end: "bottom top",
                        scrub: true
                    }
                });
            }

            // 5. Magnetic Buttons
            if (typeof gsap !== 'undefined') {
                const magneticBtns = document.querySelectorAll('.gold-btn, .floating-whatsapp');
                magneticBtns.forEach(btn => {
                    btn.addEventListener('mousemove', (e) => {
                        const rect = btn.getBoundingClientRect();
                        const x = e.clientX - rect.left - rect.width / 2;
                        const y = e.clientY - rect.top - rect.height / 2;
                        gsap.to(btn, { x: x * 0.4, y: y * 0.4, duration: 0.3, ease: "power2.out" });
                    });
                    btn.addEventListener('mouseleave', () => {
                        gsap.to(btn, { x: 0, y: 0, duration: 0.5, ease: "elastic.out(1, 0.3)" });
                    });
                });
            }

            // 6. 3D Tilt Effect on Cards
            if (typeof gsap !== 'undefined') {
                const tiltCards = document.querySelectorAll('.feature-card, .service-card');
                tiltCards.forEach(card => {
                    card.classList.add('tilt-card');
                    
                    card.addEventListener('mousemove', (e) => {
                        const rect = card.getBoundingClientRect();
                        const x = e.clientX - rect.left;
                        const y = e.clientY - rect.top;
                        const centerX = rect.width / 2;
                        const centerY = rect.height / 2;
                        
                        const rotateX = ((y - centerY) / centerY) * -10; 
                        const rotateY = ((x - centerX) / centerX) * 10;
                        
                        gsap.to(card, {
                            rotateX: rotateX,
                            rotateY: rotateY,
                            duration: 0.4,
                            ease: "power2.out"
                        });
                    });
                    
                    card.addEventListener('mouseleave', () => {
                        gsap.to(card, {
                            rotateX: 0,
                            rotateY: 0,
                            duration: 0.7,
                            ease: "power2.out"
                        });
                    });
                });
            }
        });
    </script>
</body>
</html>
