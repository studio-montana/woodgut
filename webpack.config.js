const path = require('path');

/** gutenberg modules declaration */
let gutenberg_modules = [
	// {'entry': 'index.jsx', 'name': 'fake_block', 'path': 'blocks/fake_block/'}, // Block declaration example
	// {'entry': 'index.jsx', 'name': 'fake_plugin', 'path': 'plugins/fake_plugin/'}, // Plugin declaration example
	// {'entry': 'index.js', 'name': 'fake_store', 'path': 'stores/fake_store/'}, // Store declaration example
	{'entry': 'index.jsx', 'name': '_blank_', 'path': 'blocks/yop/'}, // yop block
];

/** all configurations */
let configs = [];

/** common configuration */
var config = {
	module: {
		rules: [
			{
				test: /\.jsx?$/,
				exclude: /node_modules/,
				use: "babel-loader"
			}
		]
	},
	resolve: {
		alias: {
		  wkgcomponents: path.resolve(__dirname, '../woodkit/src/gutenberg/components/'), // import ... from 'wkgcomponents/...'
		  wkgassets: path.resolve(__dirname, '../woodkit/src/gutenberg/assets/'), // import ... from 'wkgassets/...'
		},
    extensions: ['.js', '.jsx'], // import without extension
	},
	externals: {
		'@wordpress/i18n': 'wp.i18n'
	}
};

/**
 * gutenberg modules configuration
 */
for (var gutenberg_module of gutenberg_modules) {
	configs.push(Object.assign({}, config, {
		name: gutenberg_module.name,
		entry: './src/'+gutenberg_module.path+gutenberg_module.entry,
		output: {
			path: path.resolve(__dirname, 'src/' + gutenberg_module.path),
			filename: 'build.js'
		},
	}));
}

/** return configurations */
module.exports = configs;
