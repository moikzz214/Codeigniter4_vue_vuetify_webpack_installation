const MiniCssExtractPlugin = require("mini-css-extract-plugin");
// Webpack uses this to work with directories
const path = require('path');

// This is main configuration object.
// Here you write different options and tell Webpack what to do
module.exports = {

       // Path to your entry point. From this file Webpack will begin his work
        entry: './src/main.js',

        // Path and filename of your result bundle.
        // Webpack will bundle all JavaScript into this file
        output: {
            path: path.resolve(__dirname, 'public/src/'),
            filename: 'bundle.js'
        }, 
        resolve: {
            alias: {
                'vue$': 'vue/dist/vue.esm.js'
            },
            extensions: ['*', '.js', '.vue', '.json']
        },
        module: {
            rules: [{
                    test: /\.vue$/,
                    loader: 'vue-loader'
                },
                { 
                    test: /\.js?$/,
                    exclude: /(node_modules)/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                        presets: ['@babel/preset-env']
                        }
                    }
                },
                {
                    test: /\.(sa|sc|c)ss$/,
                    use: [  {
                                // After all CSS loaders we use plugin to do his work.
                                // It gets all transformed CSS and extracts it into separate
                                // single bundled file
                                loader: MiniCssExtractPlugin.loader
                            },  {
                                // This loader resolves url() and @imports inside CSS
                                loader: "css-loader",
                            },
                            {
                                // Then we apply postCSS fixes like autoprefixer and minifying
                                loader: "postcss-loader"
                            },
                            {
                                // First we transform SASS to standard CSS
                                loader: "sass-loader",
                                options: {
                                implementation: require("sass")
                                }
                            }
                    ]
                }
            ],
        },
        plugins: [
            new MiniCssExtractPlugin({
            filename: "bundle.css"
            })
        ],
        // Default mode for Webpack is production.
        // Depending on mode Webpack will apply different things
        // on final bundle. For now we don't need production's JavaScript 
        // minifying and other thing so let's set mode to development
        mode: 'development'
};