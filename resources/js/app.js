import { createApp, h, computed } from 'vue'
import { createInertiaApp, Head } from '@inertiajs/inertia-vue3'
import Layout from '@/pages/Layout.vue'
import GridTable from '@/components/GridTable.vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap'
import 'gridjs/dist/theme/mermaid.css'
import { InertiaProgress } from '@inertiajs/progress'

InertiaProgress.init()
createInertiaApp({
  title: (title) => `${title} - Blacklist-App`,
  resolve: (name) => require(`./pages/${name}`),
  setup({ el, app, props, plugin }) {
    const main = createApp({
      render: () => h(app, props),
    }).use(plugin)
    const flashMessage = computed(() => props.initialPage.props.flash.message)
    main.component('layout', Layout)
    main.component('GridTable', GridTable)
    main.component('Head', Head)
    main.provide('base_url', props.initialPage.props.url)
    // console.log(props.initialPage.props.url)
    main.mount(el)
  },
})
