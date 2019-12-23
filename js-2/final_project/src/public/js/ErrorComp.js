const error = {
  data() {
    return {
      text: ''
    }
  },
  methods: {
    setError(error) {
      this.text = error;
    }
  },
  computed: {
    showError() {
      return this.text !== '';
    }
  },
  template: `<div v-if="showError" class="error">
              <p>{{ text }}</p>
              <button @click="setError('')">&times;</button>
            </div>`
};

export default error