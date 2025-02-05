/* =============================================================

This is the gulper commands definition.
Files that tells gulper how to build your project.
Find more information about Gulp on http://gulpjs.com

============================================================= */

// CONFIGS
// =============================================================

const _src_site = '_site/**/*';
const _dep_site = '../';

// IMPORTS
// =============================================================

const { src, dest, series, parallel, watch } = require('gulp');
const log = console.log;

// TASKS
// =============================================================

// to copy every files from _src to _dest
function deploy() {
  log(`Deploying site to : ${_dep_site}`);
  return src(_src_site, { dot: true })
  .pipe(dest(_dep_site));
}

/* =============================================================

List of available commands:

// > gulp deploy
// > gulp

To list available tasks, try running: > gulp --tasks

============================================================= */

exports.deploy = series( deploy );

exports.default = exports.deploy;