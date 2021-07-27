<template>
  <layout>
    <Head title="Pengguna" />
    <h3><b>Daftar Pengguna</b></h3>
    <div class="row">
      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-header card-outline-primary">
            <div class="d-flex justify-content-between">
              <h5>Data Pengguna</h5>
              <Link class="btn btn-primary" href="user/create">
                <i class="bi bi-plus"></i>
                Tambah
              </Link>
            </div>
          </div>
          <div class="card-body">
            <GridTable :data="data" ref="table" :columns="columns" />
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import { ref, onMounted, computed, inject } from "vue";
import { addButton, onNotifWarning, onNotif } from "@/utils/helper.js";
import { Link, Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { h, html } from "gridjs";
export default {
  components: {
    Head,
    Link,
  },
  props: {
    users: Array,
  },
  setup: (props) => {
    const table = ref();
    const baseUrl = inject("base_url");
    const columns = [
      { name: "id", hidden: true },
      "#",
      "Nama",
      "Jenis Kelamin",
      "No Telepon",
      "Role",
      "Status Akun",
      {
        name: "Aksi",
        formatter: (_, row) => {
          const elements = [
            addButton(
              "button",
              "btn btn-primary mx-1 my-1",
              html('<i class="bi bi-pencil-square"></i>'),
              handleEdit
            ),
            addButton(
              "button",
              "btn btn-warning mx-1 my-1",
              html('<i class="bi bi-eye"></i>'),
              handleDetail
            ),
            addButton(
              "button",
              "btn btn-danger mx-1 my-1",
              html('<i class="bi bi-trash"></i>'),
              handleDelete
            ),
          ];
          return elements.map((item) =>
            h(
              item.el,
              {
                className: item.class,
                onClick: () => item.event(row.cells[0].data),
              },
              item.child
            )
          );
        },
      },
    ];
    const data = computed(() =>
      props.users.map((item, i) => [
        item.id,
        i + 1,
        item.name,
        item.jenis_kelamin,
        item.notelp,
        item.role,
        item.is_active === "1" ? "Aktif" : "Non-aktif",
        null,
      ])
    );
    const handleDetail = (id) =>
      Inertia.visit(`${baseUrl}/user/detail/${id}`, {
        method: "get",
      });
    const handleEdit = (id) =>
      Inertia.visit(`${baseUrl}/user/edit/${id}`, {
        method: "get",
      });

    const handleDelete = (id) => {
      onNotifWarning(() => {
        Inertia.delete(`${baseUrl}/user/delete/${id}`, {
          onSuccess: (page) => {
            onNotif("Saved!", "success", page.props.flash.message);
            document.getElementById("wrapper").innerHTML = "";
            table.value.loadTable();
          },
        });
      });
    };
    onMounted(() => table.value.loadTable());
    return {
      data,
      columns,
      table,
    };
  },
};
</script>