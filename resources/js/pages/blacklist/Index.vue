<template>
  <layout>
    <h3><b>Blacklist</b></h3>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h5>Data Blacklist</h5>
              <Link class="btn btn-primary" href="blacklist/create">
                <i class="bi bi-plus"></i>
                Tambah
              </Link>
            </div>
          </div>
          <div class="card-body">
            <GridTable :data="data" :columns="columns" />
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import Layout from "@/pages/Layout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { h, html } from "gridjs";
import { ref } from "@vue/reactivity";
import GridTable from "@/components/GridTable.vue";
export default {
  components: {
    Layout,
    GridTable,
    Link,
  },
  props: {
    blacklist: Array,
  },
  setup: (props) => {
    const columns = [
      { name: "id", hidden: true },
      "#",
      "Nama",
      "Jenis Kelamin",
      "No Telepon",
      {
        name: "Aksi",
        formatter: (_, row) => {
          const addBtn = (el, btnClass, childEl, fn) => {
            return {
              el: el,
              class: btnClass,
              child: childEl,
              event: (param) => fn(param),
            };
          };
          const elements = [
            addBtn(
              "button",
              "btn btn-primary me-1",
              html('<i class="bi bi-pencil-square"></i>'),
              handleEdit
            ),
            addBtn(
              "button",
              "btn btn-warning me-1",
              html('<i class="bi bi-eye"></i>'),
              handleDetail
            ),
            addBtn(
              "button",
              "btn btn-danger me-1",
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
    const data = props.blacklist.map((item, i) => [
      item.id,
      i + 1,
      item.nama,
      item.jenis_kelamin,
      item.nohp,
      null,
    ]);
    return {
      data,
      columns,
    };
  },
};
</script>