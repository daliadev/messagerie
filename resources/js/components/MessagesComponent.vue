<template>

		
		<div class="card">
			<div class="card-header">{{ user }}</div>
			<div class="card-body conversations">
				<div class="row">
					<div class="col-md-10">
						<p>Mon message
						</p>
					</div>
				</div>
				<hr>

			</div>
		</div>

</template>


<script>
// import {mapGetters} from 'vuex'

export default {
	props: {
		user: Number
	},
	computed: {
		messages: function () {
			this.$store.getters.messages(this.$route.params.id)
		}
	},
	mounted () {
		this.$store.dispatch('loadMessages', this.$route.params.id)
	}
}
	
</script>