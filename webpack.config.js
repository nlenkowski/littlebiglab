const path = require('path');
const webpack = require('webpack');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CommonsChunkPlugin = require('webpack/lib/optimize/CommonsChunkPlugin');

// Environment
const nodeEnv = process.env.NODE_ENV || 'production';

// Paths
const sourcePath = path.join(__dirname, 'assets/scripts');
const buildPath = path.join(__dirname, 'dist-webpack');

module.exports = {
  devtool: 'source-map',
  entry: {
    home: ['babel-polyfill', 'svgxuse', path.resolve(sourcePath, 'home.js')],
    project: ['babel-polyfill', 'svgxuse', path.resolve(sourcePath, 'project.js')],
  },
  output: {
    path: path.resolve(buildPath, 'scripts'),
    filename: '[name].min.js',
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel-loader',
        options: {
          presets: [
            ['env', { targets: { browsers: ['last 2 versions'] } }],
          ],
        },
      },
    ],
  },
  plugins: [
    new webpack.DefinePlugin({
      'process.env': { NODE_ENV: JSON.stringify(nodeEnv) },
    }),
    new CommonsChunkPlugin({
      name: 'common',
      chunks: ['home', 'project'],
      minChunks: 2,
    }),
    new BrowserSyncPlugin({
      proxy: 'https://logan.local',
    }),
  ],
};
