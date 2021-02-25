<template>
	<div>
		<h3>All Campaigns</h3>

			<router-link class="btn btn-primary" :to="{ name: 'add-campaign' }">Add Campaign</router-link>

			<table class="table tabl-bordered">
				<thead>
					<tr>
						<td>ID</td>
						<td>Name</td>
						<td>Created</td>
						<td>Actions</td>
					</tr>
				</thead>
				<tbody>
					<tr v-for="campaign in campaigns.data" :key="campaign.id">
						<td>{{campaign.id}}</td>
						<td>{{campaign.name}}</td>
						<td>{{campaign.created_at}}</td>
						<td>
							<div class="btn-group" role="group">
								<router-link :to="{name:'edit-campaign', params: {id:campaign.id} }"  class="btn btn-primary">Edit</router-link>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<pagination :data="campaigns" @pagination-change-page="getResults"></pagination>

	</div>

</template>
<script >
	export default {
		data(){
			return {
				campaigns: []
			}
		},
		mounted() {
			// Fetch initial results
			this.getResults();
		},
		methods: {
			//get pagination results
			getResults(page = 1){

				axios.get(`/api/campaigns?page=${page}`)
				.then(response => {
                    this.campaigns =  response.data;
					//console.log(response.data);
                });

			}
		}
	};
</script>