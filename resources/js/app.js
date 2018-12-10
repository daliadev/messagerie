/*
fetch('/api/user', {
	credentials: 'same-origin',
	headers: {
    // 'Accept': 'application/json',
    'X-Requested-With': 'XMLHttpRequest',
    // 'Content-Type': 'application/json',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
  }
})
*/

import Vue from 'vue'
import Messagerie from './components/MessagerieComponent'
import Store from './store/store'


new Vue({
  el: '#messagerie',
  components: { Messagerie },
  store: Store
})
