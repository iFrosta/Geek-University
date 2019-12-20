const express = require('express');
const fs = require('fs');
const cart = require('./cart');
const app = express();

app.use(express.json());
app.use('/', express.static('public'));

app.get('/api/products', (req, res) => {
  fs.readFile('server/db/products.json', 'utf-8', (err, data) => {
    if (err) {
      res.sendStatus(404, JSON.stringify({result: 0, text: err}))
    } else {
      res.send(data);
    }
  })
});
app.get('/api/cart', (req, res) => {
  fs.readFile('server/db/userCart.json', 'utf-8', (err, data) => {
    if (err) {
      res.sendStatus(404, JSON.stringify({result: 0, text: err}))
    } else {
      res.send(data);
    }
  })
});

app.post('/api/cart', (req, res) => {
  fs.readFile('server/db/userCart.json', 'utf-8', (err, data) => {
    if (err) {
      res.sendStatus(404, JSON.stringify({result: 0, text: err}))
    } else {
      let newCart = cart.add(JSON.parse(data), req);
      fs.writeFile('server/db/userCart.json', newCart, (err) => {
        if (err) {
          res.send('{"result": 0}');
        } else {
          res.send('{"result": 1}');
        }
      })
    }
  })
});
app.put('/api/cart/:id', (req, res) => {
  fs.readFile('server/db/userCart.json', 'utf-8', (err, data) => {
    if (err) {
      res.sendStatus(404, JSON.stringify({result: 0, text: err}))
    } else {
      let newCart = cart.change(JSON.parse(data), req);
      fs.writeFile('server/db/userCart.json', newCart, (err) => {
        if (err) {
          res.send('{"result": 0}');
        } else {
          res.send('{"result": 1}');
        }
      })
    }
  })
});


const port = process.env.PORT || 3000;
app.listen(port, () => console.log(`Listening at port ${port} ....`));