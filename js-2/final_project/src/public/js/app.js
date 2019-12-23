import headerEl from './HeaderComp'
import navEl from './navComp'
import footerEl from './FooterComp'
import offerEl from './OffersComp'
import dropdownEl from './DropdownComp'

import error from './ErrorComp'
import products from './ProductComp'
import shoppingCart from './ShoppingCartComp'

const app = new Vue({
  el: '#app',
  components: {
    products,
    error,
    'shopping-comp': shoppingCart,
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
    },
  }
});

export default app