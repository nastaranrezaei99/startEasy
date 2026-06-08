import { createRouter, createWebHistory } from 'vue-router'

import UniView from '../views/uniview.vue'
import EventView from '../views/eventview.vue'
import ErsteSchrittView from '../views/ersteschrittview.vue'

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
    },
    {
      path: '/erste-schritte',
      component: ErsteSchrittView
    }
  ]
})

export default router