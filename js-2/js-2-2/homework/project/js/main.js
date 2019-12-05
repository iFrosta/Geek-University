const products = [
  {id: 1, title: 'Notebook', price: 2000, img: 'https://static.re-store.ru/upload/iblock/4fc/4fc2f36b75ade15f78baeefb04209361.jpg'},
  {id: 2, title: 'Mouse', price: 20, img:' https://img.mvideo.ru/Pdb/50048743b.jpg'},
  {id: 3, title: 'Keyboard', price: 200, img: 'https://www.logitechg.com/content/dam/gaming/en/products/pro-x-keyboard/pro-x-keyboard-hero.png.imgw.1318.1318.jpeg'},
  {id: 4, title: 'Gamepad', price: 50, img: 'https://avatars.mds.yandex.net/get-mpic/1855911/img_id7980936131697456187.jpeg/9hq'},
  {id: 5, title: 'Chair', price: 150, img: 'https://cdn11.bigcommerce.com/s-1ovkgbcja1/images/stencil/1280x1280/products/212/1965/PDP-TH-1__51615.1562964688.jpg?c=2?imbypass=on'}
];

const renderProduct = (product, img = 'http://www.stoimen.com/wp-content/uploads/2011/10/question.mark_.jpg') => {
   return `<div class="product-item">
        <h3>${product.title}</h3>
        <p>${product.price}$</p>
        <img src="${product.img}" alt="product-img">
        <button class="buy-btn">Купить</button>
    </div>`
};

const renderPage = list => {
  for (let el of list) {
    document.querySelector('.products').insertAdjacentHTML('beforeend', renderProduct(el));
  }
};

renderPage(products);