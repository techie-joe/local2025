/* =============================================================



/* =============================================================
CONFIGS
============================================================= */

const _src_site = '_site/**/*';
const _dep_site = '../';

// const _dest_url = "/";
// const _dest = {
//   builder : "./",
//   root    : "../ace",
//   css     : "../ace/assets/css",
//   js      : "../ace/assets/gjs",
// };

// const _src_manifest = './manifest.js';
// const _src = {
//   builder : {
//     txt : ["builder/**/*.txt.pug"],
//     md  : ["builder/**/*.md.pug"],
//   },
//   files : ["files/**/*"],
//   html  : ["pages/**/*.html.pug"],
//   php   : ["pages/**/*.php.pug"],
//   txt   : ["pages/**/*.txt.pug"],
//   md    : ["pages/**/*.md.pug"],
//   js    : ["scripts/gulp_js/**/*.js"],
//   scss  : ["styles/gulp_css/**/*.scss"],
// };

/* =============================================================
IMPORTS
============================================================= */

const { src, dest } = require('gulp');
const log = console.log;

/* =============================================================
TASKS
============================================================= */

// to copy every files from _src to _dest
function deploy() {
  log(`Deploying site to : ${_dep_site}`);
  return src(_src_site, { dot: true })
  .pipe(dest(_dep_site));
}

module.exports = deploy;