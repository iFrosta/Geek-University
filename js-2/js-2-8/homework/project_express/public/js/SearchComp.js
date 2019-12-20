Vue.component('search-el', {
  data() {
    return {
      search: '',
    }
  },
  template: `
      <form @submit.prevent="$parent.$refs.products.filter(search)" v-on:keydown="$parent.$refs.products.filter(search)" action="#" class="search-form">
        <input v-model="search" type="text" class="search-field">
        <button type="submit" class="btn-search">
          <i class="fas fa-search"></i>
        </button>
      </form>`
});