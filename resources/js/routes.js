import AllCampaigns from './components/AllCampaigns.vue';
import AddCampaign from './components/AddCampaign.vue';
import EditCampaign from './components/EditCampaign.vue';
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
	},
	{
		name: 'edit-campaign',
		path: '/edit/:id',
		component: EditCampaign,
	}
];