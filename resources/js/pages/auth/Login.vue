<template>
  <Head title="Login" />
  <div class="wrap row justify-content-center align-items-center">
    <div class="col-12 col-md-4">
      <div class="card shadow-sm">
        <form action="" @submit.prevent="handleSubmit">
          <div class="card-body">
            <div class="row g-3">
              <div class="col-12">
                <div class="d-flex justify-content-center">
                  <img
                    :src="`${$page.props.static}/assets/images/logo.png`"
                    alt="logo"
                    class="img-fluid"
                    width="80"
                    height="80"
                  />
                </div>
                <h4 class="text-center">Login</h4>
                <div
                  class="alert alert-danger"
                  v-if="$page.props.flash.message"
                  role="alert"
                >
                  {{ $page.props.flash.message }}
                </div>
              </div>
              <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <input
                  class="form-control"
                  id="username"
                  type="text"
                  :class="{ 'is-invalid': errors.username }"
                  v-model="saveData.username"
                />
                <div v-if="errors.username" class="invalid-feedback">
                  {{ errors.username }}
                </div>
              </div>
              <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input
                  class="form-control"
                  id="password"
                  type="password"
                  :class="{ 'is-invalid': errors.password }"
                  v-model="saveData.password"
                />
                <div v-if="errors.password" class="invalid-feedback">
                  {{ errors.password }}
                </div>
              </div>
            </div>
            <div class="d-grid flex-column mt-3">
              <button class="btn btn-primary btn-block" type="submit">
                Login
              </button>
              <div class="text-center">
                Belum punya akun ?
                <span>
                  <Link :href="`${$page.props.url}/register`">Buat akun!</Link>
                </span>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<style>
.wrap {
  min-height: 100vh;
  background-color: #e1e3e6;
}
</style>
<script>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Head,
    Link,
  },
  props: {
    errors: Object,
  },
  setup() {
    const saveData = reactive({
      username: "",
      password: "",
    });
    const handleSubmit = () => {
      Inertia.post("login/authentication", {
        username: saveData.username,
        password: saveData.password,
      });
    };
    return {
      saveData,
      handleSubmit,
    };
  },
};
</script>