<template>
	<div>
		<h3>All Campaigns</h3>

			<table class="table tabl-bordered">
				<thead>
					<tr>
						<td>ID</td>
						<td>Name</td>
						<td>Created</td>
					</tr>
				</thead>
				<tbody>
					<tr v-for="campaign in campaigns" :key="campaign.id">
						<td>{{campaign.id}}</td>
						<td>{{campaign.name}}</td>
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
			axios.get('/api/campaigns')
			.then(response => {
				this.campaigns = response.data;
				console.log(response.data);
			})
		}
	};
</script>