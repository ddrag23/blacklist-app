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
          <form @submit.prevent="handleSubmit">
            <div class="card-body">
              <div class="row g-3">
                <input type="hidden" v-model="form.id" />
                <div class="col-12 col-md-6">
                  <label for="">Foto</label
                  ><input
                    type="file"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.foto }"
                  />
                  <div v-if="form.errors.foto" class="invalid-feedback">
                    {{ form.errors.foto }}
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label for="">Foto KTP</label
                  ><input
                    type="file"
                    class="form-control"
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
import Layout from "@/pages/Layout.vue";
import { Head, useForm, usePage, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import Swal from "sweetalert2";

export default {
  props: {
    title: String,
    row: Object,
  },
  components: {
    Layout,
    Head,
    Link,
  },
  setup: (props) => {
    const page = usePage();

    const form = useForm({
      id: props.row !== undefined ? props.row.id : "",
      nama: props.row !== undefined ? props.row.nama : "",
      alamat: props.row !== undefined ? props.row.alamat : "",
      jenis_kelamin: props.row !== undefined ? props.row.jenis_kelamin : "",
      nohp: props.row !== undefined ? props.row.nohp : "",
      keterangan: props.row !== undefined ? props.row.keterangan : "",
    });
    const handleSubmit = () => {
      console.log(page.props.value.url);
      form.post(`${page.props.value.url}/blacklist/store`, {
        onSuccess: () => {
          Swal.fire({
            title: "Berhasil!!",
            text: page.props.value.flash.message,
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
              Inertia.visit(
                `${page.props.value.url}/blacklist/edit/${props.row.id}`,
                {
                  method: "get",
                }
              );
            }
          });
          form.clearErrors();
          form.reset();
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