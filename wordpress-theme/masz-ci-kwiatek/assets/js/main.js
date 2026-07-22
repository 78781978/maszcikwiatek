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

  /* --- Banner + okno zgód cookies (RODO) --- */
  var COOKIE_KEY = 'mck_cookie_consent';
  var banner = document.querySelector('.cookie-banner');
  var cookieBackdrop = document.querySelector('[data-cookie-backdrop]');
  var cookieModal = document.querySelector('.cookie-modal');

  function getCookiePrefs() {
    try {
      var raw = localStorage.getItem(COOKIE_KEY);
      if (!raw) return null;
      var parsed = JSON.parse(raw);
      return (parsed && typeof parsed === 'object') ? parsed : null;
    } catch (e) { return null; }
  }
  function saveCookiePrefs(prefs) {
    prefs.necessary = true;
    prefs.ts = Date.now();
    localStorage.setItem(COOKIE_KEY, JSON.stringify(prefs));
  }
  function openCookieModal() {
    var prefs = getCookiePrefs() || {};
    document.querySelectorAll('[data-cookie-toggle]').forEach(function (btn) {
      var on = !!prefs[btn.getAttribute('data-cookie-toggle')];
      btn.classList.toggle('on', on);
      btn.setAttribute('aria-pressed', on ? 'true' : 'false');
    });
    if (cookieBackdrop) cookieBackdrop.classList.add('open');
    if (cookieModal) cookieModal.classList.add('open');
  }
  function closeCookieModal() {
    if (cookieBackdrop) cookieBackdrop.classList.remove('open');
    if (cookieModal) cookieModal.classList.remove('open');
  }

  if (banner) {
    var prefs0 = getCookiePrefs();
    if (!prefs0) {
      setTimeout(function () { banner.classList.add('show'); }, 700);
    }
    var accept = banner.querySelector('[data-cookie="accept"]');
    var reject = banner.querySelector('[data-cookie="reject"]');
    var settingsBtn = banner.querySelector('[data-cookie="settings"]');
    if (accept) accept.addEventListener('click', function () {
      saveCookiePrefs({ analytics: true, marketing: true });
      banner.classList.remove('show');
      closeCookieModal();
    });
    if (reject) reject.addEventListener('click', function () {
      saveCookiePrefs({ analytics: false, marketing: false });
      banner.classList.remove('show');
      closeCookieModal();
    });
    if (settingsBtn) settingsBtn.addEventListener('click', openCookieModal);
  }

  document.querySelectorAll('[data-cookie-toggle]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var on = !btn.classList.contains('on');
      btn.classList.toggle('on', on);
      btn.setAttribute('aria-pressed', on ? 'true' : 'false');
    });
  });

  var cookieSaveBtn = document.querySelector('[data-cookie="save"]');
  if (cookieSaveBtn) cookieSaveBtn.addEventListener('click', function () {
    var prefs = {};
    document.querySelectorAll('[data-cookie-toggle]').forEach(function (btn) {
      prefs[btn.getAttribute('data-cookie-toggle')] = btn.classList.contains('on');
    });
    saveCookiePrefs(prefs);
    closeCookieModal();
    if (banner) banner.classList.remove('show');
  });
  var cookieAcceptAllModalBtn = document.querySelector('[data-cookie="accept-all-modal"]');
  if (cookieAcceptAllModalBtn) cookieAcceptAllModalBtn.addEventListener('click', function () {
    saveCookiePrefs({ analytics: true, marketing: true });
    closeCookieModal();
    if (banner) banner.classList.remove('show');
  });
  var cookieCloseBtn = document.querySelector('[data-cookie="close"]');
  if (cookieCloseBtn) cookieCloseBtn.addEventListener('click', closeCookieModal);
  if (cookieBackdrop) cookieBackdrop.addEventListener('click', closeCookieModal);
  document.querySelectorAll('[data-cookie="reopen"]').forEach(function (link) {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      openCookieModal();
    });
  });

  /* --- Panel dostępności (WCAG) --- */
  var A11Y_KEY = 'mck_a11y_settings';
  var FONT_STEPS = [100, 110, 120, 132, 145];

  function getA11y() {
    try {
      var raw = localStorage.getItem(A11Y_KEY);
      return raw ? JSON.parse(raw) : null;
    } catch (e) { return null; }
  }
  function saveA11y(s) { localStorage.setItem(A11Y_KEY, JSON.stringify(s)); }

  var a11yPanel = document.getElementById('a11y-panel');
  function applyA11y(s) {
    document.documentElement.style.fontSize = FONT_STEPS[s.fontStep] + '%';
    document.documentElement.classList.toggle('a11y-contrast', !!s.contrast);
    document.documentElement.classList.toggle('a11y-underline', !!s.underline);
    document.documentElement.classList.toggle('a11y-readable', !!s.readable);
    if (a11yPanel) {
      ['contrast', 'underline', 'readable'].forEach(function (key) {
        var btn = a11yPanel.querySelector('[data-a11y="' + key + '"]');
        if (btn) {
          btn.classList.toggle('on', !!s[key]);
          btn.setAttribute('aria-pressed', s[key] ? 'true' : 'false');
        }
      });
    }
  }

  var a11yState = getA11y() || { fontStep: 0, contrast: false, underline: false, readable: false };
  applyA11y(a11yState);

  var a11yToggle = document.getElementById('a11y-toggle');
  if (a11yToggle && a11yPanel) {
    a11yToggle.addEventListener('click', function (e) {
      e.stopPropagation();
      var open = a11yPanel.classList.toggle('open');
      a11yToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    document.addEventListener('click', function (e) {
      if (a11yPanel.classList.contains('open') && !a11yPanel.contains(e.target) && e.target !== a11yToggle) {
        a11yPanel.classList.remove('open');
        a11yToggle.setAttribute('aria-expanded', 'false');
      }
    });
    var fontInc = a11yPanel.querySelector('[data-a11y="font-inc"]');
    var fontDec = a11yPanel.querySelector('[data-a11y="font-dec"]');
    if (fontInc) fontInc.addEventListener('click', function () {
      a11yState.fontStep = Math.min(a11yState.fontStep + 1, FONT_STEPS.length - 1);
      saveA11y(a11yState); applyA11y(a11yState);
    });
    if (fontDec) fontDec.addEventListener('click', function () {
      a11yState.fontStep = Math.max(a11yState.fontStep - 1, 0);
      saveA11y(a11yState); applyA11y(a11yState);
    });
    ['contrast', 'underline', 'readable'].forEach(function (key) {
      var btn = a11yPanel.querySelector('[data-a11y="' + key + '"]');
      if (btn) btn.addEventListener('click', function () {
        a11yState[key] = !a11yState[key];
        saveA11y(a11yState); applyA11y(a11yState);
      });
    });
    var a11yResetBtn = a11yPanel.querySelector('[data-a11y="reset"]');
    if (a11yResetBtn) a11yResetBtn.addEventListener('click', function () {
      a11yState = { fontStep: 0, contrast: false, underline: false, readable: false };
      saveA11y(a11yState); applyA11y(a11yState);
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
