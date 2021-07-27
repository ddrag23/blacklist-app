<template>
  <layout>
    <Head title="Blacklist" />
    <h3><b>Blacklist</b></h3>
    <div class="row">
      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-header card-outline-primary">
            <div class="d-flex justify-content-between">
              <h5>Data Blacklist</h5>
              <Link class="btn btn-primary" href="blacklist/create">
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
    blacklist: Array,
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
      props.blacklist.map((item, i) => [
        item.id,
        i + 1,
        item.nama,
        item.jenis_kelamin,
        item.nohp,
        null,
      ])
    );
    const handleDetail = (id) =>
      Inertia.visit(`${baseUrl}/blacklist/detail/${id}`, {
        method: "get",
      });
    const handleEdit = (id) =>
      Inertia.visit(`${baseUrl}/blacklist/edit/${id}`, {
        method: "get",
      });

    const handleDelete = (id) => {
      onNotifWarning(() => {
        Inertia.delete(`${baseUrl}/blacklist/delete/${id}`, {
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