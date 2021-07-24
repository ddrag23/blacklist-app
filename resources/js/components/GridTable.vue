<template>
  <div class="wrapper" id="wrapper" ref="wraptable"></div>
</template>
<script>
import { ref, onMounted } from "vue";
import { Grid } from "gridjs";

export default {
  props: {
    data: Array,
    columns: Array,
  },
  setup: (props) => {
    const wraptable = ref();
    const loadTable = (el) => {
      new Grid({
        resizable: true,
        search: true,
        pagination: true,
        columns: props.columns,
        data: props.data,
      })
        .render(el)
        .forceRender();
    };
    onMounted(() => loadTable(wraptable.value));
    return {
      wraptable,
    };
  },
};
</script>