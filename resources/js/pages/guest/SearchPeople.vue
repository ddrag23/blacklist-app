<template>
  <Head title="cari orang" />
  <Navbar />
  <section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5">
          <div class="card shadow" style="border-top: 1px solid blue">
            <div class="card-body">
              <form action="" @submit.prevent="handleSubmit">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.search"
                    placeholder="Cari Orang"
                  />
                  <button
                    class="btn btn-outline-primary"
                    type="submit"
                    id="button-addon2"
                  >
                    <i class="bi bi-search"></i>
                    Cari
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th>Nama</th>
                    <td>:</td>
                    <td>{{ nama }}</td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <td>:</td>
                    <td>{{ jenis_kelamin }}</td>
                  </tr>
                  <tr>
                    <th>No telepon</th>
                    <td>:</td>
                    <td>{{ notelp }}</td>
                  </tr>
                  <tr>
                    <th>Keterangan</th>
                    <td>:</td>
                    <td>{{ keterangan }}</td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td>{{ alamat }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<style scoped>
section {
  margin-top: 5rem;
}
</style>
<script>
import Navbar from "@/components/guest/Navbar.vue";
import { inject, reactive, toRefs } from "vue";
import axios from "axios";

export default {
  components: { Navbar },
  setup: () => {
    const form = reactive({
      search: "",
    });
    const data = reactive({
      nama: "",
      alamat: "",
      notelp: "",
      jenis_kelamin: "",
      keterangan: "",
    });
    const baseUrl = inject("base_url");
    const handleSubmit = async () => {
      try {
        const store = await axios.post(`${baseUrl}/store-search`, {
          search: form.search,
        });
        const dataStore = store.data;
        const notAllowed = ["created_at", "updated_at", "foto", "foto_ktp"];
        console.log(dataStore);
        for (const key in data) {
          if (!notAllowed.includes(key)) {
            data[key] = dataStore[key];
          }
        }
      } catch (err) {
        console.error(err);
      }
    };
    return {
      form,
      ...toRefs(data),
      handleSubmit,
    };
  },
};
</script>
