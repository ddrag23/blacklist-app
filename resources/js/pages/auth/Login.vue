<template>
  <Head title="Login" />
  <div class="wrap row justify-content-center align-items-center">
    <div class="col-12 col-md-4">
      <div class="card shadow-sm">
        <form action="" @submit.prevent="handleSubmit">
          <div class="card-body">
            <div class="row g-3">
              <div class="col-12">
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
            <div class="d-grid mt-3">
              <button class="btn btn-primary btn-block" type="submit">
                Login
              </button>
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
  background-color: grey;
}
</style>
<script>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Head } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Head,
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