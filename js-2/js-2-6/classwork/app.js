const app = new Vue({
    el: '#app',
    data: {
        someString: 'Hello, John',
        counter: 0,
        tabs: ['one', 'two', 'three'],
        currentTab: 'two'
    },
    methods: {
        increase(){
            this.counter++
        },
        some(){
            console.log('from parent')
        }
    },
    computed: {
        currentComponent(){
           return `component-${this.currentTab}`
        }
    }
});