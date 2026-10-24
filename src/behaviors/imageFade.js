/** Fade each image in once, after it loads and enters the viewport. */
export function observeImageFade(root) {
  if (!root || typeof IntersectionObserver !== 'function' ||
      typeof MutationObserver !== 'function' || typeof Element.prototype.animate !== 'function') {
    return () => {};
  }

  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  const pending = new Map();
  const revealed = new WeakSet();

  function release(image) {
    const state = pending.get(image);
    if (!state) return;

    observer.unobserve(image);
    image.removeEventListener('load', state.onLoad);
    image.removeEventListener('error', state.onError);
    state.animation.onfinish = null;
    state.animation.cancel();
    pending.delete(image);
    revealed.add(image);
  }

  function reveal(image) {
    const state = pending.get(image);
    if (!state || state.playing || !state.inView || !image.complete) return;
    if (!image.naturalWidth || reducedMotion.matches) {
      release(image);
      return;
    }

    state.playing = true;
    observer.unobserve(image);
    state.animation.onfinish = () => release(image);
    state.animation.play();
  }

  const observer = new IntersectionObserver(entries => {
    for (const entry of entries) {
      const state = pending.get(entry.target);
      if (!state) continue;
      state.inView = entry.isIntersecting && entry.intersectionRect.width > 0 &&
        entry.intersectionRect.height > 0;
      reveal(entry.target);
    }
  }, { threshold: 0.01 });

  function track(image) {
    if (image.closest('[data-no-image-fade]') || reducedMotion.matches) {
      release(image);
      revealed.add(image);
      return;
    }
    if (revealed.has(image) || pending.has(image)) return;
    if (!image.currentSrc && !image.getAttribute('src') && !image.getAttribute('srcset')) return;
    if (image.complete && !image.naturalWidth) return;

    // A paused animation hides only tracked images; no global CSS hides content.
    // Cancel it after the fade so existing opacity/hover animations take over again.
    const animation = image.animate([
      { opacity: 0 },
      { opacity: getComputedStyle(image).opacity },
    ], { duration: 500, easing: 'ease-out', fill: 'both' });
    animation.pause();
    animation.currentTime = 0;

    const state = {
      animation,
      inView: false,
      playing: false,
      onLoad: () => reveal(image),
      onError: () => release(image),
    };
    pending.set(image, state);
    image.addEventListener('load', state.onLoad);
    image.addEventListener('error', state.onError);
    observer.observe(image);
  }

  function scan(node) {
    if (node.nodeType !== Node.ELEMENT_NODE) return;
    if (node.matches('img')) track(node);
    node.querySelectorAll('img').forEach(track);
  }

  const mutations = new MutationObserver(records => {
    let removed = false;
    for (const record of records) {
      if (record.type === 'attributes') scan(record.target);
      else {
        record.addedNodes.forEach(scan);
        removed ||= record.removedNodes.length > 0;
      }
    }
    if (removed) {
      for (const image of pending.keys()) {
        if (!root.contains(image)) release(image);
      }
    }
  });

  function showAll() {
    for (const image of pending.keys()) release(image);
  }

  function onMotionChange() {
    if (reducedMotion.matches) showAll();
  }

  mutations.observe(root, {
    childList: true,
    subtree: true,
    attributes: true,
    attributeFilter: ['src', 'srcset', 'data-no-image-fade'],
  });
  reducedMotion.addEventListener('change', onMotionChange);
  window.addEventListener('beforeprint', showAll);
  scan(root);

  return () => {
    mutations.disconnect();
    showAll();
    observer.disconnect();
    reducedMotion.removeEventListener('change', onMotionChange);
    window.removeEventListener('beforeprint', showAll);
  };
}
