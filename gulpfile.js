/* =============================================================

This is the gulper commands definition.
Files that tells gulper how to build your project.
Find more information about Gulp on http://gulpjs.com

============================================================= */

// CONFIGS
// =============================================================

const _src_site = 'root/*';
const _dep_site = '../';

const watchOpt = { ignoreInitial: false };

// IMPORTS
// =============================================================

const { src, dest, series, parallel, watch } = require('gulp');
const log = console.log;

// TASKS
// =============================================================

// to copy every files from _src to _dest
function _deploy() {
  log(`Deploying site ..`);
  log(`from : ${_src_site}`);
  log(`to   : ${_dep_site}`);
  return src(_src_site, { dot: true })
  .pipe(dest(_dep_site));
}

function _watch() {
  log(`Watching site : ${_src_site}`);
  watch(_src_site, watchOpt, _deploy);
}

/* =============================================================

List of available commands:

// > gulp watch
// > gulp deploy

// ( default: deploy )
// > gulp

To list available tasks, try running: > gulp --tasks

============================================================= */

exports.deploy = series( _deploy );

exports.watch = parallel( _watch );

exports.default = exports.deploy;