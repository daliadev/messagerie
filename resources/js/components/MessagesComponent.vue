<template>
		<div class="card">
			<div class="card-header">{{ user }}</div>
			<div class="card-body conversations">
				<message :message="mess" v-for="(mess, i) in messages" :key="i" :user="user"></message>		
			</div>
		</div>
</template>


<script>
import Message from './MessageComponent'
import {mapGetters} from 'vuex'

export default {
	components: { Message },
	computed: {
		...mapGetters(['user']),
		messages: function () {
			return this.$store.getters.messages(this.$route.params.id)
		}
	},
	mounted () {
		this.loadMessages()
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