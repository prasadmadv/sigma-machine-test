import AllCampaigns from './components/AllCampaigns.vue';
import AllReports from './components/AllReports.vue';

export const routes = [
	{
		name: 'home',
		path: '/',
		component: AllCampaigns,
	},
	{
		name: 'reports',
		path: '/reports',
		component: AllReports,
	}
];