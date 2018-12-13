<template>
		<div class="card">
			<div class="card-header">{{ user }}</div>
			<div class="card-body conversations">
				<message :message="mess" v-for="mess in messages"></message>		
			</div>
		</div>
</template>


<script>
import Message from './MessageComponent'

export default {
	components: { Message },
	props: {
		user: Number
	},
	computed: {
		messages: function () {
			return this.$store.getters.messages(this.$route.params.id)
		}
	},
	mounted () {
		this.loadMessages()
		// this.$store.dispatch('loadMessages', this.$route.params.id)
	},
	watch: {
		'$route.params.id': function () {
			this.loadMessages()
		}
	},
	methods: {
		loadMessages: function () {
			this.$store.dispatch('loadMessages', this.$route.params.id)
		}
	}
}
	
</script>