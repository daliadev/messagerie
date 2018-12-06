<template>
	<div class="row">
		<div class="col-md-3">
			<div class="list-group">
					<a class="list-group-item d-flex justify-content-between align-items-center">
						John Doe {{ user }}
						<span class="badge badge-pill badge-primary">3</span>
					</a>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: {
		user: Number
	}
}
</script>