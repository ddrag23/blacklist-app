<template>
  <nav
    class="
      navbar navbar-expand-lg navbar-dark
      my-bg-primary
      bd-bottom
      fixed-top
    "
  >
    <div class="container-fluid">
      <button
        class="navbar-toggler me-2"
        type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasExample"
        aria-controls="offcanvasExample"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <Link class="navbar-brand me-auto" :href="`${$page.props.url}/blacklist`">
        <img
          :src="`${$page.props.static}/assets/images/logo.png`"
          class="img-fluid brand__desktop"
          alt="logo"
          width="50"
          height="50"
        />
      </Link>
      <div class="dropwdown">
        <a
          href="#"
          role="button"
          class="profile__setting"
          id="dropdownMenuLink"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          <img
            :src="avatar"
            class="mx-2 img__circle img-fluid"
            width="40"
            height="40"
            alt=""
          />
          {{ $page.props.user.name }}
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="dropdownMenuLink"
        >
          <li>
            <Link class="dropdown-item" :href="`${$page.props.url}/profile`">
              <i class="bi bi-person-circle"></i> Profile</Link
            >
          </li>
          <li>
            <Link
              class="dropdown-item"
              :href="`${$page.props.url}/profile/change-password`"
            >
              <i class="bi bi-shield-lock-fill"></i>
              Change Password
            </Link>
          </li>
          <li>
            <Link class="dropdown-item" :href="`${$page.props.url}/logout`">
              <i class="bi bi-box-arrow-in-left"></i>
              Logout
            </Link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <Sidebar />
</template>
<style>
.navbar-brand {
  display: none;
}
@media (min-width: 768px) {
  .navbar-brand {
    display: block;
  }
}
</style>
<script>
import Sidebar from "@/components/Sidebar.vue";
import { Link, usePage } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Sidebar,
    Link,
  },
  setup: () => {
    const page = usePage();
    const fotoUser = page.props.value.user.foto;
    const avatar = fotoUser
      ? `${page.props.value.static}public/storage/${fotoUser}`
      : `${page.props.value.static}assets/images/person1.png`;
    return {
      avatar,
    };
  },
};
</script>