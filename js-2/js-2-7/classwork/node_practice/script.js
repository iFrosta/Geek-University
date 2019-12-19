const c = require('./func');
const os = require('os');
const fs = require('fs');
const http = require('http');
const moment = require('moment');

const users = [{name: 'Ann', age: 20}];
const user1 = '{"name": "John", "age": 30}';


// console.log(moment().format('DD MMM YYYY, h:mm:ss a'));

// fs.writeFile('db.json', JSON.stringify(users), (err) => {
//    if(err){
//        console.log(err);
//    }
// });

// fs.readFile('db.json', 'utf-8', (err, data) => {
//     if(err){
//         console.log(err);
//     } else {
//         const list = JSON.parse(data);
//         list.push(JSON.parse(user1));
//         fs.writeFile('db.json', JSON.stringify(list), (err) => {
//             if(err){
//                 console.log(err);
//             }
//         })
//     }
// })

//
// const server = http.createServer((req, res) => {
//     if(req.url === '/'){
//         res.write('Hello World');
//         res.end();
//     }
//     if(req.url === '/api/users'){
//         fs.readFile('db.json', 'utf-8', (err, data) => {
//             if(err){
//                 console.log(err);
//             } else {
//                 res.write(data);
//                 res.end();
//             }
//         })
//     }
// });
//
// server.listen(3000);
// server.on('connection', (socket) => {
//    console.log('New connection!');
// });
// console.log('Server started at port 3000 ...');


// console.log(os.platform());
// console.log(os.cpus());
// console.log(os.type());


// console.log(module);
// console.log(c(50));