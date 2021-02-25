<template>
	<div>
		<h3>Report Summary</h3>

			<br/>
			<input type="text" class="form-control" placeholder="Search anything" v-model="search">
			<br/>
			<br/>

			<table class="table">
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
					<tr v-for="(campaign,index) in campaigns.data" :key="campaign.id">
						<td>{{(campaigns.current_page*5)-5 + index+1}}</td>
						<td>{{campaign.clicks}}</td>
						<td>{{campaign.username}}</td>
						<td>{{campaign.user_email}}</td>
						<td>{{campaign.campaign_name}}</td>
						<!-- <td>{{campaign.source_url}}</td>
						<td>{{campaign.destination_url}}</td>
						<td>{{campaign.user_agent}}</td>
						<td>{{campaign.ip}}</td>
						<td>{{campaign.created_at}}</td> -->
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
    			search: '',
				campaigns: []
			}
		},
		mounted() {
			// Fetch initial results
			this.getResults();
		},
		watch: {
		  search(after, before) {
		    this.getResults();
		  }
		},
		methods: {
			//get pagination results
			getResults(page = 1){
			console.log(this.search);

				axios.get(`/api/reports?page=${page}&search=${this.search}`)
				.then(response => {
                    this.campaigns =  response.data;
					//console.log(response.data);
                });

			}
		}
	};
</script>