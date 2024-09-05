import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/Pages/Home.vue';
import SignUp from '@/Pages/SignUp.vue';
import Login from '@/Pages/Login.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/sign-up',
      name: 'signup',
      component: SignUp
    }
  ]
})

export default router
