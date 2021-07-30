<template>
  <Head :title="title" />
  <Navbar />
  <main class="pt-3 mt-custom">
    <div class="container-fluid">
      <slot></slot>
    </div>
  </main>
  <footer>
    <strong
      >@2020 - 2021 Blacklist-app
      <a href="http://skystudioscape.com/" class="text-muted"
        >SkyStudioScape.com</a
      >.</strong
    >
  </footer>
</template>
<style scoped>
.mt-custom {
  margin-top: 2.7rem;
}
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
@media (min-width: 768px) {
  .mt-custom {
    margin-top: 4rem;
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