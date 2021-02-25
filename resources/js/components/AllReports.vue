<template>
	<div>
		<h3>Report Summary</h3>

			<table class="table tabl-bordered">
				<thead>
					<tr>
						<td>ID</td>
						<td>Clicks</td>
						<td>Username</td>
						<td>User Email</td>
						<td>Campaign Name</td>
						<td>Source URL</td>
						<td>Destination URL</td>
						<td>User Agent</td>
						<td>IP</td>
						<td>Created</td>
					</tr>
				</thead>
				<tbody>
					<tr v-for="campaign in campaigns" :key="campaign.id">
						<td>{{campaign.id}}</td>
						<td>{{campaign.clicks}}</td>
						<td>{{campaign.username}}</td>
						<td>{{campaign.user_email}}</td>
						<td>{{campaign.campaign_name}}</td>
						<td>{{campaign.source_url}}</td>
						<td>{{campaign.destination_url}}</td>
						<td>{{campaign.user_agent}}</td>
						<td>{{campaign.ip}}</td>
						<td>{{campaign.created_at}}</td>
					</tr>
				</tbody>
			</table>

	</div>

</template>
<script >
	export default {
		data(){
			return {
				campaigns: []
			}
		},
		created(){
			axios.get('/api/reports')
			.then(response => {
				this.campaigns = response.data;
				console.log(response.data);
			})
		}
	};
</script>