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
          <li class="nav-item">
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