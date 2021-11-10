import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../components/Login'
import About from '../views/About'
import Home from '../views/Home'

import Category from '../views/Category/Category'
import CreateCategory from '../views/Category/Create'
import EditCategory from '../views/Category/EditCategory'

import Person from '../views/Person/Person'
import Create from '../views/Person/Create'
import editPerson from '../views/Person/EditPerson'
import Guard from '../services/middleware'

Vue.use(VueRouter)

const routes = [{
        path: '/',
        name: 'Login',
        component: Login
    },
    {
        path: '/about',
        name: 'About',
        component: About,
        beforeEnter: Guard.auth
    },
    {
        path: '/home',
        name: 'Home',
        component: Home,
        beforeEnter: Guard.auth
    },
    {
        path: '/categories',
        name: 'Category',
        component: Category,
        beforeEnter: Guard.auth
    },
    {
        path: '/categories/create',
        name: 'CreateCategory',
        component: CreateCategory,
        beforeEnter: Guard.auth
    },
    {
        path: '/editCategory/:id',
        name: 'EditCategory',
        component: EditCategory,
        beforeEnter: Guard.auth
    },
    {
        path: '/persons',
        name: 'Person',
        component: Person,
        beforeEnter: Guard.auth
    },
    {
        path: '/persons/create',
        name: 'Create',
        component: Create,
        beforeEnter: Guard.auth
    },
    {
        path: '/editPerson/:id',
        name: 'EditPerson',
        component: editPerson,
        beforeEnter: Guard.auth
    }
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router