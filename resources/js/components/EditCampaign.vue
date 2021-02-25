<template>
	<div>
		<h3>Edit Campaign</h3>

			<form @submit.prevent="updateCampaign">
				<div class="form-group">
					<label>Name</label>
					<input type="text" v-model="campaign.name">
				</div>
				<button class="btn btn-primary" type="submit">Save</button>
			</form>

	</div>

</template>
<script >
	export default {
		data(){
			return {
				campaign: {}
			}
		},
		created(){
			this.axios.get(`/api/campaigns/edit/${this.$route.params.id}`)
				.then(response=>{
					this.campaign = response.data;
				});
		},
		methods: {
			updateCampaign(){
				this.axios.post(`/api/campaigns/update/${this.$route.params.id}`,this.campaign)
				.then(response=>{
					this.$router.push({name:'home'});
					console.log(response.data);
				})
				.catch(error=> console.log(error));
			}
		}
	};
</script>