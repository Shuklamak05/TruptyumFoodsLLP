document.addEventListener('DOMContentLoaded', () => {

    // --- 1. HEADER SCROLL & ACTIVE STATE ---
    const header = document.querySelector('header');
    const navLinks = document.querySelectorAll('.nav-links a');
    const sections = document.querySelectorAll('section');

    const handleScroll = () => {
        // Sticky Header
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        // Active Link Highlight
        let currentSectionId = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 120;
            const sectionHeight = section.offsetHeight;
            if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                currentSectionId = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${currentSectionId}`) {
                link.classList.add('active');
            }
        });
    };

    window.addEventListener('scroll', handleScroll);
    handleScroll();

    // --- 2. MOBILE MENU TOGGLE ---
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navLinksContainers = document.querySelectorAll('.nav-links');

    if (mobileMenuBtn && navLinksContainers.length > 0) {
        mobileMenuBtn.addEventListener('click', () => {
            const isOpened = navLinksContainers[0].classList.contains('active');
            navLinksContainers.forEach(container => container.classList.toggle('active', !isOpened));

            // Animation for Hamburger
            const spans = mobileMenuBtn.querySelectorAll('span');
            spans[0].style.transform = !isOpened
                ? 'rotate(45deg) translate(6px, 6px)' : 'none';
            spans[1].style.opacity = !isOpened ? '0' : '1';
            spans[2].style.transform = !isOpened
                ? 'rotate(-45deg) translate(6px, -6px)' : 'none';
        });

        // Close menu on click link
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                navLinksContainers.forEach(container => container.classList.remove('active'));
                const spans = mobileMenuBtn.querySelectorAll('span');
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            });
        });
    }

    // --- 3. HERO SLIDER ---
    const sliderTrack = document.querySelector('.hero-slider');
    const slides = document.querySelectorAll('.hero-slide');
    const dotsContainer = document.querySelector('.slider-dots');

    let currentSlide = 0;
    const slideCount = slides.length;
    let slideInterval;

    if (sliderTrack && slideCount > 0) {
        // Create dots dynamically
        slides.forEach((_, index) => {
            const dot = document.createElement('div');
            dot.classList.add('slider-dot');
            if (index === 0) dot.classList.add('active');
            dot.addEventListener('click', () => goToSlide(index));
            dotsContainer.appendChild(dot);
        });

        const dots = document.querySelectorAll('.slider-dot');

        const updateSlider = () => {
            sliderTrack.style.transform = `translateX(-${(currentSlide * 100) / slideCount}%)`;

            slides.forEach((slide, idx) => {
                slide.classList.toggle('active', idx === currentSlide);
            });

            dots.forEach((dot, idx) => {
                dot.classList.toggle('active', idx === currentSlide);
            });
        };

        const goToSlide = (index) => {
            currentSlide = index;
            updateSlider();
            resetInterval();
        };

        const nextSlide = () => {
            currentSlide = (currentSlide + 1) % slideCount;
            updateSlider();
        };

        const startInterval = () => {
            slideInterval = setInterval(nextSlide, 5000);
        };

        const resetInterval = () => {
            clearInterval(slideInterval);
            startInterval();
        };

        // Initialize active state on first slide
        slides[0].classList.add('active');
        startInterval();
    }

    // --- 4. PORTFOLIO FILTERING ---
    const filterButtons = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Update active state of button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const filterValue = button.getAttribute('data-filter');

            portfolioItems.forEach(item => {
                const category = item.getAttribute('data-category');

                if (filterValue === 'all' || category === filterValue) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 350);
                }
            });
        });
    });

    // --- 5. TESTIMONIALS SLIDER ---
    const testimonialTrack = document.querySelector('.testimonial-track');
    const testimonialSlides = document.querySelectorAll('.testimonial-slide');
    let currentTestimonial = 0;
    const testimonialCount = testimonialSlides.length;

    if (testimonialTrack && testimonialCount > 0) {
        // Auto play testimonials
        setInterval(() => {
            currentTestimonial = (currentTestimonial + 1) % testimonialCount;
            testimonialTrack.style.transform = `translateX(-${currentTestimonial * 100}%)`;
        }, 6000);
    }

    // --- 6. CONTACT FORM SUBMISSION ---
    const contactForm = document.getElementById('cf7-contact-form');
    const formStatus = document.getElementById('form-status');

    if (contactForm && formStatus) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Simple validation
            const name = document.getElementById('user-name').value.trim();
            const email = document.getElementById('user-email').value.trim();
            const phone = document.getElementById('user-phone').value.trim();
            const service = document.getElementById('user-service').value;
            const message = document.getElementById('user-message').value.trim();

            if (!name || !email || !message) {
                formStatus.className = 'form-status error';
                formStatus.style.color = '#d32f2f';
                formStatus.style.backgroundColor = '#ffebee';
                formStatus.style.border = '1px solid #ffcdd2';
                formStatus.style.display = 'block';
                formStatus.textContent = 'Please fill out all required fields.';
                return;
            }

            // Send real message via PHP Mailer
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.textContent;
            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending Message...';

            const payload = JSON.stringify({
                name: name,
                email: email,
                phone: phone,
                service: service,
                message: message
            });

            const handleResponse = (res) => {
                submitBtn.disabled = false;
                submitBtn.textContent = originalBtnText;

                if (res.status === 'success') {
                    contactForm.reset();
                    formStatus.className = 'form-status success';
                    formStatus.style.color = 'var(--primary-hover)';
                    formStatus.style.backgroundColor = 'rgba(11, 164, 60, 0.1)';
                    formStatus.style.border = '1px solid rgba(11, 164, 60, 0.2)';
                    formStatus.style.display = 'block';
                    formStatus.textContent = res.message || 'Thank you! Your inquiry has been sent successfully. We will get back to you shortly.';
                } else {
                    formStatus.className = 'form-status error';
                    formStatus.style.color = '#d32f2f';
                    formStatus.style.backgroundColor = '#ffebee';
                    formStatus.style.border = '1px solid #ffcdd2';
                    formStatus.style.display = 'block';
                    formStatus.textContent = res.message || 'An error occurred. Please try again.';
                }

                setTimeout(() => {
                    formStatus.style.display = 'none';
                }, 6000);
            };

            fetch('/api/contact', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: payload
            })
            .then(res => {
                if (!res.ok) throw new Error('Fallback to mail.php');
                return res.json();
            })
            .then(handleResponse)
            .catch(() => {
                // Fallback to mail.php if running on classic PHP host
                fetch('mail.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: payload
                })
                .then(res => res.json())
                .then(handleResponse)
                .catch(() => {
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalBtnText;

                    formStatus.className = 'form-status error';
                    formStatus.style.color = '#d32f2f';
                    formStatus.style.backgroundColor = '#ffebee';
                    formStatus.style.border = '1px solid #ffcdd2';
                    formStatus.style.display = 'block';
                    formStatus.textContent = 'Network error. Please check your internet connection and try again.';
                });
            });
                
                setTimeout(() => {
                    formStatus.style.display = 'none';
                }, 6000);
            });
        });
    }
});

// --- 7. PRODUCT CATALOG TAB SWITCHER ---
window.switchProductTab = (tabId) => {
    // Hide all grids
    const grids = document.querySelectorAll('.product-grid');
    grids.forEach(grid => grid.classList.add('hidden'));

    // Show active grid
    const activeGrid = document.getElementById(tabId);
    if (activeGrid) {
        activeGrid.classList.remove('hidden');
    }

    // Update active tab buttons
    const buttons = document.querySelectorAll('.product-tab-btn');
    buttons.forEach(button => {
        button.classList.remove('active');
        if (button.getAttribute('onclick') && button.getAttribute('onclick').includes(tabId)) {
            button.classList.add('active');
        }
    });
};

// --- 8. SCROLL ANIMATION FOR STEPS ---
document.addEventListener('DOMContentLoaded', () => {
    const observerOptions = {
        root: null,
        threshold: 0.1,
        rootMargin: "0px 0px -30px 0px"
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const steps = document.querySelectorAll('.animate-step');
    steps.forEach(step => {
        observer.observe(step);
    });
});

// --- 9. FACTS & FIGURES NUMBER COUNTER ON SCROLL ---
document.addEventListener('DOMContentLoaded', () => {
    const counterObserverOptions = {
        root: null,
        threshold: 0.1
    };

    const countUp = (element) => {
        const target = parseInt(element.getAttribute('data-target'), 10);
        const suffix = element.getAttribute('data-suffix') || '';
        const prefix = element.getAttribute('data-prefix') || '';
        const duration = 2000; // 2 seconds
        const startTime = performance.now();

        const updateCount = (currentTime) => {
            const elapsedTime = currentTime - startTime;
            if (elapsedTime < duration) {
                const progress = elapsedTime / duration;
                const easeOutProgress = 1 - Math.pow(1 - progress, 3);
                const currentCount = Math.floor(easeOutProgress * target);
                element.textContent = prefix + currentCount + suffix;
                requestAnimationFrame(updateCount);
            } else {
                element.textContent = prefix + target + suffix;
            }
        };

        requestAnimationFrame(updateCount);
    };

    const counterObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                countUp(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, counterObserverOptions);

    const counters = document.querySelectorAll('.count-number');
    counters.forEach(counter => {
        counterObserver.observe(counter);
    });
});

// --- 10. FAQ ACCORDION TOGGLE ---
document.addEventListener('DOMContentLoaded', () => {
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const questionBtn = item.querySelector('.faq-question');
        if (questionBtn) {
            questionBtn.addEventListener('click', () => {
                const isActive = item.classList.contains('active');
                
                // Close all other items
                faqItems.forEach(otherItem => {
                    otherItem.classList.remove('active');
                });

                // Toggle current item
                if (!isActive) {
                    item.classList.add('active');
                }
            });
        }
    });

    // Show More/Less toggle logic
    const faqToggleBtn = document.getElementById('faq-toggle-btn');
    if (faqToggleBtn) {
        faqToggleBtn.addEventListener('click', () => {
            const hiddenItems = document.querySelectorAll('.faq-item.faq-hidden');
            const isShowingMore = faqToggleBtn.textContent === 'Show Less';

            hiddenItems.forEach(item => {
                if (isShowingMore) {
                    item.classList.remove('show');
                    item.classList.remove('active'); // Close if open
                } else {
                    item.classList.add('show');
                }
            });

            faqToggleBtn.textContent = isShowingMore ? 'Show More' : 'Show Less';
        });
    }
});

// --- 11. SECTORS INTERACTIVE SHOWCASE ---
const sectorDetailsData = {
    fruits: {
        category: "Fruit Processing & Powders",
        title: "Freeze-Dried Organic Fruits",
        desc: "Locking peak flavor, natural moisture, color, and sweetness in organic fruits without any added sugar, oils, or chemical preservatives.",
        image: "images/fruits.png",
        badge: "🍓 100% Natural Lock",
        apps: ["Smoothie Blends", "Breakfast Cereals", "Confectionery", "Infant Nutrition", "Healthy Snack Packs"],
        metric1: "98%+",
        label1: "Nutrient Retention",
        metric2: "0%",
        label2: "Added Sugar / Additives",
        metric3: "24 Mo",
        label3: "Ambient Shelf-Life",
        serviceVal: "fruits",
        btnText: "Inquire for Fruits Solutions"
    },
    vegetables: {
        category: "Vegetable Dehydration & Dices",
        title: "Freeze-Dried Whole Vegetables & Dices",
        desc: "Preserving natural cellular structure, vivid organic pigments, dietary fiber, and lightning-fast rehydration capabilities upon hot or cold liquid exposure.",
        image: "images/vegetables.png",
        badge: "🥦 Instant Rehydration",
        apps: ["Instant Soups & Broths", "Ready-to-Cook Meal Kits", "Seasoning Blends", "Outdoor Rations", "Industrial Ingredients"],
        metric1: "100%",
        label1: "Fiber & Color Preservation",
        metric2: "<3 Min",
        label2: "Full Rehydration Time",
        metric3: "2 Years",
        label3: "Storage Stability",
        serviceVal: "vegetables",
        btnText: "Inquire for Vegetables Solutions"
    },
    herbs: {
        category: "Botanical & Herb Sublimation",
        title: "Aromatic Botanical & Herb Extracts",
        desc: "Retaining delicate essential oils, volatile aroma compounds, active bio-nutrients, and deep medicinal potency through low-temperature vacuum sublimations.",
        image: "images/herbs.png",
        badge: "🌿 Essential Oils Saved",
        apps: ["Culinary Herb Blends", "Botanical Teas & Infusions", "Wellness Formulations", "Cosmetic Extracts", "Ayurvedic Potency"],
        metric1: "95%+",
        label1: "Essential Oils Saved",
        metric2: "High",
        label2: "Aroma & Flavor Intensity",
        metric3: "100%",
        label3: "Pure Botanical Integrity",
        serviceVal: "herbs",
        btnText: "Inquire for Herbs Solutions"
    },
    'readyto-eat': {
        category: "Prepared Meal Sublimation",
        title: "Instant Gourmet Ready-To-Eat Meals",
        desc: "Ultra-convenient instant gourmet culinary solutions engineered for rapid preparation, zero chemical preservatives, and long-term expedition or office storage.",
        image: "images/readyto-eat.png",
        badge: "🍛 Zero Preservatives",
        apps: ["Gourmet Rice & Curry Kits", "Defense & Field Rations", "Outdoor Expeditions", "Desk Lunch Solutions", "Travel & Trek Packs"],
        metric1: "Light",
        label1: "80% Weight Reduction",
        metric2: "Instant",
        label2: "Just Add Water",
        metric3: "25+ Mo",
        label3: "No Refrigeration Required",
        serviceVal: "ready-to-eat",
        btnText: "Inquire for Ready-to-Eat Solutions"
    },
    pharmaceuticals: {
        category: "Clinical & Biopharma Processing",
        title: "Biopharma & Clinical Raw Material Sublimation",
        desc: "Strictly controlled low-temperature lyophilization designed for heat-sensitive active pharmaceutical ingredients, bio-extracts, and clinical raw materials.",
        image: "images/pharmaceuticals.png",
        badge: "💊 Ultra-Sterile Standard",
        apps: ["Nutraceutical Powders", "Biopharma Active Ingredients", "Enzyme & Probiotic Stocks", "Clinical Dietary Supplements", "Controlled Bio-Extracts"],
        metric1: "CGMP",
        label1: "Compliant Facility",
        metric2: "-40°C",
        label2: "Blast Freeze Precision",
        metric3: "Sterile",
        label3: "Strict Quality Control",
        serviceVal: "pharmaceuticals",
        btnText: "Inquire for Pharma Solutions"
    }
};

window.switchSector = function(sectorKey) {
    const data = sectorDetailsData[sectorKey];
    if (!data) return;

    // 1. Synchronously update active state on tab buttons
    const tabBtns = document.querySelectorAll('.sector-tab-btn');
    tabBtns.forEach(btn => {
        const key = btn.getAttribute('data-sector');
        if (key === sectorKey) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    });

    // 2. Animate and update spotlight content
    const spotlightCard = document.getElementById('sector-spotlight');
    if (spotlightCard) {
        spotlightCard.style.opacity = '0.3';
        spotlightCard.style.transform = 'translateY(6px)';
    }

    setTimeout(() => {
        const spotlightImg = document.getElementById('spotlight-img');
        const spotlightBadge = document.getElementById('spotlight-badge');
        const spotlightCat = document.getElementById('spotlight-category');
        const spotlightTitle = document.getElementById('spotlight-title');
        const spotlightDesc = document.getElementById('spotlight-desc');
        const spotlightApps = document.getElementById('spotlight-apps');
        const metric1 = document.getElementById('spotlight-metric-1');
        const label1 = document.getElementById('spotlight-label-1');
        const metric2 = document.getElementById('spotlight-metric-2');
        const label2 = document.getElementById('spotlight-label-2');
        const metric3 = document.getElementById('spotlight-metric-3');
        const label3 = document.getElementById('spotlight-label-3');
        const ctaBtn = document.getElementById('spotlight-cta-btn');

        if (spotlightImg) { spotlightImg.src = data.image; spotlightImg.alt = data.title; }
        if (spotlightBadge) spotlightBadge.textContent = data.badge;
        if (spotlightCat) spotlightCat.textContent = data.category;
        if (spotlightTitle) spotlightTitle.textContent = data.title;
        if (spotlightDesc) spotlightDesc.textContent = data.desc;
        if (spotlightApps) {
            spotlightApps.innerHTML = data.apps.map(app => `<span class="chip">${app}</span>`).join('');
        }

        if (metric1) metric1.textContent = data.metric1;
        if (label1) label1.textContent = data.label1;
        if (metric2) metric2.textContent = data.metric2;
        if (label2) label2.textContent = data.label2;
        if (metric3) metric3.textContent = data.metric3;
        if (label3) label3.textContent = data.label3;

        if (ctaBtn) {
            ctaBtn.setAttribute('data-service', data.serviceVal);
            const spanText = ctaBtn.querySelector('span');
            if (spanText) spanText.textContent = data.btnText;
        }

        if (spotlightCard) {
            spotlightCard.style.opacity = '1';
            spotlightCard.style.transform = 'translateY(0)';
        }
    }, 120);
};

function initSectorsShowcase() {
    const tabBtns = document.querySelectorAll('.sector-tab-btn');
    if (tabBtns.length === 0) return;

    tabBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const sectorKey = this.getAttribute('data-sector');
            if (sectorKey && window.switchSector) {
                window.switchSector(sectorKey);
            }
        });
    });

    const ctaBtn = document.getElementById('spotlight-cta-btn');
    if (ctaBtn) {
        ctaBtn.addEventListener('click', () => {
            const serviceVal = ctaBtn.getAttribute('data-service');
            const userServiceSelect = document.getElementById('user-service');
            if (userServiceSelect && serviceVal) {
                userServiceSelect.value = serviceVal;
            }
        });
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSectorsShowcase);
} else {
    initSectorsShowcase();
}
