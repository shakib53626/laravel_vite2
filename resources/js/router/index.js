import {createRouter, createWebHistory} from 'vue-router';
import Add from '../crud/Addnew.vue';
import list from '../crud/list.vue';
import Edit from '../crud/EditData.vue';

const routes= [
    { path: '/add-new', name:'Add', component:Add},
    { path: '/', name:'list', component:list},
    { path: '/student/edit/:id', name:'Edit', component:Edit},
  ];



const router = createRouter({
    history: createWebHistory(),
    routes,
  })
export default router;