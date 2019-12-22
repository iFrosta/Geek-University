const dropdown = {
  data() {
    return {
      dropFirst: true,
      dropSec: false,
      dropThird: false,
    }
  },
  template: `<div class="sidenav flex align start">
      <div class="category flex align start">
        <span @click="dropFirst = !dropFirst" :class="{ 'active' : dropFirst === true}">Category<i class="fas fa-sort-up active"></i></span>
        <ul v-show="dropFirst" class="dropdown" id="drop-1">
          <li>Accessories</li>
          <li>Bags</li>
          <li>Denim</li>
          <li>Hoodies & Sweatshirts</li>
          <li>Jackets & Coats</li>
          <li>Pants</li>
          <li>Polos</li>
          <li>Shirts</li>
          <li>Shoes</li>
          <li>Shorts</li>
          <li>Sweaters & Knits</li>
          <li>T-Shirts</li>
          <li>Tanks</li>
        </ul>
      </div>
      <div class="category flex align start">
        <span @click="dropSec = !dropSec" :class="{ 'active' : dropSec === true}">Category<i class="fas fa-sort-up active"></i></span>
        <ul v-show="dropSec" class="dropdown" id="drop-1">
          <li>Accessories</li>
          <li>Bags</li>
          <li>Denim</li>
          <li>Hoodies & Sweatshirts</li>
          <li>Jackets & Coats</li>
          <li>Pants</li>
          <li>Polos</li>
          <li>Shirts</li>
          <li>Shoes</li>
          <li>Shorts</li>
          <li>Sweaters & Knits</li>
          <li>T-Shirts</li>
          <li>Tanks</li>
        </ul>
      </div>
      <div class="category flex align start">
        <span @click="dropThird = !dropThird" :class="{ 'active' : dropThird === true}">Category<i class="fas fa-sort-up active"></i></span>
        <ul v-show="dropThird" class="dropdown" id="drop-1">
          <li>Accessories</li>
          <li>Bags</li>
          <li>Denim</li>
          <li>Hoodies & Sweatshirts</li>
          <li>Jackets & Coats</li>
          <li>Pants</li>
          <li>Polos</li>
          <li>Shirts</li>
          <li>Shoes</li>
          <li>Shorts</li>
          <li>Sweaters & Knits</li>
          <li>T-Shirts</li>
          <li>Tanks</li>
        </ul>
      </div>
    </div>`
};

export default dropdown

// window.addEventListener("load", function() {
//   let dropdowns = document.querySelectorAll('.dropdown');
//
//   dropdowns.forEach(el => {
//     el.addEventListener('click', e => {
//       console.log(e);
//     })
//   });
// });
