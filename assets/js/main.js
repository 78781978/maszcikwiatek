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

  /* --- Focus trap helper (dla modala cookies i panelu dostępności) --- */
  function getFocusable(container) {
    if (!container) return [];
    return Array.prototype.slice.call(
      container.querySelectorAll('a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])')
    ).filter(function (el) { return el.offsetParent !== null; });
  }
  function trapFocusKeydown(e, container) {
    if (e.key !== 'Tab') return;
    var focusables = getFocusable(container);
    if (!focusables.length) return;
    var first = focusables[0], last = focusables[focusables.length - 1];
    if (e.shiftKey && document.activeElement === first) {
      e.preventDefault(); last.focus();
    } else if (!e.shiftKey && document.activeElement === last) {
      e.preventDefault(); first.focus();
    }
  }

  /* --- Banner + okno zgód cookies (RODO) --- */
  var COOKIE_KEY = 'mck_cookie_consent';
  var banner = document.querySelector('.cookie-banner');
  var cookieBackdrop = document.querySelector('[data-cookie-backdrop]');
  var cookieModal = document.querySelector('.cookie-modal');
  var cookieReturnFocus = null;
  function cookieModalKeydown(e) {
    if (e.key === 'Escape') { closeCookieModal(); return; }
    trapFocusKeydown(e, cookieModal);
  }

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
    cookieReturnFocus = document.activeElement;
    var prefs = getCookiePrefs() || {};
    document.querySelectorAll('[data-cookie-toggle]').forEach(function (btn) {
      var on = !!prefs[btn.getAttribute('data-cookie-toggle')];
      btn.classList.toggle('on', on);
      btn.setAttribute('aria-pressed', on ? 'true' : 'false');
    });
    if (cookieBackdrop) cookieBackdrop.classList.add('open');
    if (cookieModal) cookieModal.classList.add('open');
    document.addEventListener('keydown', cookieModalKeydown);
    // deferred: the browser's own "focus the clicked control" default action
    // runs after this handler and would otherwise steal focus back
    setTimeout(function () {
      var focusables = getFocusable(cookieModal);
      if (focusables.length) focusables[0].focus();
    }, 0);
  }
  function closeCookieModal() {
    if (cookieBackdrop) cookieBackdrop.classList.remove('open');
    if (cookieModal) cookieModal.classList.remove('open');
    document.removeEventListener('keydown', cookieModalKeydown);
    if (cookieReturnFocus && typeof cookieReturnFocus.focus === 'function') cookieReturnFocus.focus();
    cookieReturnFocus = null;
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
  var a11yReturnFocus = null;
  function a11yPanelKeydown(e) {
    if (e.key === 'Escape') { closeA11yPanel(); return; }
    trapFocusKeydown(e, a11yPanel);
  }
  function openA11yPanel() {
    a11yReturnFocus = document.activeElement;
    a11yPanel.classList.add('open');
    a11yToggle.setAttribute('aria-expanded', 'true');
    document.addEventListener('keydown', a11yPanelKeydown);
    // deferred: the browser's own "focus the clicked control" default action
    // runs after this handler and would otherwise steal focus back
    setTimeout(function () {
      var focusables = getFocusable(a11yPanel);
      if (focusables.length) focusables[0].focus();
    }, 0);
  }
  function closeA11yPanel() {
    a11yPanel.classList.remove('open');
    a11yToggle.setAttribute('aria-expanded', 'false');
    document.removeEventListener('keydown', a11yPanelKeydown);
    if (a11yReturnFocus && typeof a11yReturnFocus.focus === 'function') a11yReturnFocus.focus();
    a11yReturnFocus = null;
  }
  if (a11yToggle && a11yPanel) {
    a11yToggle.addEventListener('click', function (e) {
      e.stopPropagation();
      if (a11yPanel.classList.contains('open')) closeA11yPanel(); else openA11yPanel();
    });
    document.addEventListener('click', function (e) {
      if (a11yPanel.classList.contains('open') && !a11yPanel.contains(e.target) && e.target !== a11yToggle) {
        closeA11yPanel();
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

  /* --- Galeria portfolio (zdjęcia + wideo) + lightbox --- */
  var galleryGrid = document.getElementById('gallery-grid');
  if (galleryGrid && window.MCK_GALLERY && window.MCK_GALLERY.length) {
    var galleryBase = window.MCK_ASSET_BASE || '';
    var galleryFallbackAlt = galleryGrid.getAttribute('data-fallback-alt') || '';
    var galleryItems = window.MCK_GALLERY;
    var galleryEmpty = document.getElementById('gallery-empty');
    var galleryVisible = [];

    galleryItems.forEach(function (item, i) {
      var tile = document.createElement('button');
      tile.type = 'button';
      tile.className = 'gallery-tile';
      tile.setAttribute('data-type', item.type);
      tile.setAttribute('data-index', i);
      var label = item.alt || galleryFallbackAlt;
      tile.setAttribute('aria-label', item.type === 'video' ? label + ' (wideo)' : label);

      var img = document.createElement('img');
      img.src = galleryBase + (item.type === 'video' ? (item.poster || item.src) : item.src);
      img.alt = '';
      img.loading = 'lazy';
      tile.appendChild(img);

      if (item.type === 'video') {
        var play = document.createElement('span');
        play.className = 'gallery-tile-play';
        play.setAttribute('aria-hidden', 'true');
        play.innerHTML = '<svg viewBox="0 0 24 24"><path d="M9 7.5v9l7-4.5-7-4.5Z"/></svg>';
        tile.appendChild(play);
      }

      tile.addEventListener('click', function () { openLightbox(i); });
      galleryGrid.appendChild(tile);
    });

    function applyGalleryFilter(filter) {
      galleryVisible = [];
      var tiles = galleryGrid.querySelectorAll('.gallery-tile');
      tiles.forEach(function (tile) {
        var idx = parseInt(tile.getAttribute('data-index'), 10);
        var type = galleryItems[idx].type;
        var show = filter === 'all' || filter === type;
        tile.hidden = !show;
        if (show) galleryVisible.push(idx);
      });
      if (galleryEmpty) galleryEmpty.hidden = galleryVisible.length > 0;
    }
    applyGalleryFilter('all');

    document.querySelectorAll('.gallery-tab').forEach(function (tab) {
      tab.addEventListener('click', function () {
        document.querySelectorAll('.gallery-tab').forEach(function (t) {
          t.classList.remove('active');
          t.setAttribute('aria-selected', 'false');
        });
        tab.classList.add('active');
        tab.setAttribute('aria-selected', 'true');
        applyGalleryFilter(tab.getAttribute('data-filter'));
      });
    });

    var lightbox = document.querySelector('.lightbox');
    var lightboxBackdrop = document.querySelector('[data-lightbox-backdrop]');
    var lightboxStage = document.getElementById('lightbox-stage');
    var lightboxReturnFocus = null;
    var lightboxCurrentIndex = null;

    function renderLightboxItem(index) {
      var item = galleryItems[index];
      lightboxStage.innerHTML = '';
      if (item.type === 'video') {
        var video = document.createElement('video');
        video.src = galleryBase + item.src;
        video.controls = true;
        video.autoplay = true;
        video.playsInline = true;
        if (item.poster) video.poster = galleryBase + item.poster;
        lightboxStage.appendChild(video);
      } else {
        var img2 = document.createElement('img');
        img2.src = galleryBase + item.src;
        img2.alt = item.alt || galleryFallbackAlt;
        lightboxStage.appendChild(img2);
      }
    }

    function stepLightbox(dir) {
      if (!galleryVisible.length) return;
      var pos = galleryVisible.indexOf(lightboxCurrentIndex);
      pos = (pos + dir + galleryVisible.length) % galleryVisible.length;
      openLightbox(galleryVisible[pos]);
    }

    function lightboxKeydown(e) {
      if (e.key === 'Escape') { closeLightbox(); return; }
      if (e.key === 'ArrowRight') { stepLightbox(1); return; }
      if (e.key === 'ArrowLeft') { stepLightbox(-1); return; }
      trapFocusKeydown(e, lightbox);
    }

    function openLightbox(index) {
      lightboxCurrentIndex = index;
      lightboxReturnFocus = document.activeElement;
      renderLightboxItem(index);
      if (lightboxBackdrop) lightboxBackdrop.classList.add('open');
      if (lightbox) lightbox.classList.add('open');
      document.body.style.overflow = 'hidden';
      document.addEventListener('keydown', lightboxKeydown);
      // deferred: the browser's own "focus the clicked control" default action
      // runs after this handler and would otherwise steal focus back
      setTimeout(function () {
        var closeBtn = lightbox.querySelector('[data-lightbox="close"]');
        if (closeBtn) closeBtn.focus();
      }, 0);
    }
    function closeLightbox() {
      if (lightboxBackdrop) lightboxBackdrop.classList.remove('open');
      if (lightbox) lightbox.classList.remove('open');
      document.body.style.overflow = '';
      lightboxStage.innerHTML = '';
      document.removeEventListener('keydown', lightboxKeydown);
      if (lightboxReturnFocus && typeof lightboxReturnFocus.focus === 'function') lightboxReturnFocus.focus();
      lightboxReturnFocus = null;
    }

    if (lightbox) {
      var lightboxCloseBtn = lightbox.querySelector('[data-lightbox="close"]');
      if (lightboxCloseBtn) lightboxCloseBtn.addEventListener('click', closeLightbox);
      var lightboxPrevBtn = lightbox.querySelector('[data-lightbox="prev"]');
      if (lightboxPrevBtn) lightboxPrevBtn.addEventListener('click', function () { stepLightbox(-1); });
      var lightboxNextBtn = lightbox.querySelector('[data-lightbox="next"]');
      if (lightboxNextBtn) lightboxNextBtn.addEventListener('click', function () { stepLightbox(1); });
    }
    if (lightboxBackdrop) lightboxBackdrop.addEventListener('click', closeLightbox);
  }

});
