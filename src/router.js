import { createWebHistory, createRouter } from 'vue-router'

import HomePage from './components/pages/HomeView.vue'
import SIGsView from './components/pages/SIGsView.vue'
import EventsView from './components/pages/EventsView.vue'
import GitHubMCPEventView from './components/pages/GitHubMCPEventView.vue'
import TutoringView from './components/pages/TutoringView.vue'
import AboutView from './components/pages/AboutView.vue'
import ConstitutionView from './components/ConstitutionView.vue'

const routes = [
    { path: '/', component: HomePage },
    { path: '/sigs', component: SIGsView },
    { path: '/events', component: EventsView },
    { path: '/events/github-mcp-2025', component: GitHubMCPEventView},
    {
        path: '/tutoring',
        // beforeEnter: () => {
        //     if (window.innerWidth < 1100) {
        //         window.open('https://computing.njit.edu/tutoring');
        //         return { path: '/' }
        //     }
        // },
        component: TutoringView
    },
    { path: '/constitution', component: ConstitutionView },

    { path: '/about', component: AboutView },
    { path: '/:pathMatch(.*)*', name: 'NotFound', component: HomePage },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
