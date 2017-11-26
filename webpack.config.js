const path = require('path');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CommonsChunkPlugin = require('webpack/lib/optimize/CommonsChunkPlugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const FriendlyErrorsWebpackPlugin = require('friendly-errors-webpack-plugin');
const StyleLintPlugin = require('stylelint-webpack-plugin');

// Paths
const sourcePath = path.join(__dirname, 'assets');
const buildPath = path.join(__dirname, 'dist');

module.exports = function webpack(env) {
  // Get environment
  const isProd = env.prod === true;

  // Config
  return {
    devtool: isProd ? 'source-map' : 'inline-source-map',
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
      // Stats and errors handled by FriendlyErrorsWebpackPlugin
      hash: false,
      version: false,
      timings: false,
      errors: false,
      errorDetails: false,
      warnings: false,
      modules: false,
    },
    module: {
      rules: [
        {
          // Lint scripts with eslint
          enforce: 'pre',
          test: /\.js$/,
          include: sourcePath,
          exclude: /node_modules/,
          loader: 'eslint-loader',
        },
        {
          // Transpile scripts with babel
          test: /\.js$/,
          include: sourcePath,
          exclude: /node_modules/,
          loader: 'babel-loader',
        },
        {
          // Autoprefix styles with postcss and compile sass
          test: /\.scss$/,
          include: sourcePath,
          use: ExtractTextPlugin.extract({
            fallback: 'style-loader',
            use: [
              { loader: 'css-loader', options: { sourceMap: true } },
              { loader: 'postcss-loader', options: { sourceMap: true } },
              { loader: 'sass-loader', options: { sourceMap: true } },
            ],
          }),
        },
        {
          // Generate urls for imported assets
          test: /\.(ttf|eot|woff2?|png|jpe?g|gif|svg|ico)$/,
          include: sourcePath,
          loader: 'url',
          options: {
            limit: 4096,
            name: '[path][name].[ext]',
          },
        },
        {
          // Output files for imported vendor assets
          test: /\.(ttf|eot|woff2?|png|jpe?g|gif|svg|ico)$/,
          include: /node_modules/,
          loader: 'url',
          options: {
            limit: 4096,
            outputPath: 'vendor/',
            name: '[name][ext]',
          },
        },
      ],
    },
    plugins: [

      // Split common code into a separate file
      new CommonsChunkPlugin({
        name: 'common',
        chunks: ['home', 'project'],
        minChunks: 2,
      }),

      // Output compiled scss to a file
      new ExtractTextPlugin({
        filename: 'styles/[name].bundle.css',
      }),

      // Lint styles with stylelint
      new StyleLintPlugin(),

      // Watch with browsersync
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

      // Friendly error handling
      new FriendlyErrorsWebpackPlugin(),
    ],
  };
};
