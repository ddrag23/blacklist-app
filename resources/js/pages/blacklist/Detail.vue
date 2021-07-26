<template>
  <layout>
    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h5>Detail Data Blacklist</h5>
              <Link
                class="btn btn-success"
                id="back"
                :href="`${$page.props.url}/blacklist`"
              >
                <i class="bi bi-arrow-left-square"></i>
                Kembali
              </Link>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-around mb-4">
              <img
                :src="`${$page.props.static}/public/storage/${row.foto}`"
                width="100"
                height="100"
                alt=""
              />
              <img
                :src="`${$page.props.static}/public/storage/${row.foto_ktp}`"
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
                    <td>{{ row.nama }}</td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <td>:</td>
                    <td>{{ row.jenis_kelamin }}</td>
                  </tr>
                  <tr>
                    <th>No Telepon</th>
                    <td>:</td>
                    <td>{{ row.nohp }}</td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td>{{ row.alamat }}</td>
                  </tr>
                  <tr>
                    <th>Keterangan</th>
                    <td>:</td>
                    <td>{{ row.keterangan }}</td>
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