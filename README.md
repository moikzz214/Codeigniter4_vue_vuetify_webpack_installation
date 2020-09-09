![CodeIgniter 4 Framework](/screenshot.png)
# CodeIgniter 4 Framework

### Codeigniter 4 with Vue JS, Vuetify JS and Webpack Installed  ###

### 1. composer create-project codeigniter4/framework ci4 ###

By default, CodeIgniter starts up in production mode. This is a safety feature to keep your site a bit more secure in case settings are messed up once it is live. So first let’s fix that. Copy or renmae the env file to .env. Open it up.

This file contains server-specific settings. This means you never will need to commit any sensitive information to your version control system. It includes some of the most common ones you want to enter already, though they are all commented out. So uncomment the line with CI_ENVIRONMENT on it, and change production to development:

### 2. change file env to .env, open the file and update CI_ENVIRONMENT  ###

    CI_ENVIRONMENT = development

### 3. Create package.json  ###

    {
    "name": "moikzz",
    "version": "4.0.0",
    "description": "What is CodeIgniter ###################",
    "author": "Moikzz",
    "license": "ISC",
    "private": true,
    "scripts": {
        "test": "echo \"Error: no test specified\" && exit 1",
        "build": "webpack --config webpack.config.js",
        "watch": "webpack --watch"
    },
    "dependencies": {
        "@babel/polyfill": "^7.8.7",
        "cssnano": "^4.1.10",
        "vue": "^2.6.11",
        "vuetify": "^2.2.15",
        "webpack": "^4.42.0"
    },
    "devDependencies": {
        "@babel/core": "^7.8.7",
        "@babel/preset-env": "^7.8.7",
        "autoprefixer": "^9.7.4",
        "babel-loader": "^8.0.6",
        "postcss-loader": "^3.0.0",
        "mini-css-extract-plugin": "^0.9.0",
        "deepmerge": "^4.2.2",
        "fibers": "^4.0.2",
        "sass": "^1.26.2",
        "sass-loader": "^8.0.2",
        "vue-cli-plugin-vuetify": "~2.0.5",
        "css-loader": "^3.4.2",
        "webpack-cli": "^3.3.11"
    },
    "browserslist": [
        "defaults",
        "not ie < 11",
        "last 2 versions",
        "> 1%",
        "iOS 7",
        "last 3 iOS versions"
    ]
    } 

### 4. Install dependencies:  ###

    npm install

### 5. webpack.config.js ###

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

### 6. Create file postcss.config.js ### 

    // It is handy to not have those transformations while we developing
    if(process.env.NODE_ENV === 'development') {
        module.exports = {
            plugins: [
                require('autoprefixer'),
                require('cssnano'),
                // More postCSS modules here if needed
            ]
        }
    }

### 7. Create src folder and create main.js ### 

    // src/main.js
    import '@babel/polyfill'
    import Vue from 'vue'
    import vuetify from './plugins/vuetify' // path to vuetify export
    import './sass/custom.scss' // path to custom sass

    new Vue({
      vuetify,
    }).$mount('#app')

### 8. Create file vuetify.js on plugins folder ###

    //src/plugins/vuetify.js  
    import Vue from 'vue'
    import Vuetify from 'vuetify'
    import 'vuetify/dist/vuetify.min.css'

    Vue.use(Vuetify)

    const opts = {}

    export default new Vuetify(opts)

//--------------------------------------------------------------------

### 9. Create custom.scss - Your custom css here - ###

    src/sass/custom.scss

//--------------------------------------------------------------------

### on your Controller ###

    <?php namespace App\Controllers;

    class Home extends BaseController
    {
        protected $version = '1.0.0';
        public function index()
        {
            helper('html');
            $data['version'] = $this->version;
            return view('welcome_message',$data);
        }  
    } 

### on your View ###
***--- Add your css & js files ---***

// you need helper('html'); for the link_tag & script_tag 
//see [helper](https://codeigniter4.github.io/userguide/helpers/) 

    <?= link_tag('src/bundle.css?v='.$version) ?>
    <?= script_tag('src/bundle.js?v='.$version) ?> 

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible, and secure. 
More information can be found at the [official site](http://codeigniter.com).

This repository holds the distributable version of the framework,
including the user guide. It has been built from the 
[development repository](https://github.com/codeigniter4/CodeIgniter4).

**This is pre-release code and should not be used in production sites.**

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/). 


## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!
The user guide updating and deployment is a bit awkward at the moment, but we are working on it!

## Repository Management

We use Github issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script. 
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/contributing.md) section in the development repository.

## Server Requirements

PHP version 7.2 or higher is required, with the following extensions installed: 

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
