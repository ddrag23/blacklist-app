<template>
  <layout>
    <Head title="Blacklist" />
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
            <GridTable :data="data" ref="table" :columns="columns" />
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>
<script>
import Layout from "@/pages/Layout.vue";
import { ref, onMounted, computed } from "vue";
import { Link, usePage, Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import Swal from "sweetalert2";
import { h, html } from "gridjs";
import GridTable from "@/components/GridTable.vue";
export default {
  components: {
    Layout,
    GridTable,
    Head,
    Link,
  },
  props: {
    blacklist: Array,
  },
  setup: (props) => {
    const page = usePage();
    const table = ref();
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
            // addBtn(
            //   "button",
            //   "btn btn-warning me-1",
            //   html('<i class="bi bi-eye"></i>'),
            //   handleDetail
            // ),
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
    const handleEdit = (id) =>
      Inertia.visit(`${page.props.value.url}/blacklist/edit/${id}`, {
        method: "get",
      });
    const handleDelete = (id) => {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          Inertia.delete(`${page.props.value.url}/blacklist/delete/${id}`, {
            onSuccess: (page) => {
              Swal.fire("Saved!", page.props.flash.message, "success");
              document.getElementById("wrapper").innerHTML = "";
              table.value.loadTable();
            },
          });
        }
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