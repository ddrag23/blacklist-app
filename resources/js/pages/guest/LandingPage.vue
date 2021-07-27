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
          <h2 class="text-white">Blacklist App</h2>
          <p class="text-white">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit sit
            ipsa provident quis, nesciunt vel natus dolorum eos aliquid,
            molestias incidunt inventore eaque veniam quisquam dolore illo quod
            aperiam nobis.
          </p>
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
.gradient {
  background: rgb(2, 0, 36);
  background: linear-gradient(
    90deg,
    rgba(2, 0, 36, 1) 0%,
    rgba(0, 37, 255, 1) 0%,
    rgba(58, 31, 176, 1) 100%
  );
}
.mt-custom {
  margin-top: 3rem;
}
/* .main__content {
  height: 100%;
} */
</style>
<script>
import Navbar from "@/components/guest/Navbar.vue";
export default {
  components: {
    Navbar,
  },
};
</script>