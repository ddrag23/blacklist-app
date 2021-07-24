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
            src="assets/images/person1.png"
            class="mx-2"
            width="40"
            height="40"
            alt=""
          />
          Aku
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="dropdownMenuLink"
        >
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <Sidebar />
</template>
<script>
import Sidebar from "@/components/Sidebar.vue";
export default {
  components: {
    Sidebar,
  },
};
</script>