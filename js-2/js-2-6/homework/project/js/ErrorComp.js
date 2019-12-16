Vue.component('error', {
  data() {
    return {
      text: ''
    }
  },
  methods: {
    setError() {
      this.text = error;
    }
  },
  computed: {
    showError() {
      return this.text !== '';
    }
  },
  template: `<div v-if="showError" class="error">
              <p></p>
              <button @click="setError('')">&times;</button>
              {{ text }}
            </div>`
});