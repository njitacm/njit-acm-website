<template>
  <header>
    <RouterLink to="/" class="router-link-left">ACM</RouterLink>
    <RouterLink to="/" class="router-link-center meme-title">
      Association for Creating Memes</RouterLink
    >
    <CollapsableNav>
      <RouterLink to="/sigs" class="router-link">SIGs</RouterLink>
      <RouterLink to="/events" class="router-link">Events</RouterLink>
      <RouterLink to="/tutoring" class="router-link">Tutoring</RouterLink>
      <RouterLink to="/about" class="router-link">About</RouterLink>
    </CollapsableNav>
  </header>
</template>

<script>
import CollapsableNav from "./CollapsableNav.vue";
export default {
  components: { CollapsableNav },
};
</script>

<style scoped>
header {
  margin: 0px 15px;
  display: flex;
  justify-content: space-between;
  border-bottom: red 4px solid;
  align-items: center;
}

.router-link-left {
  padding: 0 2px;
  font-size: 4.8rem;
  text-decoration: none;
  color: black;
  font-weight: 500;
}
.router-link-center {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  font-size: 3.6rem;
  text-decoration: none;
  color: black;
}
nav {
  display: flex;
  align-items: center;
  gap: 1.2rem;
  margin: 0.4rem 0.8rem;
}
.router-link {
  text-decoration: none;
  color: black;
  text-decoration: none;
  font-size: 2.4rem;
  flex: 1 1 0px;
  padding: 0.8rem;
  border: none;
  background-color: inherit;
  cursor: pointer;
}

@media (max-width: 1300px) {
  .meme-title {
    display: none;
  }
}
</style>