<template>
	<div>
		<h3>Add Campaign</h3>

			<form @submit.prevent="addCampaign">
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
		methods: {
			addCampaign(){
				this.axios.post('/api/campaigns/add',this.campaign)
				.then(response=>{
					this.$router.push({name:'home'});
					console.log(response.data);
				})
				.catch(error=> console.log(error));
			}
		}
	};
</script>