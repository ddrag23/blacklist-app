<template>
  <layout>
    <Head title="Create Blacklist" />
    <h3><b>Buat Blacklist</b></h3>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">form</div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-12 col-md-6">
                <label for="">Foto</label
                ><input type="file" class="form-control" />
              </div>
              <div class="col-12 col-md-6">
                <label for="">Foto KTP</label
                ><input type="file" class="form-control" />
              </div>
              <div class="col-12 col-md-6">
                <label for="">Nama</label
                ><input type="text" class="form-control" />
              </div>
              <div class="col-12 col-md-6">
                <label for="">No Telepon</label
                ><input type="number" class="form-control" />
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary float-end">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import Layout from "@/pages/Layout.vue";
import { Head } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Layout,
    Head,
  },
};
</script>