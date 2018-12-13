<template>
	<div>
		<div class="row">
			<div class="col-md-10">
				<p>
					<strong>{{ message.from.name }}</strong><br>
					{{ message.content }}
				</p>
			</div>
		</div>
		<hr>
	</div>
</template>


<script>
// import {mapGetters} from 'vuex'

export default {
	props: {
		message: Object
	}
}
	
</script>