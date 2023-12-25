import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AdminView from '../views/Admin/AdminView.vue'
import VendorRegister from '../views/Vendor/RegisterView.vue'
import VendorLogin from '../views/Vendor/LoginView.vue'
import VendorHome from '../views/Vendor/VendorHome.vue'
import ProfileView from '../views/Vendor/ProfileView.vue'
import ProductsHome from '../views/Product/ProductView.vue'
import Sample from '../views/Sample.vue'


const routes = [
  {
    path: '/',
    name: 'home',
    component: VendorLogin
  },
  {
    path: '/Admin/Home',
    name: 'Admin',
    component: AdminView
  },
  {
    path: '/Vendor/Register',
    name: 'Register',
    component: VendorRegister
  },
  {
    path: '/Vendor/Login',
    name: 'Login',
    component: VendorLogin
  },
  {
    path: '/Vendor/Home',
    name: 'Home',
    component: VendorHome
  },
  {
    path: '/Vendor/Profile',
    name: 'Profile',
    component: ProfileView
  },
  {
    path: '/Products/Home',
    name: 'Sample',
    component: ProductsHome
  },
  {
    path: '/Sample',
    name: 'Sample',
    component: Sample
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
