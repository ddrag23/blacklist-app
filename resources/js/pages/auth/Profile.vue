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
              <li class="list-group-item"></li>
            </ul>
            <div class="d-flex justify-content-center mt-2">
              <button
                class="btn btn-primary"
                @click.prevent="handleEditProfile"
              >
                <i class="bi bi-pencil-square"></i>
                Edit Profile
              </button>
            </div>
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
                <div class="col-12">
                  <label for="foto">Foto Profile</label>
                  <input
                    type="file"
                    class="form-control"
                    @input="form.foto = $event.target.files[0]"
                    :readonly="!edited"
                  />
                  <progress
                    v-if="form.progress"
                    :value="form.progress.percentage"
                    max="100"
                  >
                    {{ form.progress.percentage }}%
                  </progress>
                  <div v-if="form.errors.foto" class="invalid-feedback">
                    {{ form.errors.foto }}
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label for="name">Nama</label>
                  <input
                    type="text"
                    id="name"
                    class="form-control"
                    v-model="form.name"
                    :class="{ 'is-invalid': form.errors.name }"
                    :readonly="!edited"
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
                    :readonly="!edited"
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
                    :readonly="!edited"
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
                    :disabled="!edited"
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
                    :readonly="!edited"
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
                    :readonly="!edited"
                  ></textarea>
                  <div v-if="form.errors.alamat" class="invalid-feedback">
                    {{ form.errors.alamat }}
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer" v-if="edited">
              <div class="d-flex justify-content-end">
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
import { Inertia } from "@inertiajs/inertia";
import { onNotif } from "@/utils/helper";
import { inject, ref } from "vue";
export default {
  props: {
    user: Object,
  },
  setup: (props) => {
    const baseUrl = inject("base_url");
    const form = useForm({
      foto: props.user.foto,
      name: props.user.name,
      alamat: props.user.alamat,
      jenis_kelamin: props.user.jenis_kelamin,
      notelp: props.user.notelp,
      username: props.user.username,
      email: props.user.email,
    });
    const edited = ref(false);
    const handleSubmit = () => {
      form.post(`${baseUrl}/profile/store`, {
        onSuccess: (page) => {
          edited.value = !edited.value;
          onNotif("Berhasil!", "success", page.props.flash.message);
          form.clearErrors();
          form.reset();
        },
        onFinish: () => {
          Inertia.get(`${baseUrl}/profile`);
        },
      });
    };
    const handleEditProfile = () => {
      edited.value = !edited.value;
    };
    return {
      handleSubmit,
      handleEditProfile,
      edited,
      form,
    };
  },
};
</script>