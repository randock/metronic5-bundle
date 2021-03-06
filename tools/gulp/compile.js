var gulp = require('gulp');
var build = require('./build');
var func = require('./helpers');
var argv = require('minimist')(process.argv.slice(2));

// merge with default parameters
var args = Object.assign({'prod': false}, argv);

if (args.prod !== false) {
  // force disable debug for production
  build.config.debug = false;
  build.config.compile = {
    'jsUglify': true,
    'cssMinify': true,
    'jsSourcemaps': false,
    'cssSourcemaps': false,
  };
}

// task to bundle js/css
gulp.task('build-bundle', function(cb) {
  // build by demo, leave demo empty to generate all demos
  if (build.config.demo !== '') {
    for (var demo in build.build.demo) {
      if (!build.build.demo.hasOwnProperty(demo)) continue;
      if (build.config.demo !== demo) {
        delete build.build.demo[demo];
      }
    }
  }
  func.objectWalkRecursive(build.build, function(val, key) {
    if (typeof val.src !== 'undefined') {
      if (typeof val.bundle !== 'undefined') {
        func.bundle(val);
      }
      if (typeof val.output !== 'undefined') {
        func.output(val);
      }
    }
  });
  cb();
});

var tasks = ['clean', 'build-bundle'];
// entry point
gulp.task('default', gulp.series(tasks));
