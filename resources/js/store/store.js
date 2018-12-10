import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)


const get = function (url) {
	fetch (url, {
		credentials: 'same-origin',
		headers: {
	    'X-Requested-With': 'XMLHttpRequest',
	    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
	  }
	})
}

export default new Vuex.Store({
	strict: true,
	state: {
		conversations: {}
	},
	getters: {

	},
	mutations: {

	},
	actions: {
		loadConversations: function (context) {
			get('/api/conversations')
		}
	}
})