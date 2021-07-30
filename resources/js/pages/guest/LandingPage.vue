<template>
  <Head>
    <title>Landing Page</title>
    <meta name="description" content="Blacklist app" />
  </Head>
  <Navbar />
  <div class="main__content gradient">
    <div class="container mt-custom">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
          <h2 class="text-white text-center text-md-start">
            <b>Blacklist App</b>
          </h2>
          <p class="text-white text-center text-md-start">
            Merupakan aplikasi pencatatan dan pencarian orang-orang yang
            bermasalah seperti membuat kecurangan yang merugikan suatu
            perusahaan atau toko-toko tertentu
          </p>
          <div class="d-flex justify-content-center justify-content-md-start">
            <Link
              class="btn btn-success btn-round me-2"
              :href="`${$page.props.url}/search-people`"
            >
              <i class="bi bi-search"></i>
              Cari
            </Link>
            <Link
              class="btn btn-primary text-white btn-round"
              :href="`${$page.props.url}/register`"
            >
              <i class="bi bi-box-arrow-right"></i>

              Daftar</Link
            >
          </div>
        </div>
        <div class="col-md-6 p-3">
          <img
            :src="`${$page.props.static}/assets/images/vector-img.svg`"
            class="img-fluid"
            alt=""
            width="500"
            height="400"
          />
        </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
      <path
        fill="#fff"
        fill-opacity="1"
        d="M0,128L48,117.3C96,107,192,85,288,80C384,75,480,85,576,112C672,139,768,181,864,181.3C960,181,1056,139,1152,122.7C1248,107,1344,117,1392,122.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
      ></path>
    </svg>
  </div>
</template>
<style >
.mt-custom {
  margin-top: 4.6rem;
}
.btn-round {
  border-radius: 20px;
}
@media (min-width: 768px) {
  .mt-custom {
    margin-top: 3rem;
  }
}
</style>
<script>
import Navbar from "@/components/guest/Navbar.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Navbar,
    Link,
  },
};
</script>