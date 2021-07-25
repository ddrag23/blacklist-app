<template>
  <div class="wrapper" id="wrapper" ref="wraptable"></div>
</template>
<script>
import { ref } from "vue";
import { Grid } from "gridjs";

export default {
  props: {
    data: Array,
    columns: Array,
  },
  setup: (props) => {
    const wraptable = ref();
    const loadTable = () => {
      new Grid({
        style: {
          table: {
            width: "100%",
          },
        },
        resizable: true,
        search: true,
        pagination: true,
        columns: props.columns,
        data: props.data,
      })
        .render(wraptable.value)
        .forceRender();
    };
    return {
      wraptable,
      loadTable,
    };
  },
};
</script>