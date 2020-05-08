const path = require('path');

/** gutenberg modules declaration */
let gutenberg_modules = [
	{'entry': 'index.js', 'name': 'commons', 'path': 'stores/commons/'}, // commons store
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
		  wkgcomponents: path.resolve(__dirname, 'src/woodlib/components/'), // import ... from 'wkgcomponents/...'
		  wkgassets: path.resolve(__dirname, 'src/woodlib/assets/'), // import ... from 'wkgassets/...'
		},
    extensions: ['.js', '.jsx'], // import without extension
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
