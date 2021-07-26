<template>
  <layout>
    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h5>Detail Data Pengguna</h5>
              <Link
                class="btn btn-success"
                id="back"
                :href="`${$page.props.url}/user`"
              >
                <i class="bi bi-arrow-left-square"></i>
                Kembali
              </Link>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-center mb-4" v-if="row.foto">
              <img
                :src="`${$page.props.static}/public/storage/${row.foto}`"
                width="100"
                height="100"
                alt=""
              />
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th>Nama</th>
                    <td>:</td>
                    <td>{{ row.name }}</td>
                  </tr>
                  <tr>
                    <th>Username</th>
                    <td>:</td>
                    <td>{{ row.username }}</td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>:</td>
                    <td>{{ row.email }}</td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <td>:</td>
                    <td>{{ row.jenis_kelamin }}</td>
                  </tr>
                  <tr>
                    <th>No Telepon</th>
                    <td>:</td>
                    <td>{{ row.notelp }}</td>
                  </tr>
                  <tr>
                    <th>Role</th>
                    <td>:</td>
                    <td>{{ row.role }}</td>
                  </tr>
                  <tr>
                    <th>Status keanggotaan</th>
                    <td>:</td>
                    <td>{{ row.is_active === "1" ? "Aktif" : "Non-aktif" }}</td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td>{{ row.alamat }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Link,
  },
  props: {
    row: Object,
  },
};
</script>