import { createRouter, createWebHistory } from 'vue-router'

import UniView from '../views/uniview.vue'
import EventView from '../views/eventview.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      component: UniView
    },
    {
      path: '/events',
      component: EventView
    }
  ]
})

export default router