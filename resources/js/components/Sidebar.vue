<template>
  <div
    class="offcanvas offcanvas-start sub-bg-primary"
    tabindex="-1"
    id="offcanvasExample"
    aria-labelledby="offcanvasLabel"
  >
    <button
      type="button"
      class="btn-close text-reset"
      data-bs-dismiss="offcanvas"
      ref="offCanvasClose"
      aria-label="Close"
      style="display: none"
    ></button>
    <div class="offcanvas-body">
      <div class="brand__mobile">
        <Link class="" :href="`${$page.props.url}/blacklist`">
          <img
            :src="`${$page.props.static}/assets/images/logo.png`"
            class="img-fluid"
            alt="logo"
            width="50"
            height="50"
          />
        </Link>
      </div>
      <nav class="navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item">
            <Link
              :href="`${$page.props.url}/blacklist`"
              class="nav-link px-2 text-white l"
              :class="{ active: isActive('blacklist') }"
            >
              <i class="bi bi-person-lines-fill"></i>
              Blacklist
            </Link>
          </li>
          <li class="nav-item" v-if="$page.props.user.role === 'admin'">
            <Link
              :href="`${$page.props.url}/user`"
              class="nav-link px-2 l text-white"
              :class="{ active: isActive('user') }"
            >
              <i class="bi bi-person"></i>
              Daftar Pengguna
            </Link>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>
<style>
.brand__mobile {
  text-align: center;
  margin: 1rem 0 1rem 0;
}
@media (min-width: 768px) {
  .brand__mobile {
    display: none;
  }
}
</style>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import { onMounted, ref } from "vue";
export default {
  components: {
    Link,
  },

  setup: () => {
    const offCanvasClose = ref();
    const currentUrl = window.location.href;
    const uriSegment = currentUrl.split("/");
    const isActive = (url) => uriSegment[4] === url;
    onMounted(() => {
      const a = document.querySelectorAll(".l");
      a.forEach((item) => {
        item.addEventListener("click", () => offCanvasClose.value.click());
      });
    });
    return {
      offCanvasClose,
      isActive,
    };
  },
};
</script>