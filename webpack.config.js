const path = require('path');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CommonsChunkPlugin = require('webpack/lib/optimize/CommonsChunkPlugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const FriendlyErrorsWebpackPlugin = require('friendly-errors-webpack-plugin');
const StyleLintPlugin = require('stylelint-webpack-plugin');

// Paths
const sourcePath = path.join(__dirname, 'assets');
const buildPath = path.join(__dirname, 'dist');

// Common
module.exports = {
  devtool: 'source-map',
  entry: {
    home: [
      path.resolve(sourcePath, 'scripts/home.js'),
      path.resolve(sourcePath, 'styles/main.scss'),
    ],
    project: [
      path.resolve(sourcePath, 'scripts/project.js'),
      path.resolve(sourcePath, 'styles/main.scss'),
    ],
  },
  output: {
    path: path.resolve(buildPath),
    filename: 'scripts/[name].bundle.js',
  },
  stats: {
    hash: false,
    version: false,
    timings: false,
    children: false,
    errors: false,
    errorDetails: false,
    warnings: false,
    chunks: false,
    modules: false,
    reasons: false,
    source: false,
    publicPath: false,
  },
  module: {
    rules: [
      {
        enforce: 'pre',
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'eslint-loader',
      },
      {
        test: /\.js$/,
        include: sourcePath,
        exclude: /node_modules/,
        loader: 'babel-loader',
      },
      {
        test: /\.scss$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [
            { loader: 'css-loader', options: { sourceMap: true } },
            { loader: 'postcss-loader', options: { sourceMap: true } },
            { loader: 'sass-loader', options: { sourceMap: true } },
          ],
        }),
      },
    ],
  },
  plugins: [
    // Split common code into separate file
    new CommonsChunkPlugin({
      name: 'common',
      chunks: ['home', 'project'],
      minChunks: 2,
    }),

    // Compile scss to separate file
    new ExtractTextPlugin({
      filename: 'styles/[name].bundle.css',
    }),

    // Lint styles with Stylelint
    new StyleLintPlugin(),

    // BrowserSync runs on watch only
    new BrowserSyncPlugin(
      {
        proxy: 'https://logan.local',
        files: [
          '**/*.php',
          'dist/styles/*.css',
          'dist/scripts/*.js',
        ],
        wachOptions: {
          ignored: '/wp-admin/**',
        },
        ghostMode: {
          clicks: true,
          forms: false,
          scroll: false,
        },
        open: false,
        notify: false,
      },
      {
        reload: false,
      },
    ),

    // Generate friendly errors
    new FriendlyErrorsWebpackPlugin(),
  ],
};
