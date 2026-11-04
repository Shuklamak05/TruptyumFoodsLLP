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
        if (window.scrollY < 120) {
            currentSectionId = 'home';
        } else if ((window.innerHeight + window.scrollY) >= (document.documentElement.scrollHeight - 80)) {
            currentSectionId = 'contact';
        } else {
            sections.forEach(section => {
                const id = section.getAttribute('id');
                if (!id) return;
                const sectionTop = section.offsetTop - 140;
                const sectionHeight = section.offsetHeight;
                if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                    currentSectionId = id;
                }
            });
        }

        navLinks.forEach(link => {
            link.classList.remove('active');
            const href = link.getAttribute('href');
            if (href === `#${currentSectionId}` || href === `index.html#${currentSectionId}` ||
                (currentSectionId === 'sectors' && (href === '#applications' || href === 'index.html#applications'))) {
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

            // Send inquiry to /mail.php (root path works across all language folders)
            fetch('/mail.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: payload
            })
                .then(res => {
                    if (!res.ok) throw new Error('Fallback to /api/contact');
                    return res.json();
                })
                .then(handleResponse)
                .catch(() => {
                    // Fallback to /api/contact if running on serverless
                    fetch('/api/contact', {
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
        metric1: "Upto 98%+",
        label1: "Nutrient Retention",
        metric2: "0%",
        label2: "Added Sugar / Additives",
        metric3: "Upto 12-24 Mo",
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
        metric1: "Upto 100%",
        label1: "Fiber & Color Preservation",
        metric2: "<3 Min",
        label2: "Full Rehydration Time",
        metric3: "Upto 2 Years",
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
        metric1: "Upto 95%+",
        label1: "Essential Oils Saved",
        metric2: "High",
        label2: "Aroma & Flavor Intensity",
        metric3: "Upto 100%",
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
        label1: "Upto 80% Weight Reduction",
        metric2: "Instant",
        label2: "Just Add Water",
        metric3: "Upto 12-24 Mo",
        label3: "No Refrigeration Required",
        serviceVal: "ready-to-eat",
        btnText: "Inquire for Ready-to-Eat Solutions"
    },
    pharmaceuticals: {
        category: "Pharmaceuticals Processing",
        title: "Pharmaceuticals Raw Material Sublimation",
        desc: "Strictly controlled low-temperature lyophilization designed for heat-sensitive active pharmaceutical ingredients, bio-extracts, and pharmaceutical raw materials.",
        image: "images/pharmaceuticals.png",
        badge: "💊 High Purity Standard",
        apps: [],
        metric1: "Job Work",
        label1: "Compliant Facility",
        metric2: "Upto -40°C",
        label2: "Blast Freeze Precision",
        metric3: "High Purity",
        label3: "Strict Quality Control",
        serviceVal: "pharmaceuticals",
        btnText: "Inquire for Pharma Solutions"
    }
};

window.switchSector = function (sectorKey) {
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

    // 2. Instant content and image update (zero lag)
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

    if (spotlightImg) {
        const isSubdir = window.location.pathname.match(/\/(de|fr|es|ru|uk|au)(\/|$)/);
        const prefix = isSubdir ? '../' : '';
        spotlightImg.src = prefix + data.image;
        spotlightImg.alt = data.title;
    }
    if (spotlightBadge) spotlightBadge.textContent = data.badge;
    if (spotlightCat) spotlightCat.textContent = data.category;
    if (spotlightTitle) spotlightTitle.textContent = data.title;
    if (spotlightDesc) spotlightDesc.textContent = data.desc;
    
    const spotlightFeatureCol = spotlightApps ? spotlightApps.closest('.spotlight-feature-col') : null;
    if (spotlightFeatureCol) {
        if (data.apps && data.apps.length > 0) {
            spotlightFeatureCol.style.display = '';
            spotlightApps.innerHTML = data.apps.map(app => `<span class="chip">${app}</span>`).join('');
        } else {
            spotlightFeatureCol.style.display = 'none';
        }
    } else if (spotlightApps) {
        if (data.apps && data.apps.length > 0) {
            spotlightApps.innerHTML = data.apps.map(app => `<span class="chip">${app}</span>`).join('');
        } else {
            spotlightApps.innerHTML = '';
        }
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
};

function initSectorsShowcase() {
    const tabBtns = document.querySelectorAll('.sector-tab-btn');
    if (tabBtns.length === 0) return;

    // Preload all sector images into browser memory immediately
    const isSubdir = window.location.pathname.match(/\/(de|fr|es|ru|uk|au)(\/|$)/);
    const prefix = isSubdir ? '../' : '';
    Object.values(sectorDetailsData).forEach(sector => {
        const preload = new Image();
        preload.src = prefix + sector.image;
    });

    tabBtns.forEach(btn => {
        btn.addEventListener('click', function (e) {
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

// --- LANGUAGE SELECTOR & AUTO GEO-ROUTING ---
function initLanguageSelector() {
    const langSelectors = document.querySelectorAll('.lang-selector');
    langSelectors.forEach(selector => {
        const btn = selector.querySelector('.lang-btn');
        if (!btn) return;

        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            selector.classList.toggle('active');
        });

        // Store manual language selection in localStorage
        const langLinks = selector.querySelectorAll('.lang-dropdown a');
        langLinks.forEach(link => {
            link.addEventListener('click', function () {
                const href = this.getAttribute('href') || '';
                let targetLang = 'en';
                if (href.includes('/de/') || href.includes('de/')) targetLang = 'de';
                else if (href.includes('/fr/') || href.includes('fr/')) targetLang = 'fr';
                else if (href.includes('/es/') || href.includes('es/')) targetLang = 'es';
                else if (href.includes('/ru/') || href.includes('ru/')) targetLang = 'ru';
                else if (href.includes('/uk/') || href.includes('uk/')) targetLang = 'uk';
                else if (href.includes('/au/') || href.includes('au/')) targetLang = 'au';

                localStorage.setItem('truptyum_user_lang', targetLang);
            });
        });
    });

    document.addEventListener('click', () => {
        langSelectors.forEach(selector => selector.classList.remove('active'));
    });

    // Auto Geo / Browser Language Redirect (for root pages)
    autoRouteLanguage();
}

function autoRouteLanguage() {
    const path = window.location.pathname;

    // Do not redirect if already inside a language subfolder or if search engine bot
    if (path.match(/^\/(de|fr|es|ru|uk|au)(\/|$)/)) return;
    if (navigator.userAgent.match(/(bot|crawler|spider|slurp|googlebot|yandexbot)/i)) return;

    let targetLang = localStorage.getItem('truptyum_user_lang');
    if (!targetLang) {
        const userLang = (navigator.language || navigator.userLanguage || '').toLowerCase();
        if (userLang.startsWith('de')) targetLang = 'de';
        else if (userLang.startsWith('fr')) targetLang = 'fr';
        else if (userLang.startsWith('es')) targetLang = 'es';
        else if (userLang.startsWith('ru')) targetLang = 'ru';
        else if (userLang.includes('gb') || userLang.includes('uk')) targetLang = 'uk';
        else if (userLang.includes('au')) targetLang = 'au';
    }

    if (targetLang && ['de', 'fr', 'es', 'ru', 'uk', 'au'].includes(targetLang)) {
        let currentFile = path.split('/').pop();
        if (!currentFile || currentFile === '') {
            currentFile = 'index.html';
        } else if (!currentFile.endsWith('.html')) {
            currentFile = currentFile + '.html';
        }

        const targetUrl = `/${targetLang}/${currentFile}`;
        window.location.replace(targetUrl);
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initLanguageSelector);
} else {
    initLanguageSelector();
}

// --- VIDEO STABILIZATION & DAMPING ---
function initVideoStabilization() {
    const videos = document.querySelectorAll('.facility-card video, .facility-video-container video');
    videos.forEach(video => {
        video.playbackRate = 0.82; // Damps high-frequency handheld jitter into smooth cinematic movement
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initVideoStabilization);
} else {
    initVideoStabilization();
}

// --- FLOATING WHATSAPP BUTTON ---
function initWhatsAppButton() {
    if (document.getElementById('whatsapp-float-btn')) return;

    const waNumber = '919898044856';
    const waMsg = encodeURIComponent("Hi Truptyum Foods LLP\nI have gone through you website and now I want to connect to you regarding our requirement");
    const waUrl = `https://wa.me/${waNumber}?text=${waMsg}`;

    const waBtn = document.createElement('a');
    waBtn.id = 'whatsapp-float-btn';
    waBtn.className = 'whatsapp-float';
    waBtn.href = waUrl;
    waBtn.target = '_blank';
    waBtn.rel = 'noopener noreferrer';
    waBtn.setAttribute('aria-label', 'Chat on WhatsApp with Truptyum Foods LLP');
    waBtn.innerHTML = `
        <span class="wa-pulse"></span>
        <span class="wa-tooltip">Chat on WhatsApp</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="34" height="34" fill="#ffffff" aria-hidden="true">
            <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
        </svg>
    `;
    document.body.appendChild(waBtn);
}

// --- FACILITY GALLERY MOBILE TOGGLE ---
function initFacilityGalleryToggle() {
    const toggleBtn = document.getElementById('facility-toggle-btn');
    const gallery = document.getElementById('facility-gallery') || document.querySelector('.facility-gallery');
    if (!toggleBtn || !gallery) return;

    toggleBtn.addEventListener('click', function () {
        const isExpanded = gallery.classList.toggle('is-expanded');
        this.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');

        const btnText = this.querySelector('.btn-text');
        if (btnText) {
            const expandText = this.getAttribute('data-expand-text') || 'View Full Facility Tour (7+ Photos)';
            const collapseText = this.getAttribute('data-collapse-text') || 'Show Less';
            btnText.textContent = isExpanded ? collapseText : expandText;
        }

        if (!isExpanded) {
            const section = document.getElementById('portfolio');
            if (section) {
                const navHeight = 90;
                const targetPos = section.getBoundingClientRect().top + window.pageYOffset - navHeight;
                window.scrollTo({ top: targetPos, behavior: 'smooth' });
            }
        }
    });
}

function initGlobalEnhancements() {
    initWhatsAppButton();
    initFacilityGalleryToggle();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initGlobalEnhancements);
} else {
    initGlobalEnhancements();
}
