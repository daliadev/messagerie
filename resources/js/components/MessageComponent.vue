<template>
	<div>
		<div class="row">
			<div :class="cls">
				<p>
					<strong>{{ name }}</strong><br>
					{{ message.content }}
				</p>
			</div>
		</div>
		<hr>
	</div>
</template>


<script>

export default {
	props: {
		user: Number,
		message: Object
	},
	computed: {
		isMe () {
			return this.message.from.id === this.user
		},
		cls () {
			let classes = ['col-md-10']
			if (this.message.from.id === this.user) {
				classes.push('offset-md-2', 'text-right')
			}
			return classes
		},
		name () {
			return this.isMe ? 'Moi' : this.message.from.name
		}
	}
}
	
</script>
