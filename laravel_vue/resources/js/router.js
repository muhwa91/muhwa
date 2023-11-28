import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../components/LoginComponent.vue';
import BoardComponent from '../components/BoardComponent.vue';
// 라우트 경로
const routes = [
	{
		path: '/',
		redirect: '/login', 
	},
	{
		path: '/login',
		component: LoginComponent,
	},
	{
		path: '/board',
		component: BoardComponent,
	}
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;