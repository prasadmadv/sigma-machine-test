<template>
	<div class="container">
		<div class="text-center"><span>MACHINE TEST</span></div>
		<br/>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse">
				<div class="navbar-nav">
					<router-link to="/" class="nav-item nav-link">Home</router-link>
					<router-link to="/reports" class="nav-item nav-link">Reports</router-link>
				</div>
			</div>
		</nav>


		<router-view></router-view>
	</div>

</template>
<script>
	export default {}
</script>