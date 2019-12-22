import headerEl from './HeaderComp.js'
import navEl from './navComp.js'
import footerEl from './FooterComp.js'
import offerEl from './OffersComp.js'
import dropdownEl from './DropdownComp.js'

import error from './ErrorComp.js'
import products from './ProductComp.js'

const app = new Vue({
  el: '#app',
  components: {
    products,
    error,
    'header-comp': headerEl,
    'nav-comp': navEl,
    'footer-comp': footerEl,
    'offers-comp': offerEl,
    'dropdown-comp': dropdownEl,
  },
  methods: {
    getJson(url) {
      return fetch(url)
        .then(result => result.json())
        .catch(error => {
          this.$refs.error.setError(error);
        })
    },
    postJson(url, data) {
      return fetch(url, {
        method: 'POST',
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
      })
        .then(result => result.json())
        .catch(error => {
          this.$refs.error.setError(error);
        })
    },
    putJson(url, data) {
      return fetch(url, {
        method: 'PUT',
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
      })
        .then(result => result.json())
        .catch(error => {
          this.$refs.error.setError(error);
        })
    },
    deleteJson(url) {
      return fetch(url, {
        method: 'DELETE',
        headers: {
          "Content-Type": "application/json"
        },
      })
        .then(result => result.json())
        .catch(error => {
          this.$refs.error.setError(error);
        })
    }
  }
});