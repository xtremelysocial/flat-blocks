// WordPress webpack config.
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

// Plugins.
const WebpackWatchedGlobEntries = require('webpack-watched-glob-entries-plugin');
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const RemoveEmptyScriptsPlugin = require( 'webpack-remove-empty-scripts' );
const RemovePlugin = require('remove-files-webpack-plugin');

// Utilities.
const path = require( 'path' );

// package.json sets the default source to ./src and output to ./assets/css
// so entry and output below should be relative to those.
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
						{ loader: 'css-loader' },
						{ loader: 'sass-loader', 
							options: {
								// turn off minification
								sassOptions: {
									outputStyle: 'expanded',
								},
							},
						},
					],
				},
			],
		},
		plugins: [
			// Include WP's plugin config.
			...defaultConfig.plugins,

			// Load multiple entry points plugin
			new WebpackWatchedGlobEntries(),
			
			// Load minimize CSS plugin so we can turn off minimizing above
			// with outputStyle: 'expanded'
			new MiniCssExtractPlugin(),
			
			// Remove the empty `.js` files generated by webpack
			new RemoveEmptyScriptsPlugin( {
				stage: RemoveEmptyScriptsPlugin.STAGE_AFTER_PROCESS_PLUGINS,
			} ),
			
			// Remove *.asset.php files from the blocks directory (only)
			new RemovePlugin({
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
		// turn off source maps
		mode: 'development',
		devtool: false,
	},
};
