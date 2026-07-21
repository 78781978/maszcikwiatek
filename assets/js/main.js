/* Kwiaciarnia "Masz Ci Kwiatek!" - skrypty strony */

document.addEventListener('DOMContentLoaded', function () {

  /* --- Header: cień po przewinięciu --- */
  var header = document.querySelector('.site-header');
  if (header) {
    var onScroll = function () {
      header.classList.toggle('scrolled', window.scrollY > 20);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* --- Menu mobilne --- */
  var toggle = document.querySelector('.nav-toggle');
  var mobileNav = document.querySelector('.mobile-nav');
  if (toggle && mobileNav) {
    var closeBtn = mobileNav.querySelector('.close-nav');
    var open = function () { mobileNav.classList.add('open'); document.body.style.overflow = 'hidden'; };
    var close = function () { mobileNav.classList.remove('open'); document.body.style.overflow = ''; };
    toggle.addEventListener('click', open);
    if (closeBtn) closeBtn.addEventListener('click', close);
    mobileNav.querySelectorAll('a').forEach(function (a) { a.addEventListener('click', close); });
  }

  /* --- Animacja pojawiania się sekcji --- */
  var reveals = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && reveals.length) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });
    reveals.forEach(function (el) { io.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add('in'); });
  }

  /* --- Banner cookies (RODO) --- */
  var COOKIE_KEY = 'mck_cookie_consent';
  var banner = document.querySelector('.cookie-banner');
  if (banner) {
    var saved = localStorage.getItem(COOKIE_KEY);
    if (!saved) {
      setTimeout(function () { banner.classList.add('show'); }, 700);
    }
    var accept = banner.querySelector('[data-cookie="accept"]');
    var reject = banner.querySelector('[data-cookie="reject"]');
    if (accept) accept.addEventListener('click', function () {
      localStorage.setItem(COOKIE_KEY, 'accepted');
      banner.classList.remove('show');
    });
    if (reject) reject.addEventListener('click', function () {
      localStorage.setItem(COOKIE_KEY, 'rejected');
      banner.classList.remove('show');
    });
  }

  /* --- Formularz kontaktowy (FormSubmit.co - bez backendu) --- */
  var form = document.getElementById('contact-form');
  if (form) {
    var msg = document.getElementById('form-msg');
    var submitBtn = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      // pułapka na boty (honeypot)
      if (form.querySelector('input[name="_honey"]').value) return;

      var endpoint = form.getAttribute('data-endpoint');
      var data = new FormData(form);
      var originalText = submitBtn.textContent;
      submitBtn.disabled = true;
      submitBtn.textContent = 'Wysyłanie...';

      fetch(endpoint, {
        method: 'POST',
        body: data,
        headers: { 'Accept': 'application/json' }
      })
        .then(function (res) {
          if (res.ok) {
            msg.textContent = 'Dziękujemy! Twoja wiadomość została wysłana - odezwiemy się najszybciej, jak to możliwe.';
            msg.className = 'form-msg ok';
            form.reset();
          } else {
            throw new Error('Błąd wysyłki');
          }
        })
        .catch(function () {
          msg.textContent = 'Nie udało się wysłać wiadomości. Zadzwoń do nas lub napisz bezpośrednio na adres e-mail.';
          msg.className = 'form-msg err';
        })
        .finally(function () {
          submitBtn.disabled = false;
          submitBtn.textContent = originalText;
        });
    });
  }

});
