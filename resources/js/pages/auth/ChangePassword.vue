<template>
  <layout title="Ubah Password">
    <div
      class="row justify-content-center align-content-center"
      style="min-height: 80vh"
    >
      <div class="col-12 col-md-6">
        <div class="card shadow-sm">
          <div class="card-header card-outline-primary">
            <div class="d-flex">
              <h5>Form ubah password</h5>
            </div>
          </div>
          <form @submit.prevent="handleSubmit">
            <div class="card-body">
              <div class="row g-3">
                <div class="col-md-12">
                  <label for="old_password">Password Lama</label>
                  <input
                    id="old_password"
                    type="password"
                    class="form-control"
                    v-model="form.old_password"
                    :class="{ 'is-invalid': form.errors.old_password }"
                  />
                  <div v-if="form.errors.old_password" class="invalid-feedback">
                    {{ form.errors.old_password }}
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="new_password">Password Baru</label>
                  <input
                    id="new_password"
                    type="password"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.new_password }"
                  />
                  <div v-if="form.errors.new_password" class="invalid-feedback">
                    {{ form.errors.new_password }}
                  </div>
                </div>
                <div class="col-md-12">
                  <label>Konfirmasi Password</label>
                  <input
                    id="password_confirmation"
                    type="password"
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
              </div>
            </div>
            <div class="card-footer">
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
import { inject } from "@vue/runtime-core";
import { onNotif } from "@/utils/helper";
export default {
  setup: () => {
    const baseUrl = inject("base_url");
    const form = useForm({
      old_password: "",
      new_password: "",
      password_confirmation: "",
    });
    const handleSubmit = () => {
      form.post(`${baseUrl}/profile/change-password/store`, {
        onError: () => {
          onNotif("!Gagal", "error", "Masukkan data dengan benar");
        },
        onSuccess: (page) => {
          onNotif("!Berhasil", "success", page.props.flash.message);
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