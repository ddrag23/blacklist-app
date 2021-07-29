<template>
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-center mb-3">
        <img
          :src="
            data.foto.length > 0
              ? `${$page.props.static}/public/storage/${data.foto}`
              : `${$page.props.static}/assets/images/person1.png`
          "
          class="img__circle img-fluid"
          width="150"
          height="150"
          alt=""
        />
      </div>
      <div class="table-responsive">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>Nama</th>
              <td>:</td>
              <td>{{ data.nama }}</td>
            </tr>
            <tr>
              <th>Jenis Kelamin</th>
              <td>:</td>
              <td>{{ data.jenis_kelamin }}</td>
            </tr>
            <tr>
              <th>No telepon</th>
              <td>:</td>
              <td>{{ data.nohp }}</td>
            </tr>
            <tr>
              <th>Keterangan</th>
              <td>:</td>
              <td>{{ data.keterangan }}</td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td>:</td>
              <td>{{ data.alamat }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    data: Object,
  },
};
</script>