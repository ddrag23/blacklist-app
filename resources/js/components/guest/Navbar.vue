<template>
  <nav class="navbar navbar-expand-lg navbar-dark gradient fixed-top">
    <div class="container">
      <Link class="navbar-brand text-uppercase" :href="`${$page.props.url}`">
        <img
          :src="`${$page.props.static}/assets/images/logo.png`"
          class="img-fluid"
          alt="logo"
          width="50"
          height="50"
        />
      </Link>
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
          <Link
            class="nav-link text-white text-uppercase"
            aria-current="page"
            :href="`${$page.props.url}/search-people`"
            style="font-size: 15px"
            ><b>Portal Pencarian</b></Link
          >
          <Link
            class="btn btn-primary text-white btn-round"
            :href="`${$page.props.url}/register`"
          >
            <i class="bi bi-box-arrow-right"></i>

            Daftar</Link
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