/**
 * Karuizawa Oiwake Church Theme — main scripts
 * Extracted from static HTML (scroll reveal, header, mobile nav, smart back, gallery, etc.)
 */
(function () {
  'use strict';

  // Reveal Observer for scroll animations
      const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
      };

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
          }
        });
      }, observerOptions);

      document.querySelectorAll('.stagger-in').forEach(el => {
        observer.observe(el);
      });

      // Header theme: solid on text areas, frosted on images
      const siteHeader = document.getElementById('site-header');
      let headerTicking = false;

      function updateSiteHeaderHeight() {
        if (!siteHeader) return;
        document.documentElement.style.setProperty('--site-header-height', `${siteHeader.offsetHeight}px`);
      }

      function updateHeaderTheme() {
        if (!siteHeader) return;

        updateSiteHeaderHeight();

        const probe = siteHeader.offsetHeight * 0.5;
        let zone = 'light';

        document.querySelectorAll('[data-header-zone]').forEach((section) => {
          const rect = section.getBoundingClientRect();
          if (rect.top <= probe && rect.bottom > probe) {
            zone = section.dataset.headerZone;
          }
        });

        siteHeader.classList.toggle('header--solid', zone === 'light');
        siteHeader.classList.toggle('header--overlay', zone === 'image');
        headerTicking = false;
      }

      function requestHeaderThemeUpdate() {
        if (!headerTicking) {
          headerTicking = true;
          requestAnimationFrame(updateHeaderTheme);
        }
      }

      window.addEventListener('scroll', requestHeaderThemeUpdate, { passive: true });
      window.addEventListener('resize', requestHeaderThemeUpdate);
      updateHeaderTheme();
      updateSiteHeaderHeight();

      const mobileNavToggle = document.getElementById('mobile-nav-toggle');
      const mobileNav = document.getElementById('mobile-nav');
      const mobileNavIcon = document.querySelector('.mobile-nav-toggle-icon');
      let mobileNavOpen = false;

      const onMobileNavTransitionEnd = (event) => {
        if (!mobileNav || event.target !== mobileNav || event.propertyName !== 'max-height') return;
        mobileNav.removeEventListener('transitionend', onMobileNavTransitionEnd);
        if (!mobileNavOpen) {
          mobileNav.hidden = true;
          mobileNav.setAttribute('aria-hidden', 'true');
        }
        updateSiteHeaderHeight();
      };

      function setMobileNavOpen(open) {
        if (!mobileNavToggle || !mobileNav) return;

        mobileNav.removeEventListener('transitionend', onMobileNavTransitionEnd);
        mobileNavOpen = open;
        mobileNavToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        mobileNavToggle.setAttribute('aria-label', open ? 'メニューを閉じる' : 'メニューを開く');
        if (mobileNavIcon) {
          mobileNavIcon.textContent = open ? 'close' : 'menu';
        }
        document.body.classList.toggle('mobile-nav-open', open);
        siteHeader?.classList.toggle('site-header--mobile-nav-open', open);

        if (open) {
          mobileNav.hidden = false;
          mobileNav.setAttribute('aria-hidden', 'false');
          requestAnimationFrame(() => {
            mobileNav.classList.add('mobile-nav-panel--open');
            updateSiteHeaderHeight();
          });
          mobileNav.addEventListener('transitionend', onMobileNavTransitionEnd);
          return;
        }

        mobileNav.classList.remove('mobile-nav-panel--open');
        mobileNav.addEventListener('transitionend', onMobileNavTransitionEnd);
        updateSiteHeaderHeight();
      }

      mobileNavToggle?.addEventListener('click', () => {
        setMobileNavOpen(!mobileNavOpen);
      });

      mobileNav?.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
          setMobileNavOpen(false);
        });
      });

      document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && mobileNavOpen) {
          setMobileNavOpen(false);
        }
      });

      window.matchMedia('(min-width: 1024px)').addEventListener('change', (event) => {
        if (event.matches && mobileNavOpen) {
          setMobileNavOpen(false);
        }
      });

      // Header show/hide vs footer — never hide while at page top
      const siteFooter = document.getElementById('site-footer');
      if (siteHeader) {
        let footerIntersecting = false;
        let headerVisibilityTicking = false;

        const showHeader = () => {
          siteHeader.classList.remove('header--hidden');
        };

        const updateHeaderVisibility = () => {
          // 1) Top of page: always show header
          if (window.scrollY <= 0) {
            showHeader();
            headerVisibilityTicking = false;
            return;
          }

          // 2) Only after the user has scrolled: apply footer intersection hide
          if (siteFooter) {
            siteHeader.classList.toggle('header--hidden', footerIntersecting);
          }
          headerVisibilityTicking = false;
        };

        const requestHeaderVisibilityUpdate = () => {
          if (!headerVisibilityTicking) {
            headerVisibilityTicking = true;
            requestAnimationFrame(updateHeaderVisibility);
          }
        };

        // Force visible on init (prevent early observer/scroll from hiding)
        showHeader();

        if (siteFooter) {
          const footerObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
              footerIntersecting = entry.isIntersecting;
              if (window.scrollY <= 0) {
                showHeader();
                return;
              }
              updateHeaderVisibility();
            });
          }, { threshold: 0 });

          footerObserver.observe(siteFooter);
        }

        window.addEventListener(
          'scroll',
          () => {
            // Guard: hide logic only when scrollY > 0
            if (window.scrollY <= 0) {
              showHeader();
              headerVisibilityTicking = false;
              return;
            }
            requestHeaderVisibilityUpdate();
          },
          { passive: true }
        );

        window.addEventListener('load', () => {
          if (window.scrollY <= 0) {
            showHeader();
          } else {
            updateHeaderVisibility();
          }
        });

        requestAnimationFrame(() => {
          if (window.scrollY <= 0) {
            showHeader();
          }
        });
      }

      if (document.fonts) {
        document.fonts.ready.then(() => {
          updateSiteHeaderHeight();
          requestServiceCardHeightSync();
        });
      }

      // Match half-card heights to the wedding card
      const weddingWrap = document.getElementById('service-card-wedding-wrap');
      const firstVisitWrap = document.getElementById('service-card-first-wrap');
      const halfWraps = document.querySelectorAll('[data-service-card-half]');
      let serviceCardTicking = false;

      function syncServiceCardHeights() {
        if (!weddingWrap) return;

        halfWraps.forEach((wrap) => {
          wrap.style.minHeight = '';
        });
        if (firstVisitWrap) {
          firstVisitWrap.style.minHeight = '';
        }

        if (window.innerWidth < 768) {
          serviceCardTicking = false;
          return;
        }

        const weddingHeight = weddingWrap.offsetHeight;
        const gap = 24;

        halfWraps.forEach((wrap) => {
          if (wrap !== weddingWrap) {
            wrap.style.minHeight = `${weddingHeight}px`;
          }
        });

        if (firstVisitWrap) {
          firstVisitWrap.style.minHeight = `${weddingHeight * 2 + gap}px`;
        }

        serviceCardTicking = false;
      }

      function requestServiceCardHeightSync() {
        if (!serviceCardTicking) {
          serviceCardTicking = true;
          requestAnimationFrame(syncServiceCardHeights);
        }
      }

      window.addEventListener('load', requestServiceCardHeightSync);
      window.addEventListener('resize', requestServiceCardHeightSync);
      requestServiceCardHeightSync();

      // Scroll-driven hero: pin + fade + ken-burns zoom (GSAP ScrollTrigger)
      (function initScrollHero() {
        const hero = document.getElementById('top-image-section');
        if (!hero || typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
          return;
        }

        gsap.registerPlugin(ScrollTrigger);

        const slides = gsap.utils.toArray('.scroll-hero-slide', hero);
        const captions = gsap.utils.toArray('.scroll-hero-caption', hero);
        const images = slides.map((slide) => slide.querySelector('.scroll-hero-image')).filter(Boolean);
        if (slides.length < 2 || images.length !== slides.length) {
          return;
        }

        gsap.set(slides, { opacity: (i) => (i === 0 ? 1 : 0) });
        gsap.set(captions, { opacity: (i) => (i === 0 ? 1 : 0) });
        gsap.set(images, {
          scale: 1,
          transformOrigin: '50% 50%',
          force3D: true,
        });

        const getHeaderOffset = () => (siteHeader ? siteHeader.offsetHeight : 0);
        const fadeDur = 0.9;
        const holdDur = 0.7;
        const lastIndex = slides.length - 1;
        // hold → fade → hold → … → hold (final)
        const transitionAt = (i) => holdDur + i * (fadeDur + holdDur);
        const totalDur = (lastIndex + 1) * holdDur + lastIndex * fadeDur;

        const tl = gsap.timeline({
          scrollTrigger: {
            trigger: hero,
            start: () => `top ${getHeaderOffset()}px`,
            end: '+=2600',
            pin: true,
            scrub: 0.5,
            anticipatePin: 1,
            invalidateOnRefresh: true,
            onUpdate: requestHeaderThemeUpdate,
          },
        });

        // Crossfade after each dwell so photos/copy can be read, then switch crisply
        for (let i = 0; i < lastIndex; i += 1) {
          const at = transitionAt(i);
          tl.to(slides[i], { opacity: 0, duration: fadeDur, ease: 'none' }, at);
          tl.to(slides[i + 1], { opacity: 1, duration: fadeDur, ease: 'none' }, at);
          if (captions[i] && captions[i + 1]) {
            tl.to(captions[i], { opacity: 0, duration: fadeDur, ease: 'none' }, at);
            tl.to(captions[i + 1], { opacity: 1, duration: fadeDur, ease: 'none' }, at);
          }
        }

        // Keep timeline length explicit so the final hold is part of scrub progress
        tl.addLabel('endHold', totalDur);

        images.forEach((img, i) => {
          const zoomStart = i === 0 ? 0 : transitionAt(i - 1);
          const zoomEnd = i === lastIndex ? totalDur : transitionAt(i) + fadeDur;
          const zoomDuration = Math.max(fadeDur, zoomEnd - zoomStart);

          tl.fromTo(
            img,
            { scale: 1 },
            { scale: 1.1, duration: zoomDuration, ease: 'none', force3D: true },
            zoomStart
          );
        });

        window.addEventListener('load', () => {
          ScrollTrigger.refresh();
        });
        window.addEventListener('resize', () => {
          ScrollTrigger.refresh();
        });
      })();

      // Mouse follow micro-interaction for hero headline
      const heroTitle = document.getElementById('hero-headline');
      if (heroTitle) {
        window.addEventListener('mousemove', (e) => {
          const x = (window.innerWidth / 2 - e.pageX) / 100;
          const y = (window.innerHeight / 2 - e.pageY) / 100;
          heroTitle.style.transform = `translate(${x}px, ${y}px)`;
        });
      }

      // Smart back button: return to actual referrer with dynamic label
      const backButton = document.getElementById('back-button');
      const backButtonLabel = document.getElementById('back-button-label');
      if (backButton && backButtonLabel) {
        const fallbackHref = 'news.html';
        const fallbackLabel = 'ご案内一覧に戻る';
        const pageLabelMap = {
          'news.html': 'ご案内一覧',
          'community.html': '地域とのつながり',
          'about.html': '教会案内',
          'worship.html': '礼拝・集会のご案内'
        };

        backButton.setAttribute('href', fallbackHref);
        backButtonLabel.textContent = fallbackLabel;

        const deriveLabelFromPath = (fileName) => {
          if (!fileName) return '';
          return fileName
            .replace(/\.html?$/i, '')
            .replace(/[-_]+/g, ' ')
            .trim();
        };

        const normalizeTitle = (titleText) => (
          titleText
            .replace(/\s*\|\s*.*$/, '')
            .trim()
        );

        const setBackLabel = (label) => {
          if (!label) return;
          backButtonLabel.textContent = `${label}へ戻る`;
        };

        const applyBackTarget = (targetUrl) => {
          if (!targetUrl) return;
          backButton.setAttribute('href', targetUrl.href);

          const pageFileName = decodeURIComponent(targetUrl.pathname.split('/').pop() || '');
          const mappedLabel = pageLabelMap[pageFileName];

          if (mappedLabel) {
            setBackLabel(mappedLabel);
            return;
          }

          (async () => {
            try {
              const response = await fetch(targetUrl.href, { credentials: 'same-origin' });
              if (response.ok) {
                const html = await response.text();
                const titleMatch = html.match(/<title[^>]*>([^<]+)<\/title>/i);
                const fetchedTitle = titleMatch ? normalizeTitle(titleMatch[1]) : '';
                if (fetchedTitle) {
                  setBackLabel(fetchedTitle);
                  return;
                }
              }
            } catch (error) {
              // Fallback below
            }

            const derivedLabel = deriveLabelFromPath(pageFileName);
            if (derivedLabel) {
              setBackLabel(derivedLabel);
            }
          })();
        };

        let appliedFromQuery = false;

        // Priority 1: explicit origin query (?from=community.html)
        try {
          const currentUrl = new URL(window.location.href);
          const fromParam = currentUrl.searchParams.get('from');
          if (fromParam) {
            const targetFromParam = new URL(fromParam, currentUrl.href);
            const sameOrigin = targetFromParam.origin === currentUrl.origin;
            const bothFileProtocol = targetFromParam.protocol === 'file:' && currentUrl.protocol === 'file:';
            if ((sameOrigin || bothFileProtocol) && targetFromParam.pathname !== currentUrl.pathname) {
              applyBackTarget(targetFromParam);
              appliedFromQuery = true;
            }
          }
        } catch (error) {
          // Continue with referrer fallback.
        }

        // Priority 2: document.referrer
        const rawReferrer = document.referrer;
        if (!appliedFromQuery && rawReferrer) {
          try {
            const referrerUrl = new URL(rawReferrer);
            const currentUrl = new URL(window.location.href);
            const sameOrigin = referrerUrl.origin === currentUrl.origin;
            const bothFileProtocol = referrerUrl.protocol === 'file:' && currentUrl.protocol === 'file:';
            const isInternal = sameOrigin || bothFileProtocol;
            const isSamePage = referrerUrl.pathname === currentUrl.pathname;

            if (isInternal && !isSamePage) {
              applyBackTarget(referrerUrl);
            }
          } catch (error) {
            // Keep fallback when referrer parsing fails.
          }
        }
      }

      // Gallery filter
      const galleryFilterButtons = document.querySelectorAll('.gallery-filter-btn');
      const galleryItems = document.querySelectorAll('.gallery-page-item[data-category]');
      const galleryCaptions = document.querySelectorAll('.gallery-page-caption[data-categories]');

      function applyGalleryFilter(filter) {
        galleryFilterButtons.forEach((btn) => {
          btn.classList.toggle('is-active', btn.dataset.filter === filter);
        });

        galleryItems.forEach((item) => {
          const category = item.dataset.category;
          const visible = filter === 'all' || category === filter;
          item.classList.toggle('is-filtered-out', !visible);
        });

        galleryCaptions.forEach((caption) => {
          const categories = caption.dataset.categories.split(',');
          const visible = filter === 'all' || categories.includes(filter);
          caption.classList.toggle('is-filtered-out', !visible);
        });
      }

      galleryFilterButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
          applyGalleryFilter(btn.dataset.filter);
        });
      });

      // Gallery lightbox
      const galleryLightbox = document.getElementById('gallery-lightbox');
      const galleryLightboxImg = document.getElementById('gallery-lightbox-img');
      const galleryLightboxCaption = document.getElementById('gallery-lightbox-caption');
      const galleryLightboxClose = document.getElementById('gallery-lightbox-close');
      let galleryLightboxTrigger = null;

      function openGalleryLightbox(item) {
        if (!galleryLightbox || !galleryLightboxImg || !galleryLightboxCaption) return;

        const img = item.querySelector('img');
        if (!img) return;

        galleryLightboxTrigger = item;
        galleryLightboxImg.src = img.src;
        galleryLightboxImg.alt = img.alt;
        galleryLightboxCaption.textContent = item.dataset.caption || img.alt;

        galleryLightbox.hidden = false;
        requestAnimationFrame(() => {
          galleryLightbox.classList.add('is-open');
        });
        document.body.classList.add('gallery-lightbox-open');
        galleryLightboxClose?.focus();
      }

      function closeGalleryLightbox() {
        if (!galleryLightbox) return;

        galleryLightbox.classList.remove('is-open');
        document.body.classList.remove('gallery-lightbox-open');

        const onEnd = (event) => {
          if (event.target !== galleryLightbox || event.propertyName !== 'opacity') return;
          galleryLightbox.removeEventListener('transitionend', onEnd);
          galleryLightbox.hidden = true;
          galleryLightboxImg?.removeAttribute('src');
          galleryLightboxTrigger?.focus();
          galleryLightboxTrigger = null;
        };

        galleryLightbox.addEventListener('transitionend', onEnd);
      }

      galleryItems.forEach((item) => {
        item.addEventListener('click', () => openGalleryLightbox(item));
        item.addEventListener('keydown', (event) => {
          if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            openGalleryLightbox(item);
          }
        });
      });

      galleryLightboxClose?.addEventListener('click', closeGalleryLightbox);

      galleryLightbox?.addEventListener('click', (event) => {
        if (event.target === galleryLightbox) {
          closeGalleryLightbox();
        }
      });

      document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && galleryLightbox?.classList.contains('is-open')) {
          closeGalleryLightbox();
        }
      });

      // Footer Site Map accordion
      const footerSitemap = document.querySelector('.footer-sitemap');
      const footerSitemapToggle = document.getElementById('footer-sitemap-toggle');
      const footerSitemapPanel = document.getElementById('footer-sitemap-panel');
      const footerDesktopMq = window.matchMedia('(min-width: 768px)');
      let footerSitemapOpen = false;

      function setFooterSitemapOpen(open, { syncHidden = true } = {}) {
        if (!footerSitemap || !footerSitemapToggle || !footerSitemapPanel) return;

        footerSitemapOpen = open;
        footerSitemap.classList.toggle('is-open', open);
        footerSitemapToggle.setAttribute('aria-expanded', open ? 'true' : 'false');

        if (!syncHidden) return;

        if (open) {
          footerSitemapPanel.hidden = false;
          return;
        }

        const onEnd = (event) => {
          if (event.target !== footerSitemapPanel) return;
          if (event.propertyName !== 'max-height' && event.propertyName !== 'opacity') return;
          footerSitemapPanel.removeEventListener('transitionend', onEnd);
          if (!footerSitemapOpen) {
            footerSitemapPanel.hidden = true;
          }
        };
        footerSitemapPanel.addEventListener('transitionend', onEnd);
      }

      function syncFooterSitemapToViewport() {
        if (!footerSitemap) return;
        if (footerDesktopMq.matches) {
          footerSitemap.classList.add('footer-sitemap--desktop-open');
          setFooterSitemapOpen(true, { syncHidden: true });
          return;
        }
        footerSitemap.classList.remove('footer-sitemap--desktop-open');
        setFooterSitemapOpen(false, { syncHidden: true });
        footerSitemapPanel.hidden = true;
      }

      footerSitemapToggle?.addEventListener('click', () => {
        const nextOpen = !footerSitemapOpen;
        if (nextOpen && footerSitemapPanel) {
          footerSitemapPanel.hidden = false;
          // Force reflow so the open transition runs after un-hiding.
          void footerSitemapPanel.offsetHeight;
        }
        setFooterSitemapOpen(nextOpen);
      });

      syncFooterSitemapToViewport();
      if (typeof footerDesktopMq.addEventListener === 'function') {
        footerDesktopMq.addEventListener('change', syncFooterSitemapToViewport);
      } else if (typeof footerDesktopMq.addListener === 'function') {
        footerDesktopMq.addListener(syncFooterSitemapToViewport);
      }

      // NEWS page: footer hash links (#news-info / #news-report) → tab + filtered posts
      (function initNewsHashTabs() {
        const tabsNav = document.querySelector('[data-news-tabs]');
        const newsPage = document.querySelector('.news-page-section');
        if (!tabsNav || !newsPage) return;

        function tabFromHash(hash) {
          if (hash === '#news-info') return 'news';
          if (hash === '#news-report') return 'report';
          return null;
        }

        function currentInfoParam() {
          return new URL(window.location.href).searchParams.get('info') || '';
        }

        function setActiveTabAria(tab) {
          tabsNav.querySelectorAll('[data-info-tab]').forEach((link) => {
            const isActive = link.getAttribute('data-info-tab') === tab;
            link.classList.toggle('border-primary', isActive);
            link.classList.toggle('border-transparent', !isActive);
            if (isActive) {
              link.setAttribute('aria-current', 'page');
            } else {
              link.removeAttribute('aria-current');
            }
          });
        }

        function urlForTab(tab) {
          const link = tabsNav.querySelector(`[data-info-tab="${tab}"]`);
          if (!link) return null;
          return new URL(link.href, window.location.origin);
        }

        function applyHashTab({ replace = true } = {}) {
          const tab = tabFromHash(window.location.hash);
          if (!tab) {
            // No special hash: keep server-rendered tab (?info= or すべて).
            const info = currentInfoParam();
            setActiveTabAria(info === 'news' || info === 'report' ? info : 'all');
            return;
          }

          setActiveTabAria(tab);

          const expectedInfo = tab;
          const currentInfo = currentInfoParam();
          if (currentInfo === expectedInfo) {
            return;
          }

          const target = urlForTab(tab);
          if (!target) return;

          // Ensure hash is present for bookmarking / footer custom links.
          target.hash = tab === 'news' ? 'news-info' : 'news-report';
          const next = target.pathname + target.search + target.hash;
          if (replace) {
            window.location.replace(next);
          } else {
            window.location.assign(next);
          }
        }

        document.addEventListener('DOMContentLoaded', () => {
          applyHashTab({ replace: true });
        });

        // In case this script runs after DOMContentLoaded.
        if (document.readyState !== 'loading') {
          applyHashTab({ replace: true });
        }

        window.addEventListener('hashchange', () => {
          applyHashTab({ replace: true });
        });
      })();
})();
