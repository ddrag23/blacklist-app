<template>
  <Head :title="title" />
  <Navbar />
  <main class="my-5 pt-3">
    <div class="container-fluid">
      <slot></slot>
    </div>
  </main>
  <footer>
    <h5>Blacklist-app</h5>
  </footer>
</template>
<style scoped>
main {
  background-color: #e1e3e6;
  min-height: 100vh;
}
footer {
  width: 100%;
  position: fixed;
  bottom: 0;
  background-color: white;
  padding: 0.5rem;
}
@media (min-width: 992px) {
  footer {
    left: var(--offcanva-width);
    padding: 0.8rem;
  }
}
</style>
<script>
import Navbar from "@/components/Navbar.vue";
import { Head } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Navbar,
    Head,
  },
  props: {
    title: String,
  },
};
</script>