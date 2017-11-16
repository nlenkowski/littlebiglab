const path = require('path');
const webpack = require("webpack");
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CommonsChunkPlugin = require("webpack/lib/optimize/CommonsChunkPlugin");
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

// Environment
const nodeEnv = process.env.NODE_ENV || "production";

// Paths
const sourcePath = path.join(__dirname, 'assets/scripts');
const buildPath = path.join(__dirname, 'dist-webpack');

module.exports = {
  devtool: "source-map",
  entry: {
    home: ["babel-polyfill", path.resolve(sourcePath, 'home.js')],
    project: ["babel-polyfill", path.resolve(sourcePath, 'project.js')]
  },
  output: {
    path: path.resolve(buildPath, "scripts"),
    filename: "[name].min.js"
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: "babel-loader",
        query: {
          presets: [
            ["env",
              { targets: { browsers: ["last 2 versions"] } }
            ]
          ]
        }
      }
    ]
  },
  plugins: [
    new webpack.DefinePlugin({
      "process.env": { NODE_ENV: JSON.stringify(nodeEnv) }
    }),
    new UglifyJsPlugin({
      compress: { warnings: false },
      output: { comments: false },
      sourceMap: true
    }),
    new CommonsChunkPlugin({
      name: "common",
      chunks: ["home", "project"],
      minChunks: 2
    }),
    new BrowserSyncPlugin({
      proxy: 'https://logan.local'
    })
  ]
};
