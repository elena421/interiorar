/**
 * InteriorAR - JavaScript (Vanilla)
 * Coloca este archivo en:
 * wp-content/themes/generatepress-child/assets/js/interiorar.js
 */

(function() {
  'use strict';

  // ============================================
  // CURSOR FOLLOWER
  // ============================================
  const cursor = document.getElementById('cursorGlitch');
  
  document.addEventListener('mousemove', (e) => {
    cursor.style.left = e.clientX + 'px';
    cursor.style.top = e.clientY + 'px';
    cursor.classList.add('visible');
  });

  document.addEventListener('mouseleave', () => {
    cursor.classList.remove('visible');
  });

  // ============================================
  // NAVIGATION SCROLL EFFECT
  // ============================================
  const nav = document.getElementById('mainNav');
  
  window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
      nav.classList.add('scrolled');
    } else {
      nav.classList.remove('scrolled');
    }
  });

  // ============================================
  // MATRIX RAIN EFFECT
  // ============================================
  const matrixBg = document.getElementById('matrixBg');
  
  function createMatrixChar() {
    const char = document.createElement('span');
    char.className = 'matrix-char';
    char.textContent = String.fromCharCode(0x30A0 + Math.random() * 96);
    char.style.left = Math.random() * 100 + '%';
    char.style.animationDuration = (3 + Math.random() * 4) + 's';
    char.style.animationDelay = Math.random() * 5 + 's';
    matrixBg.appendChild(char);
    
    // Remove after animation
    setTimeout(() => {
      char.remove();
    }, 10000);
  }

  // Create initial matrix chars
  for (let i = 0; i < 50; i++) {
    setTimeout(createMatrixChar, i * 100);
  }

  // Keep creating new chars
  setInterval(createMatrixChar, 200);

  // ============================================
  // SCRAMBLE TEXT EFFECT
  // ============================================
  const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%';
  
  function scrambleText(element) {
    const originalText = element.dataset.text;
    const delay = parseInt(element.dataset.delay) || 0;
    let iteration = 0;
    
    setTimeout(() => {
      const interval = setInterval(() => {
        element.textContent = originalText
          .split('')
          .map((char, i) => {
            if (i < iteration) return originalText[i];
            if (char === ' ') return ' ';
            return chars[Math.floor(Math.random() * chars.length)];
          })
          .join('');
        
        iteration += 0.8;
        
        if (iteration >= originalText.length) {
          element.textContent = originalText;
          clearInterval(interval);
        }
      }, 25);
    }, delay);
  }

  // Observe scramble elements
  const scrambleObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting && !entry.target.dataset.animated) {
        entry.target.dataset.animated = 'true';
        scrambleText(entry.target);
      }
    });
  }, { threshold: 0.3 });

  document.querySelectorAll('.scramble').forEach(el => {
    scrambleObserver.observe(el);
  });

  // ============================================
  // GLITCHY TEXT EFFECT
  // ============================================
  const glitchyElements = document.querySelectorAll('.glitchy');
  const glitchChars = '!@#$%^&*()_+-=[]{}|;:,.<>?█▓▒░';

  glitchyElements.forEach(el => {
    const originalText = el.dataset.text || el.textContent;
    
    setInterval(() => {
      if (Math.random() > 0.85) {
        const text = originalText.split('');
        const glitchCount = Math.floor(Math.random() * 3) + 1;
        
        for (let i = 0; i < glitchCount; i++) {
          const pos = Math.floor(Math.random() * text.length);
          text[pos] = glitchChars[Math.floor(Math.random() * glitchChars.length)];
        }
        
        el.textContent = text.join('');
        
        setTimeout(() => {
          el.textContent = originalText;
        }, 100);
      }
    }, 150);
  });

  // ============================================
  // SMOOTH SCROLL FOR ANCHORS
  // ============================================
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });

  // ============================================
  // COOKIE BANNER
  // ============================================
  const cookieBanner = document.getElementById('cookieBanner');

  // Check if cookies already accepted
  if (!localStorage.getItem('interiorar_cookies')) {
    setTimeout(() => {
      cookieBanner.style.display = 'block';
      cookieBanner.style.animation = 'slideUp 0.5s ease forwards';
    }, 2500);
  }

  window.acceptCookies = function() {
    localStorage.setItem('interiorar_cookies', 'true');
    cookieBanner.style.animation = 'slideDown 0.3s ease forwards';
    setTimeout(() => {
      cookieBanner.style.display = 'none';
    }, 300);
  };

  window.closeCookies = function() {
    cookieBanner.style.animation = 'slideDown 0.3s ease forwards';
    setTimeout(() => {
      cookieBanner.style.display = 'none';
    }, 300);
  };

  // ============================================
  // FORM HANDLING (Optional - for non-Acumbamail)
  // ============================================
  const forms = document.querySelectorAll('.form-container form');
  
  forms.forEach(form => {
    form.addEventListener('submit', function(e) {
      const checkbox = form.querySelector('input[type="checkbox"]');
      
      if (!checkbox.checked) {
        e.preventDefault();
        form.closest('.form-container').classList.add('shake');
        setTimeout(() => {
          form.closest('.form-container').classList.remove('shake');
        }, 400);
        return;
      }
      
      // Si quieres manejarlo con AJAX en lugar de enviar a Acumbamail directamente,
      // descomenta el siguiente código:
      /*
      e.preventDefault();
      const button = form.querySelector('button');
      const originalText = button.querySelector('.btn-text').textContent;
      
      button.querySelector('.btn-text').textContent = '[ TRANSMITIENDO... ]';
      button.querySelector('.btn-glitch').textContent = '[ TRANSMITIENDO... ]';
      
      // Simulación - reemplazar con tu lógica de AJAX
      setTimeout(() => {
        button.classList.add('success');
        button.querySelector('.btn-text').textContent = '[ TRANSMITIDO ]';
        button.querySelector('.btn-glitch').textContent = '[ TRANSMITIDO ]';
        
        setTimeout(() => {
          button.classList.remove('success');
          button.querySelector('.btn-text').textContent = originalText;
          button.querySelector('.btn-glitch').textContent = originalText;
          form.reset();
        }, 3000);
      }, 1500);
      */
    });
  });

  // ============================================
  // INTERSECTION OBSERVER FOR ANIMATIONS
  // ============================================
  const animateOnScroll = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate-in');
      }
    });
  }, { threshold: 0.1 });

  // Add animation classes to elements
  document.querySelectorAll('.mechanism-item, .topic-card, .why-card').forEach(el => {
    animateOnScroll.observe(el);
  });

  // ============================================
  // KEYFRAMES FOR ANIMATIONS (added via JS)
  // ============================================
  const style = document.createElement('style');
  style.textContent = `
    @keyframes slideUp {
      from { transform: translate(-50%, 100px); opacity: 0; }
      to { transform: translate(-50%, 0); opacity: 1; }
    }
    @keyframes slideDown {
      from { transform: translate(-50%, 0); opacity: 1; }
      to { transform: translate(-50%, 100px); opacity: 0; }
    }
    .animate-in {
      animation: fadeInUp 0.6s ease forwards;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
  `;
  document.head.appendChild(style);

})();
