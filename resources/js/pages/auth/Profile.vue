<template>
  <layout>
    <Head title="Profile" />
    <h3><b>Profile</b></h3>
    <div class="row g-3">
      <div class="col-12 col-md-4">
        <div class="card">
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <b>Nama</b>
                <span class="float-end">{{ user.name }}</span>
              </li>
              <li class="list-group-item">
                <b>Username</b>
                <span class="float-end">{{ user.username }}</span>
              </li>
              <li class="list-group-item">
                <b>Email</b>
                <span class="float-end">{{ user.email }}</span>
              </li>
              <li class="list-group-item">
                <b>No telepon</b>
                <span class="float-end">{{ user.notelp }}</span>
              </li>
              <li class="list-group-item">
                <b>Jenis Kelamin</b>
                <span class="float-end">{{ user.jenis_kelamin }}</span>
              </li>
              <li class="list-group-item">
                <b>Alamat</b>
                <span class="float-end">{{ user.alamat }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-8">
        <div class="card">
          <div class="card-header">
            <h5>Form Profile</h5>
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
              <div class="d-flex">
                <button class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { onNotif } from "@/utils/helper";
export default {
  props: {
    user: Object,
  },
  setup: (props) => {
    const form = useForm({
      name: props.user.name,
      alamat: props.user.alamat,
      jenis_kelamin: props.user.jenis_kelamin,
      notelp: props.user.notelp,
      username: props.user.username,
      email: props.user.email,
    });
    const handleSubmit = () => {
      form.post(`${baseUrl}/user/store`, {
        onSuccess: (page) => {
          onNotif("Berhasil!", "success", page.props.flash.message);
          form.clearErrors();
          form.reset();
        },
      });
    };
    return {
      handleSubmit,
      form,
    };
  },
};
</script>