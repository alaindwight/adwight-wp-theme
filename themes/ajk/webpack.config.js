const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CompressionPlugin = require('compression-webpack-plugin');
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const webpack = require("webpack");
const path = require("path");

module.exports = (env, options) => ({
  entry: ["./src/js/app.js"],
  devtool: "source-map",
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          options.mode !== "production"
            ? "style-loader"
            : {
                loader: MiniCssExtractPlugin.loader
              },
          "css-loader",
          {
            loader: 'postcss-loader',
            options: {
              plugins: function () {
                return [
                  require('precss'),
                  require('autoprefixer')
                ];
              }
            }
          },
          "sass-loader"
        ]
      },
      {
        test: /\.(png|jpg|gif|svg)$/,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[ext]",
              outputPath: "theme/img/"
            }
          }
        ]
      },
      {
        test: /\.js$/,
        exclude: /(node_modules)/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"]
          }
        }
      },
      // font-awesome
      {
        test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
        use: [{
            loader: 'file-loader',
            options: {
                name: '[name].[ext]',
                outputPath: 'fonts/',
                publicPath: ''
            }
        }]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "css/app.css",
    }),
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      "window.jQuery": "jquery",
      Popper: ["popper.js", "default"]
    })
  ],
  optimization: {
    minimizer: [
      new UglifyJsPlugin({
          cache: true,
          parallel: true,
          sourceMap: false,
          extractComments: true
      }),
      new OptimizeCSSAssetsPlugin({})
    ]
  },
  output: {
    filename: "js/app.js",
    path: path.resolve(__dirname, "public"),
    publicPath: ""
  }
});