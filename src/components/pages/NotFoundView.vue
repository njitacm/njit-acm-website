<template>
  <main class="NotFoundView outer-container" aria-labelledby="not-found-title">
    <p class="error-code">404</p>
    <img
      class="spinning-logo"
      src="../../assets/logos/NJIT_ACM_LOGO_SPINNING.webp"
      alt="NJIT ACM logo"
    />
    <h1 id="not-found-title">Page not found</h1>
    <p class="message">
      This page may have moved, or the link might be incorrect.
      There’s still plenty to explore at NJIT ACM.
    </p>
    <nav class="actions" aria-label="Find another page">
      <RouterLink to="/" class="home-link router-link">Back to home</RouterLink>
      <RouterLink to="/sigs" class="explore-link router-link">Explore SIGs</RouterLink>
      <RouterLink to="/events" class="explore-link router-link">View events</RouterLink>
    </nav>
  </main>
</template>

<script>
import { RouterLink } from 'vue-router';

export default {
  name: 'NotFoundView',
  components: { RouterLink },
};
</script>

<style scoped>
.NotFoundView {
  padding: 64px 24px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 20px;
  text-align: center;
}

.error-code {
  color: var(--red);
  font-size: clamp(5rem, 18vw, 9rem);
  font-weight: bold;
  line-height: 1;
}

.spinning-logo {
  display: block;
  width: 180px;
  max-width: 100%;
  height: auto;
}

h1 {
  font-size: clamp(1.75rem, 5vw, 3rem);
  line-height: 1.25;
}

.message {
  max-width: 42ch;
}

.actions {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
  gap: 20px;
  margin-top: 12px;
}

.actions a {
  min-height: 50px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25em;
  font-weight: bold;
}

.home-link {
  padding: 12px 24px;
  border-radius: var(--border-radius);
  background-color: var(--red);
  color: var(--bkg-color);
  text-decoration: none;
}

.actions a:hover {
  opacity: var(--hover-opacity);
}

.actions a:focus-visible {
  outline: 3px solid var(--red);
  outline-offset: 5px;
  border-radius: var(--border-radius);
}

@media (max-width: 750px) {
  .NotFoundView {
    padding: 32px 20px;
    margin-bottom: 32px;
    gap: 16px;
  }

  .error-code {
    font-size: clamp(3.5rem, 16vw, 5rem);
  }

  .spinning-logo {
    width: clamp(96px, 28vw, 140px);
  }

  .message {
    font-size: 1rem;
    line-height: 1.5;
  }

  .actions {
    width: 100%;
    max-width: 360px;
    margin-top: 4px;
    gap: 8px 16px;
  }

  .actions a {
    min-height: 44px;
    font-size: 1rem;
  }

  .home-link {
    width: 100%;
  }
}
</style>
