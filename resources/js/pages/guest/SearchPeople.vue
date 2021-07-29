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
      <h3 class="text-uppercase text-center mt-5 mb-4" v-if="isShow">
        <b>Daftar Orang Bermasalah</b>
      </h3>
      <div class="row mt-3" v-if="isShow">
        <div v-if="isLoading">
          <Spinner />
        </div>
        <div v-else>
          <div v-if="data.length > 0">
            <div
              class="col-12 col-md-6 col-lg-4"
              v-for="item in data"
              :key="item.id"
            >
              <SearchPeopleCard :data="item" />
            </div>
          </div>
          <div v-else>
            <h5 class="text-center text-uppercase">
              Tidak ada data yang cocok
            </h5>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<style>
section {
  margin-top: 5rem;
}
body {
  background-color: #ebebeb;
}
</style>
<script>
import Navbar from "@/components/guest/Navbar.vue";
import SearchPeopleCard from "@/components/guest/SearchPeopleCard.vue";
import Spinner from "@/components/guest/Spinner.vue";
import { inject, ref, reactive } from "vue";
import axios from "axios";

export default {
  components: { Navbar, SearchPeopleCard, Spinner },
  setup: () => {
    const form = reactive({
      search: "",
    });
    const isShow = ref(false);
    const isLoading = ref(false);
    const data = ref([]);
    const baseUrl = inject("base_url");
    const handleSubmit = async () => {
      try {
        isLoading.value = true;
        const store = await axios.post(`${baseUrl}/store-search`, {
          search: form.search,
        });
        const dataStore = store.data;
        data.value = dataStore;
        isShow.value = true;
        isLoading.value = false;
      } catch (err) {
        console.error(err);
      }
    };
    return {
      form,
      data,
      handleSubmit,
      isLoading,
      isShow,
    };
  },
};
</script>
