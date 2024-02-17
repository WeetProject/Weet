import { createWebHistory, createRouter } from 'vue-router';

const routes = [
	{
		path: '/',
		redirect: '/main',
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;