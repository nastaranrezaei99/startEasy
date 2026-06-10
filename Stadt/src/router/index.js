import { createRouter, createWebHistory } from 'vue-router'

import UniView from '../views/uniview.vue'
import EventView from '../views/eventview.vue'
import ErsteSchrittView from '../views/ersteschrittview.vue'
import MarketplaceView from '../views/marketplaceview.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),

  routes: [
    {path: '/',name: 'home',component: UniView},
    {path: '/events',name: 'events',component: EventView},
    {path: '/erste-schritte',name: 'erste-schritte',component: ErsteSchrittView},
    {path: '/marketplace',name: 'marketplace',component: MarketplaceView}
  ]
})

export default router