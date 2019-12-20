const path = require('path');
const nodeExternals = require('webpack-node-externals');
const CopyPlugin = require('copy-webpack-plugin');

module.exports = {
  entry: {
    server: path.join(__dirname, 'src/server/server.js'),
  },
  output: {
    path: path.join(__dirname, 'dist/server'),
    publicPath: "/",
    filename: "[name].js"
  },
  target: "node",
  node: { // Only for "express" app
    __dirname: false,
    __filename: false
  },
  externals: [nodeExternals()], // Only for "express" app
  module: {
    rules: [
      { // Recompile ES6+ to ES5
        test: /\.js$/,
        exclude: /node_modules/,
        loader: "babel-loader"
      }
    ]
  },
  plugins: [
    new CopyPlugin([
      {
        from: 'src/server/db',
        to: "db/[name].[ext]",
        toType: 'template'
      }
    ])
  ]
};