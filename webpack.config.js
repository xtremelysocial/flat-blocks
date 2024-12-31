// WordPress webpack config.
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

// Plugins.
const WebpackWatchedGlobEntries = require('webpack-watched-glob-entries-plugin');
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const RemoveEmptyScriptsPlugin = require( 'webpack-remove-empty-scripts' );
const autoprefixer = require('autoprefixer');
const RemoveFilesPlugin = require('remove-files-webpack-plugin');

// Utilities.
const path = require( 'path' );

// package.json sets the default source to ./src and output to ./assets/css
// so entry and output below is relative to those. The output is set to the css
// subfolder so that the rest of our assets are left alone (images, js, etc.)
module.exports = {
	...defaultConfig,
	...{	
	 entry: WebpackWatchedGlobEntries.getEntries(
		  [ 
			path.resolve(__dirname, 'src/scss/**/*.scss'),
		  ],
		  {
			  ignore: '**/_*.scss'
		  }
		),
    	module: {
			rules: [
				{
					test: /\.(sa|sc|c)ss$/,
					use: [
						{ loader: MiniCssExtractPlugin.loader },
						{ loader: 'css-loader',
							options: {
          						url: false,
							},
						},
						{
							loader: "postcss-loader",						
							options: {
								postcssOptions: {
									plugins: [ autoprefixer() ]
								}
							}
						},
						{ loader: 'sass-loader' },
					],
				},
			],
		},
		plugins: [
			// Include WP's plugin config.
			...defaultConfig.plugins,
			
			// Configuration to remove the empty `.js` files generated by webpack
			new RemoveEmptyScriptsPlugin( {
				stage: RemoveEmptyScriptsPlugin.STAGE_AFTER_PROCESS_PLUGINS,
			} ),
			
			// Configuration to remove /assets/blocks/*.asset.php files except the 
			// combined block-styles.asset.php which is what we use for all block
			// CSS versions.
			new RemoveFilesPlugin({
				after: {
					test: [
						{
							folder: './assets/css/blocks',
							method: (absoluteItemPath) => {
								return new RegExp(/\.asset.php$/, 'm').test(absoluteItemPath);
							},
							recursive: true
						}
					],
					exclude: ['./assets/css/blocks/block-styles.asset.php']
				}
	        })
		],
		// turn off source maps and minifying css
		mode: 'development',
		devtool: false,
	},
};
