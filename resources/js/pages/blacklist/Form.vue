<template>
  <layout>
    <Head :title="title" />
    <h3><b>Buat Blacklist</b></h3>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h5>Form Blacklist</h5>
            <Link
              class="btn btn-success"
              id="back"
              :href="`${$page.props.url}/blacklist`"
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
                  <label for="">Foto</label
                  ><input
                    type="file"
                    class="form-control"
                    @input="form.foto = $event.target.files[0]"
                    :class="{ 'is-invalid': form.errors.foto }"
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
                  <label for="">Foto KTP</label
                  ><input
                    type="file"
                    class="form-control"
                    @input="form.foto_ktp = $event.target.files[0]"
                    :class="{ 'is-invalid': form.errors.foto_ktp }"
                  />
                  <div v-if="form.errors.foto_ktp" class="invalid-feedback">
                    {{ form.errors.foto_ktp }}
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label for="">Nama</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.nama"
                    :class="{ 'is-invalid': form.errors.nama }"
                  />
                  <div v-if="form.errors.nama" class="invalid-feedback">
                    {{ form.errors.nama }}
                  </div>
                </div>
                <div class="col-12 col-md-3">
                  <label for="">No Telepon</label>
                  <input
                    type="number"
                    class="form-control"
                    v-model="form.nohp"
                    :class="{ 'is-invalid': form.errors.nohp }"
                  />
                  <div v-if="form.errors.nohp" class="invalid-feedback">
                    {{ form.errors.nohp }}
                  </div>
                </div>
                <div class="col-12 col-md-3">
                  <label for="jenis_kelamin">jenis Kelamin</label>
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
                <div class="col-12 col-md-6">
                  <label for="keterangan">Keterangan</label>
                  <textarea
                    id="keterangan"
                    cols="5"
                    rows="2"
                    v-model="form.keterangan"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.keterangan }"
                  ></textarea>
                  <div v-if="form.errors.keterangan" class="invalid-feedback">
                    {{ form.errors.keterangan }}
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
      foto: "",
      foto_ktp: "",
      id: props.row !== undefined ? props.row.id : "",
      nama: props.row !== undefined ? props.row.nama : "",
      alamat: props.row !== undefined ? props.row.alamat : "",
      jenis_kelamin: props.row !== undefined ? props.row.jenis_kelamin : "",
      nohp: props.row !== undefined ? props.row.nohp : "",
      keterangan: props.row !== undefined ? props.row.keterangan : "",
    });
    const handleSubmit = () => {
      form.post(`${baseUrl}/blacklist/store`, {
        preserveScroll: true,
        onSuccess: (page) => {
          form.clearErrors();
          form.reset();
          Inertia.get(`${baseUrl}/blacklist/edit/${props.row.id}`);

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