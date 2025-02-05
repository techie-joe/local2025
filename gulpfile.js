/* =============================================================

This is the gulper commands definition.
Files that tells gulper how to build your project.
Find more information about Gulp on http://gulpjs.com

/* =============================================================

List of available commands:

// > gulp
// > gulp site

// > gulp builder
// > gulp files
// > gulp pages
// > gulp css
// > gulp js

// > gulp watch
// > gulp pagesw
// > gulp cssw
// > gulp jsw

To list available tasks, try running: > gulp --tasks

============================================================= */

const { watch, series, parallel } = require('gulp');
const deploy = require('./gulp-deploy');

exports.all = series(
  deploy
);

exports.default = exports.all;