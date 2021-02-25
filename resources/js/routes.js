import AllCampaigns from './components/AllCampaigns.vue';
import AddCampaign from './components/AddCampaign.vue';
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
	},
	{
		name: 'add-campaign',
		path: '/add',
		component: AddCampaign,
	}
];