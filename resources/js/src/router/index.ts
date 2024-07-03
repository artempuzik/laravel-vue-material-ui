import { createRouter, createWebHistory } from "vue-router"

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "",
            name: "files",
            components: () => import('../views/FileTable.vue')
        }
    ]
})

export default router
