var argv = require('minimist')(process.argv.slice(2));

// merge with default parameters
var args = Object.assign({'prod': false, default: true, 'angular-jquery': false, 'angular-native': false}, argv);

var configs = {default: '/app/gulp.json', 'angular-jquery': './../conf/angular-jquery.json', 'angular-native': './../conf/angular-native.json'};
var config = configs.default;
// angular flag true or path name has angular
if (args['angular-jquery'] || process.cwd().indexOf('angular-jquery') !== -1) {
  config = configs['angular-jquery'];
}
if (args['angular-native'] || process.cwd().indexOf('angular-native') !== -1) {
  config = configs['angular-native'];
}
module.exports = require(config);
