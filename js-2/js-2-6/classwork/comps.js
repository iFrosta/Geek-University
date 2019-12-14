Vue.component('component-one', {
    template: `<div>1. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, deleniti dolore earum et fugit hic impedit, ipsam, mollitia odit placeat quidem recusandae similique sunt veniam voluptates! Ex explicabo laudantium nulla?</div>`
});
Vue.component('component-two', {
    template: `<div>2. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, deleniti dolore earum et fugit hic impedit, ipsam, mollitia odit placeat quidem recusandae similique sunt veniam voluptates! Ex explicabo laudantium nulla?</div>`
});
Vue.component('component-three', {
    template: `<div>3. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, deleniti dolore earum et fugit hic impedit, ipsam, mollitia odit placeat quidem recusandae similique sunt veniam voluptates! Ex explicabo laudantium nulla?</div>`
})

// let childEl = {
//     template: `<p @click="$emit('parent')">Child component</p>`
// };
// let someEl = {
//     props: ['title', 'counter'],
//     components: {
//       childEl,
//     },
//     methods: {
//         some(){
//             console.log('from child')
//         }
//     },
//     mounted(){
//
//     },
//    template: `
//     <div>
//         <h2 @click="some">{{ title }}</h2>
//         <child-el @parent="some"></child-el>
//         <!--<slot>-->
//         <!--<p>Default</p>-->
// <!--</slot>-->
//         <!--<button @click="$emit('increase')">Increase</button>-->
//         <!--<p>{{counter}}</p>-->
//
//     </div>
//    `
// };
