class ProductsList {
  constructor(container = '.products'){
    this.container = container;
    this.goods = [];
    this.allProducts = [];
    this._fetchProducts();
    this._render();
    console.log(this.calcSum());
  }
  _fetchProducts(){
    this.goods = [
      {id: 1, category: "Notebooks", title: 'Notebook', price: 2000, img: 'https://static.re-store.ru/upload/iblock/4fc/4fc2f36b75ade15f78baeefb04209361.jpg'},
      {id: 2, category: "Mouses", title: 'Mouse', price: 40, img:' https://img.mvideo.ru/Pdb/50048743b.jpg'},
      {id: 3, category: "Keyboards", title: 'Keyboard', price: 200, img: 'https://www.logitechg.com/content/dam/gaming/en/products/pro-x-keyboard/pro-x-keyboard-hero.png.imgw.1318.1318.jpeg'},
      {id: 4, category: "Periphery", title: 'Gamepad', price: 50, img: 'https://avatars.mds.yandex.net/get-mpic/1855911/img_id7980936131697456187.jpeg/9hq'},
      {id: 5, category: "Chairs", title: 'Chair', price: 150, img: 'https://cdn11.bigcommerce.com/s-1ovkgbcja1/images/stencil/1280x1280/products/212/1965/PDP-TH-1__51615.1562964688.jpg?c=2?imbypass=on'},
      {id: 6, category: "Periphery", title: 'Mouse pad', price: 20, img: 'https://images-na.ssl-images-amazon.com/images/I/A16NEfK2mZL._SL1500_.jpg'}
    ];
  }
  _render(){
    const block = document.querySelector(this.container);
    for (let product of this.goods){
      const productObj = new ProductItem(product);
      this.allProducts.push(productObj);
      block.insertAdjacentHTML('beforeend', productObj.render());
    }
  }
  calcSum(){
    return this.allProducts.reduce((sum, item) => sum +=item.price, 0);
  }
}

class ProductItem {
  constructor(product, img  = 'http://www.stoimen.com/wp-content/uploads/2011/10/question.mark_.jpg'){
    this.title = product.title;
    this.price = product.price;
    this.id = product.id;
    this.img = product.img;
  }
  render() {
    return `<div class="product-item" data-id="item-${this.id}">
            <h3>${this.title}</h3>
            <p>${this.price}$</p>
            <img src="${this.img}" alt="product-img">
            <button class="buy-btn">Купить</button>
          </div>`
  }
}

new ProductsList();

class Cart {
  constructor(container = '.cart') {
    this.container = container;
    this.goods = [];
    this.allProducts = [];
  }
}

class CartItem {
  constructor(product){
    this.title = product.title;
    this.price = product.price;
    this.id = product.id;
    this.img = product.img;
  }
}

// const catalog = [
//   {id: 1, title: 'Notebooks'},
//   {id: 2, title: 'Keyboards'},
//   {id: 3, title: 'Mouses'},
//   {id: 4, title: 'Periphery'},
//   {id: 5, title: 'Chairs'}
// ];
// const renderList = (catalog) => {
//   return `<li class="catalog-item" id="list-${catalog.title}">${catalog.title}</li>`
// };
// for (let el of catalog) {
//   document.querySelector('.list').insertAdjacentHTML('beforeend', renderList(el));
// }
// let catalogItems = document.querySelectorAll(".catalog-item");
// catalogItems.forEach(function(elem) {
//   elem.addEventListener("click", function() {
//     console.log(this.id.replace('list-',''));
//   });
// });