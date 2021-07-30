<template>
  <Head title="Register" />
  <div class="wrap row justify-content-center align-items-center">
    <div class="col-12 col-md-4 mx-2">
      <div class="card shadow-sm">
        <form action="" @submit.prevent="handleSubmit">
          <div class="card-body">
            <div class="row g-3">
              <div class="col-12">
                <h4 class="text-center">Daftar</h4>
              </div>
              <div class="col-12">
                <input
                  placeholder="Nama Lengkap"
                  class="form-control"
                  type="text"
                  :class="{ 'is-invalid': form.errors.name }"
                  v-model="form.name"
                />
                <div v-if="form.errors.name" class="invalid-feedback">
                  {{ form.errors.name }}
                </div>
              </div>
              <div class="col-12">
                <input
                  placeholder="Username"
                  class="form-control"
                  id="username"
                  type="text"
                  :class="{ 'is-invalid': form.errors.username }"
                  v-model="form.username"
                />
                <div v-if="form.errors.username" class="invalid-feedback">
                  {{ form.errors.username }}
                </div>
              </div>
              <div class="col-12">
                <input
                  placeholder="Email"
                  class="form-control"
                  id="email"
                  type="email"
                  :class="{ 'is-invalid': form.errors.email }"
                  v-model="form.email"
                />
                <div v-if="form.errors.email" class="invalid-feedback">
                  {{ form.errors.email }}
                </div>
              </div>
              <div class="col-12">
                <input
                  placeholder="No Telepon"
                  class="form-control"
                  id="notelp"
                  type="number"
                  :class="{ 'is-invalid': form.errors.notelp }"
                  v-model="form.notelp"
                />
                <div v-if="form.errors.notelp" class="invalid-feedback">
                  {{ form.errors.notelp }}
                </div>
              </div>
              <div class="col-12">
                <input
                  placeholder="Password"
                  class="form-control"
                  id="password"
                  type="password"
                  :class="{ 'is-invalid': form.errors.password }"
                  v-model="form.password"
                />
                <div v-if="form.errors.password" class="invalid-feedback">
                  {{ form.errors.password }}
                </div>
              </div>
              <div class="col-12">
                <input
                  placeholder="Password Confirmation"
                  class="form-control"
                  id="password_confirmation"
                  type="password"
                  :class="{ 'is-invalid': form.errors.password_confirmation }"
                  v-model="form.password_confirmation"
                />
                <div
                  v-if="form.errors.password_confirmation"
                  class="invalid-feedback"
                >
                  {{ form.errors.password_confirmation }}
                </div>
              </div>
              <div class="col-12">
                <textarea
                  placeholder="Alamat"
                  id="alamat"
                  cols="3"
                  rows="2"
                  class="form-control"
                  v-model="form.alamat"
                  :class="{ 'is-invalid': form.errors.alamat }"
                ></textarea>
                <div v-if="form.errors.alamat" class="invalid-feedback">
                  {{ form.errors.alamat }}
                </div>
              </div>
            </div>
            <div class="d-grid flex-column mt-3">
              <button class="btn btn-primary btn-block" type="submit">
                Daftar
              </button>
              <div class="text-center">
                Sudah punya akun ?
                <span>
                  <Link :href="`${$page.props.url}/login`">Login</Link>
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
import { Head, useForm, Link } from "@inertiajs/inertia-vue3";
import { inject } from "@vue/runtime-core";
import { Inertia } from "@inertiajs/inertia";
import Swal from "sweetalert2";

export default {
  components: {
    Head,
    Link,
  },

  setup() {
    const baseUrl = inject("base_url");
    const form = useForm({
      username: "",
      name: "",
      notelp: "",
      email: "",
      alamat: "",
      password: "",
      password_confirmation: "",
    });
    const handleSubmit = () => {
      form.post(`${baseUrl}/register/store`, {
        onError: () => onNotif("Gagal!", "error", "Masukkan data dengan benar"),
        onSuccess: (page) => {
          form.reset();
          form.clearErrors();
          Swal.fire({
            title: "Berhasil!!",
            text: page.props.flash.message,
            icon: "success",
            confirmButtonColor: "#198754",
            confirmButtonText: "Login",
          }).then((result) => {
            if (result.isConfirmed) {
              Inertia.get(`${page.props.url}/login`);
            }
          });
        },
      });
    };
    return {
      form,
      handleSubmit,
    };
  },
};
</script>