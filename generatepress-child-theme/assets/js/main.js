/**
 * InteriorAR Child Theme - Main JavaScript
 *
 * @package InteriorAR_Child
 */

(function() {
    'use strict';

    // ==========================================================================
    // Scroll Reveal Animation
    // ==========================================================================
    function initScrollReveal() {
        const elements = document.querySelectorAll('.sr');
        
        if (!elements.length) return;
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        elements.forEach(el => observer.observe(el));
    }

    // ==========================================================================
    // Territories Row Animation
    // ==========================================================================
    function initTerritoriesReveal() {
        const rows = document.querySelectorAll('.t-row');
        
        if (!rows.length) return;
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.2
        });
        
        rows.forEach(row => observer.observe(row));
    }

    // ==========================================================================
    // Mobile Navigation Toggle
    // ==========================================================================
    function initMobileNav() {
        const toggle = document.querySelector('.nav-toggle');
        const navLinks = document.querySelector('.nav-links');
        
        if (!toggle || !navLinks) return;
        
        toggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            navLinks.classList.toggle('active');
        });
        
        // Close menu on link click
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                toggle.setAttribute('aria-expanded', 'false');
                navLinks.classList.remove('active');
            });
        });
    }

    // ==========================================================================
    // Smooth Scroll for Anchor Links
    // ==========================================================================
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                
                if (targetId === '#') return;
                
                const target = document.querySelector(targetId);
                
                if (target) {
                    e.preventDefault();
                    const navHeight = document.querySelector('.site-nav')?.offsetHeight || 0;
                    const tickerHeight = document.querySelector('.ticker')?.offsetHeight || 0;
                    const offset = navHeight + tickerHeight + 20;
                    
                    window.scrollTo({
                        top: target.offsetTop - offset,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // ==========================================================================
    // Newsletter Form (Acumbamail)
    // ==========================================================================
    function initNewsletterForm() {
        const forms = document.querySelectorAll('.acumbamail-form');
        
        forms.forEach(form => {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const emailInput = this.querySelector('input[type="email"]');
                const gdprCheckbox = this.querySelector('.g-check');
                const submitBtn = this.querySelector('button[type="submit"]');
                const btnText = submitBtn.querySelector('.btn-text');
                const btnLoading = submitBtn.querySelector('.btn-loading');
                const messageDiv = this.querySelector('.form-message') || createMessageDiv(this);
                
                // Validate
                if (!emailInput.value || !isValidEmail(emailInput.value)) {
                    showMessage(messageDiv, 'Por favor, introduce un email válido.', 'error');
                    return;
                }
                
                if (gdprCheckbox && !gdprCheckbox.checked) {
                    showMessage(messageDiv, 'Debes aceptar la política de privacidad.', 'error');
                    return;
                }
                
                // Show loading state
                submitBtn.disabled = true;
                if (btnText) btnText.style.display = 'none';
                if (btnLoading) btnLoading.style.display = 'inline';
                
                try {
                    const formData = new FormData();
                    formData.append('action', 'interiorar_subscribe');
                    formData.append('email', emailInput.value);
                    formData.append('gdpr', gdprCheckbox ? gdprCheckbox.checked.toString() : 'true');
                    formData.append('nonce', interiorarOptions.nonce);
                    
                    const response = await fetch(interiorarOptions.ajaxUrl, {
                        method: 'POST',
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        showMessage(messageDiv, result.data.message, 'success');
                        emailInput.value = '';
                        if (gdprCheckbox) gdprCheckbox.checked = false;
                    } else {
                        showMessage(messageDiv, result.data.message || 'Error al procesar la solicitud.', 'error');
                    }
                } catch (error) {
                    console.error('Form submission error:', error);
                    showMessage(messageDiv, 'Error de conexión. Inténtalo más tarde.', 'error');
                } finally {
                    submitBtn.disabled = false;
                    if (btnText) btnText.style.display = 'inline';
                    if (btnLoading) btnLoading.style.display = 'none';
                }
            });
        });
    }
    
    function createMessageDiv(form) {
        const div = document.createElement('div');
        div.className = 'form-message';
        div.style.display = 'none';
        form.appendChild(div);
        return div;
    }
    
    function showMessage(element, message, type) {
        element.textContent = message;
        element.className = 'form-message ' + type;
        element.style.display = 'block';
        element.style.marginTop = '12px';
        element.style.padding = '10px';
        element.style.fontSize = '12px';
        element.style.borderRadius = '4px';
        
        if (type === 'success') {
            element.style.background = 'rgba(143, 209, 79, 0.2)';
            element.style.color = '#8fd14f';
            element.style.border = '1px solid rgba(143, 209, 79, 0.3)';
        } else {
            element.style.background = 'rgba(255, 92, 26, 0.2)';
            element.style.color = '#ff5c1a';
            element.style.border = '1px solid rgba(255, 92, 26, 0.3)';
        }
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            element.style.display = 'none';
        }, 5000);
    }
    
    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // ==========================================================================
    // Glitch Effect Enhancement
    // ==========================================================================
    function initGlitchEffect() {
        const glitchContainers = document.querySelectorAll('.glitch-container');
        
        glitchContainers.forEach(container => {
            container.addEventListener('mouseenter', () => {
                container.classList.add('glitching');
            });
            
            container.addEventListener('mouseleave', () => {
                container.classList.remove('glitching');
            });
        });
    }

    // ==========================================================================
    // Initialize Everything
    // ==========================================================================
    function init() {
        initScrollReveal();
        initTerritoriesReveal();
        initMobileNav();
        initSmoothScroll();
        initNewsletterForm();
        initGlitchEffect();
    }
    
    // Run on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
})();
