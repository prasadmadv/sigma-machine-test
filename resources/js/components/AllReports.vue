<template>
	<div>
		<h3>Report Summary</h3>

			<br/>
			<input type="text" class="form-control" placeholder="Search anything" v-model="search">
			<br/>
			<br/>
			<select v-model="perPage" placeholder="Per Page">
			  <option>5</option>
			  <option>10</option>
			  <option>20</option>
			  <option>50</option>
			  <option>100</option>
			</select>
			<span>Shwoing {{ perPage }} records per page</span>
			<br/>
			<br/>

			<export-excel
			class="btn btn-primary btn-round"
		    :fetch   = "downloadReport"
		    worksheet = "Report"
		    name    = "Report.xls"
		    :before-generate = "startDownload"
      		:before-finish   = "finishDownload">
	     	Download Excel
			</export-excel>

			<export-excel
			class="btn btn-primary btn-round"
		    :fetch   = "downloadReport"
		    type  = "csv"
		    worksheet = "Report"
		    name    = "Report.xls"
		    :before-generate = "startDownload"
      		:before-finish   = "finishDownload">
	     	Download CSV
			</export-excel>
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
						<!-- <td>Source URL</td>
						<td>Destination URL</td>
						<td>User Agent</td>
						<td>IP</td>
						<td>Created</td> -->
					</tr>
				</thead>
				<tbody>
					<tr v-for="(campaign,index) in campaigns.data" :key="campaign.id">
						<td>{{(campaigns.current_page*perPage)-perPage + index+1}}</td>
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
    			perPage: 5,
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
		  },
		  perPage(after, before) {
		    this.getResults();
		  }
		},
		methods: {
			//get pagination results
			getResults(page = 1){
				console.log(this.search);
				console.log(this.perPage);

				axios.get(`/api/reports`,{
					params:{
						page: page,
						search: this.search,
						per_page: this.perPage,
					}
				})
				.then(response => {
                    this.campaigns =  response.data;
					//console.log(response.data);
                });

			},
			async downloadReport(){
		      const response = await axios.get(`/api/download-report`);
		      console.log(response);
		      return response.data;
		    },
		    startDownload(){
		        alert('Downloading Report...');
		    },
		    finishDownload(){
		        alert('Download Ready!');
		    }
		}
	};
</script>