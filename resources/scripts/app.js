import domReady from '@roots/sage/client/dom-ready';
import 'flowbite';

/**
 * Application entrypoint
 */
domReady(async () => {
  
  // megamenu hover fix for missing flowbite feature
  function show(el) {
    setTimeout(() => {
      el.classList.remove('hidden');
    }, 300);
  }
  function hide(el) {
    setTimeout(() => {
      if (!el.matches(':hover')) {
        el.classList.add('hidden');
      }
    }, 300)
  }
  const menu_items = document.querySelectorAll('[data-dropdown-trigger="hover"][data-collapse-toggle]');
  menu_items.forEach(item => {
    const target = document.getElementById(item.getAttribute('data-collapse-toggle'))
    if(target) {
      item.addEventListener('mouseenter', () => {
        show(target)
      });
      item.addEventListener('click', () => {
        show(target)
      });
      target.addEventListener('mouseenter', () => {
        el.classList.remove('hidden');
      });
      item.addEventListener('mouseleave', () => {
        hide(target)
      });
      target.addEventListener('mouseleave', () => {
        hide(target)
      });
    }

  })

});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
