const path = require('path');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CommonsChunkPlugin = require('webpack/lib/optimize/CommonsChunkPlugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const FriendlyErrorsWebpackPlugin = require('friendly-errors-webpack-plugin');

// Paths
const sourcePath = path.join(__dirname, 'assets');
const buildPath = path.join(__dirname, 'dist');

// Common
module.exports = {
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
        // Scripts
        test: /\.js$/,
        include: sourcePath,
        exclude: /node_modules/,
        loader: 'babel-loader',
        options: {
          presets: [
            ['env', {
              targets: {
                browsers: ['last 2 versions'],
              },
            }],
          ],
        },
      },
      {
        // Styles
        test: /\.scss$/,
        use: ExtractTextPlugin.extract({
          use: [
            { loader: 'css-loader', options: { sourceMap: true } },
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
