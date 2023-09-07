import {createRouter, createWebHistory} from 'vue-router';
import Add from '../crud/Addnew.vue';
import list from '../crud/list.vue';

const routes= [
    { path: '/add-new', name:'Add', component:Add},
    { path: '/', name:'list', component:list},
  ];



const router = createRouter({
    history: createWebHistory(),
    routes,
  })
export default router;