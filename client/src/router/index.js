import { createRouter, createWebHashHistory } from 'vue-router';

const Home = () => import('@/views/Home.vue');


const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
  },

];

const router = createRouter({
  routes,
  history: createWebHashHistory(),
});

export default router;
