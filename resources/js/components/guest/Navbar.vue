<template>
  <nav class="navbar navbar-expand-lg navbar-dark gradient fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Blacklist App</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a
            class="nav-link text-white text-uppercase"
            aria-current="page"
            href="#"
            ><b>Search</b></a
          >
          <Link
            class="btn btn-primary text-white btn-round"
            :href="`${$page.props.url}/register`"
          >
            <i class="bi bi-box-arrow-right"></i>

            Register</Link
          >
        </div>
      </div>
    </div>
  </nav>
</template>
<style>
.btn-round {
  border-radius: 20px;
}
.gradient {
  background: rgb(2, 0, 36);
  background: linear-gradient(
    90deg,
    rgba(2, 0, 36, 1) 0%,
    rgba(0, 37, 255, 1) 0%,
    rgba(58, 31, 176, 1) 100%
  );
}
</style>
<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Link,
  },
};
</script>