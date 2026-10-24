import { createWebHistory, createRouter } from 'vue-router';

import HomePage from './components/pages/HomeView.vue';
import SIGsView from './components/pages/SIGsView.vue';
import EventsView from './components/pages/EventsView.vue';
import GitHubMCPEventView from './components/pages/GitHubMCPEventView.vue';
import AboutView from './components/pages/AboutView.vue';
import ConstitutionView from './components/pages/ConstitutionView.vue';
import NotFoundView from './components/pages/NotFoundView.vue';

const routes = [
    { path: '/', component: HomePage },
    { path: '/sigs', component: SIGsView },
    { path: '/events', component: EventsView },
    { path: '/events/github-mcp-2025', component: GitHubMCPEventView },
    { path: '/constitution', component: ConstitutionView },
    { path: '/about', component: AboutView },
    { path: '/:pathMatch(.*)*', name: 'not-found', component: NotFoundView },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
