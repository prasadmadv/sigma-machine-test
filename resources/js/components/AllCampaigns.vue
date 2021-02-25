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
					<tr v-for="campaign in campaigns.data" :key="campaign.id">
						<td>{{campaign.id}}</td>
						<td>{{campaign.name}}</td>
						<td>{{campaign.created_at}}</td>
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