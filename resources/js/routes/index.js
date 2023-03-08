// import router functions
import { createRouter, createWebHistory } from 'vue-router'


import login from '@/pages/login.vue'
import app from '@/pages/app.vue'

import users from '@/pages/users.vue'
import usersIndex from '@/pages/users/index.vue'
import usersShow from '@/pages/users/show.vue'
import projet from '@/pages/projet.vue'
import audit from '@/pages/audit.vue'


// setup routes

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/login',
            name: 'login',
            component: login,
        },
        {
            path: '/',
            name: 'projet',
            component: app,
            children: [
                {
                    path: '/',
                    name: 'dash',
                    component: projet,
                },
                {
                    path: '/audit',
                    name: 'audit',
                    component: audit,
                },
                {
                    path: '/users',
                    name: 'users',
                    component: users,
                    children: [
                        {
                            path: '',
                            name: 'usersIndex',
                            component: usersIndex,

                        },
                        {
                            path: ':id',
                            name: 'usersShow',
                            component: usersShow,

                        },
                    ]
                },
            ]
        },

    ]
})

router.beforeEach((to, from, next) => {
    if(to.query.s){
        localStorage.setItem('token',to.query.s)
        window.location.replace('/')
    }
    if (to.name !== 'login' && localStorage.getItem('token') == null) next({ name: 'login' })
    else if (to.name == 'login' && localStorage.getItem('token') != null) next({ name: 'projet' })
    else next()
})
export default router
