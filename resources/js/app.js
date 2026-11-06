import Alpine from 'alpinejs';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.Alpine = Alpine;
Alpine.start();

/* =============================================
   CUSTOM CURSOR
   ============================================= */
(function initCursor() {
    if (window.matchMedia('(pointer: coarse)').matches) return;
    const cursor = document.getElementById('cursor');
    const ring   = document.getElementById('cursor-ring');
    if (!cursor || !ring) return;

    let mx = window.innerWidth / 2, my = window.innerHeight / 2;
    let rx = mx, ry = my;

    document.addEventListener('mousemove', e => {
        mx = e.clientX; my = e.clientY;
        gsap.to(cursor, { x: mx, y: my, duration: 0.1, ease: 'power2.out' });
    });

    // Lag ring for smooth follow
    gsap.ticker.add(() => {
        rx += (mx - rx) * 0.12;
        ry += (my - ry) * 0.12;
        gsap.set(ring, { x: rx, y: ry });
    });

    // Hover enlarge
    document.querySelectorAll('a, button, .project-card, .skill-tag').forEach(el => {
        el.addEventListener('mouseenter', () => document.body.classList.add('cursor-hover'));
        el.addEventListener('mouseleave', () => document.body.classList.remove('cursor-hover'));
    });
})();

/* =============================================
   NAVBAR SCROLL STATE
   ============================================= */
(function initNavbar() {
    const nav = document.querySelector('.navbar');
    if (!nav) return;
    const toggle = () => nav.classList.toggle('scrolled', window.scrollY > 40);
    toggle();
    window.addEventListener('scroll', toggle, { passive: true });
})();

/* =============================================
   MOBILE MENU
   ============================================= */
window.mobileMenu = () => ({
    open: false,
    toggle() { this.open = !this.open; document.body.style.overflow = this.open ? 'hidden' : ''; },
    close() { this.open = false; document.body.style.overflow = ''; },
});

/* =============================================
   SCROLL REVEAL (IntersectionObserver)
   ============================================= */
(function initReveal() {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) {
        document.querySelectorAll('.reveal, .reveal-stagger').forEach(el => {
            el.style.opacity = '1';
            el.style.transform = 'none';
        });
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.reveal, .reveal-stagger').forEach(el => observer.observe(el));
})();

/* =============================================
   HERO ANIMATION
   ============================================= */
(function initHero() {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) {
        document.querySelectorAll('.word-inner').forEach(el => {
            el.style.transform = 'translateY(0)';
            el.style.opacity = '1';
        });
        return;
    }

    const wordInners = document.querySelectorAll('.word-inner');
    if (!wordInners.length) return;

    gsap.to(wordInners, {
        y: 0,
        opacity: 1,
        duration: 1.1,
        ease: 'power4.out',
        stagger: 0.08,
        delay: 0.2,
    });

    // Animate hero subtitle and CTA
    gsap.from('.hero-sub, .hero-cta, .hero-meta', {
        y: 20,
        opacity: 0,
        duration: 0.8,
        ease: 'power3.out',
        stagger: 0.12,
        delay: 0.9,
    });

    // Code terminal lines
    const codeLines = document.querySelectorAll('.code-line');
    if (codeLines.length) {
        gsap.to(codeLines, {
            x: 0,
            opacity: 1,
            duration: 0.5,
            stagger: 0.08,
            delay: 1.0,
            ease: 'power2.out',
        });
    }
})();

/* =============================================
   ANIMATED COUNTER
   ============================================= */
window.animateCounter = (el) => {
    const target = parseInt(el.dataset.target, 10);
    const duration = 1800;
    const start = performance.now();
    const prefix = el.dataset.prefix || '';
    const suffix = el.dataset.suffix || '';

    const step = (now) => {
        const progress = Math.min((now - start) / duration, 1);
        const ease = 1 - Math.pow(1 - progress, 3);
        el.textContent = prefix + Math.floor(ease * target) + suffix;
        if (progress < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
};

(function initCounters() {
    const counters = document.querySelectorAll('[data-counter]');
    if (!counters.length) return;

    const obs = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                window.animateCounter(entry.target);
                obs.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(el => obs.observe(el));
})();

/* =============================================
   PROJECT FILTER
   ============================================= */
window.projectFilter = (initialCategory = 'all') => ({
    active: initialCategory,
    filter(category) {
        this.active = category;
        const cards = document.querySelectorAll('.project-card-wrap');
        cards.forEach(card => {
            const show = category === 'all' || card.dataset.category === category;
            if (show) {
                card.style.display = '';
                card.style.opacity = '0';
                card.style.transform = 'translateY(12px)';
                requestAnimationFrame(() => {
                    card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                });
            } else {
                card.style.display = 'none';
            }
        });
    },
});

/* =============================================
   MAGNETIC BUTTON EFFECT
   ============================================= */
(function initMagnetic() {
    if (window.matchMedia('(pointer: coarse)').matches) return;

    document.querySelectorAll('.btn-magnetic').forEach(btn => {
        btn.addEventListener('mousemove', (e) => {
            const rect = btn.getBoundingClientRect();
            const cx = rect.left + rect.width / 2;
            const cy = rect.top + rect.height / 2;
            const dx = (e.clientX - cx) * 0.3;
            const dy = (e.clientY - cy) * 0.3;
            gsap.to(btn, { x: dx, y: dy, duration: 0.4, ease: 'power2.out' });
        });
        btn.addEventListener('mouseleave', () => {
            gsap.to(btn, { x: 0, y: 0, duration: 0.6, ease: 'elastic.out(1, 0.5)' });
        });
    });
})();

/* =============================================
   FLASH MESSAGE AUTO-DISMISS
   ============================================= */
(function initFlash() {
    const flashes = document.querySelectorAll('[data-flash]');
    flashes.forEach(el => {
        setTimeout(() => {
            gsap.to(el, { opacity: 0, y: -10, duration: 0.4, onComplete: () => el.remove() });
        }, 4000);
    });
})();

/* =============================================
   ACTIVE NAV LINK
   ============================================= */
(function setActiveNav() {
    const path = window.location.pathname;
    document.querySelectorAll('.nav-link').forEach(link => {
        const href = link.getAttribute('href');
        if (!href) return;
        const isActive = href === path || (href !== '/' && path.startsWith(href));
        link.classList.toggle('active', isActive);
    });
})();
