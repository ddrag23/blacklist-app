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
      <a class="navbar-brand me-auto">Blacklist App</a>
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
            :src="`${$page.props.static}assets/images/person1.png`"
            class="mx-2"
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
            <a class="dropdown-item" href="#">
              <i class="bi bi-shield-lock-fill"></i>
              Change Password</a
            >
          </li>
          <li>
            <Link class="dropdown-item" href="logout">
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
<script>
import Sidebar from "@/components/Sidebar.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Sidebar,
    Link,
  },
};
</script>