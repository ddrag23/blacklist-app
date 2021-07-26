<template>
  <layout>
    <Head :title="title" />
    <h3><b>Buat Pengguna</b></h3>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h5>Form Pengguna</h5>
            <Link
              class="btn btn-success"
              id="back"
              :href="`${$page.props.url}/user`"
            >
              <i class="bi bi-arrow-left-square"></i>
              Kembali
            </Link>
          </div>
          <form @submit.prevent="handleSubmit" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row g-3">
                <input type="hidden" v-model="form.id" />
                <div class="col-12 col-md-6">
                  <label for="name">Nama</label>
                  <input
                    type="text"
                    id="name"
                    class="form-control"
                    v-model="form.name"
                    :class="{ 'is-invalid': form.errors.name }"
                  />
                  <div v-if="form.errors.name" class="invalid-feedback">
                    {{ form.errors.name }}
                  </div>
                </div>
                <div class="col-12 col-md-3">
                  <label for="">No Telepon</label>
                  <input
                    type="number"
                    class="form-control"
                    v-model="form.notelp"
                    :class="{ 'is-invalid': form.errors.notelp }"
                  />
                  <div v-if="form.errors.notelp" class="invalid-feedback">
                    {{ form.errors.notelp }}
                  </div>
                </div>
                <div class="col-12 col-md-3">
                  <label for="Jenis_kelamin">jenis Kelamin</label>
                  <select
                    class="form-control"
                    id="jenis_kelamin"
                    v-model="form.jenis_kelamin"
                    :class="{ 'is-invalid': form.errors.jenis_kelamin }"
                  >
                    <option value="" selected disabled>-Pilih-</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                  <div
                    v-if="form.errors.jenis_kelamin"
                    class="invalid-feedback"
                  >
                    {{ form.errors.jenis_kelamin }}
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label for="username">Username</label>
                  <input
                    type="text"
                    id="username"
                    class="form-control"
                    v-model="form.username"
                    :class="{ 'is-invalid': form.errors.username }"
                  />
                  <div v-if="form.errors.username" class="invalid-feedback">
                    {{ form.errors.username }}
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label for="email">Email</label>
                  <input
                    type="email"
                    id="email"
                    class="form-control"
                    v-model="form.email"
                    :class="{ 'is-invalid': form.errors.email }"
                  />
                  <div v-if="form.errors.email" class="invalid-feedback">
                    {{ form.errors.email }}
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label for="role">Role</label>
                  <select
                    class="form-control"
                    id="role"
                    v-model="form.role"
                    :class="{ 'is-invalid': form.errors.role }"
                  >
                    <option value="" selected disabled>-Pilih-</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                  </select>
                  <div v-if="form.errors.role" class="invalid-feedback">
                    {{ form.errors.role }}
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label for="is_active">Status Akun</label>
                  <select
                    class="form-control"
                    id="is_active"
                    v-model="form.is_active"
                    :class="{ 'is-invalid': form.errors.is_active }"
                  >
                    <option value="" selected disabled>-Pilih-</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                  <div v-if="form.errors.is_active" class="invalid-feedback">
                    {{ form.errors.is_active }}
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    v-model="form.password"
                    :class="{ 'is-invalid': form.errors.password }"
                  />
                  <div v-if="form.errors.password" class="invalid-feedback">
                    {{ form.errors.password }}
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label for="password_confirmation"
                    >Password Confirmation</label
                  >
                  <input
                    type="text"
                    id="password_confirmation"
                    class="form-control"
                    v-model="form.password_confirmation"
                    :class="{ 'is-invalid': form.errors.password_confirmation }"
                  />
                  <div
                    v-if="form.errors.password_confirmation"
                    class="invalid-feedback"
                  >
                    {{ form.errors.password_confirmation }}
                  </div>
                </div>
                <div class="col-12">
                  <label for="alamat">Alamat</label>
                  <textarea
                    id="alamat"
                    cols="3"
                    rows="2"
                    v-model="form.alamat"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.alamat }"
                  ></textarea>
                  <div v-if="form.errors.alamat" class="invalid-feedback">
                    {{ form.errors.alamat }}
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import { Head, useForm, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import Swal from "sweetalert2";
import { inject } from "vue";

export default {
  props: {
    title: String,
    row: Object,
  },
  components: {
    Head,
    Link,
  },
  setup: (props) => {
    const baseUrl = inject("base_url");
    const form = useForm({
      id: props.row !== undefined ? props.row.id : "",
      name: props.row !== undefined ? props.row.name : "",
      alamat: props.row !== undefined ? props.row.alamat : "",
      jenis_kelamin: props.row !== undefined ? props.row.jenis_kelamin : "",
      notelp: props.row !== undefined ? props.row.notelp : "",
      is_active: props.row !== undefined ? props.row.is_active : "",
      role: props.row !== undefined ? props.row.role : "",
      username: props.row !== undefined ? props.row.username : "",
      email: props.row !== undefined ? props.row.email : "",
      password: "",
      password_confirmation: "",
    });
    const handleSubmit = () => {
      form.post(`${baseUrl}/user/store`, {
        onSuccess: (page) => {
          form.clearErrors();
          form.reset();
          Swal.fire({
            title: "Berhasil!!",
            text: page.props.flash.message,
            icon: "success",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Kembali",
            cancelButtonText: "Lanjutkan input data",
          }).then((result) => {
            if (result.isConfirmed) {
              document.getElementById("back").click();
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              Inertia.visit(`${baseUrl}/user/edit/${props.row.id}`, {
                method: "get",
              });
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