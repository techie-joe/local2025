<?php

$__BASE__ = basename($__ROOT__);

$_URI = $_SERVER['REQUEST_URI'];
$_DIR = $_SERVER['DOCUMENT_ROOT'] . $_URI;

$_HOST = $_SERVER['HTTP_HOST'];

function match_dir($directory, $content)
{
  // Directory to be included
  // $include = preg_match( $regex , $content);
  // Directory to be excluded
  $exclude = preg_match('/^[.]|^(node_modules)$/', $content) === 0;
  return is_dir($directory . $content) && $exclude;
}

function match_file($directory, $content)
{
  // Files to be included
  $include = preg_match('/^(.*)\.[A-Za-z0-9]+$/', $content);
  // $include = preg_match('/^(.*)\.(html?|php|s?css|js(on)?|txt|md)$/', $content);
  // Files to be excluded
  $exclude = preg_match( '/^(index\.(html|php))$/' , $content) === 0;
  return !is_dir($directory . $content) && $include && $exclude;
}

function getDirectoryContent($directory) {

  global $_URI;
  
  $parentLink = '<a href=".." title="Parent directory" class="_link _l">&middot;&middot;</a>';
  $echo = '';

  // Open a known directory, and proceed to read its contents
  // $echo .= $directory;
  if (is_dir($directory) && $dh = opendir($directory)) {
    $dirs = [];
    $files = [];
    while (($content = readdir($dh)) !== false) {
      if (match_dir($directory, $content)) {
        $dirs[] = $content;
      } else if (match_file($directory, $content)) {
        $files[] = $content;
      }
    }
    closedir($dh);
    $dc = count($dirs);
    $fc = count($files);

    $echo .= '<div class="_p" id="_directory">';
    if($_URI != '/') { $echo .= $parentLink; }
    if ($fc + $dc == 0){ $echo .= '<span class="_mh _b _mono _tc_red">Empty directory</span>'; }
    if ($dc) { foreach ($dirs as $dir) {
      $echo .= "<a href='$dir' class='_link _l'>$dir</a>";
    }}
    $echo .= '</div>';
    // $echo .= '<hr/>';
    $echo .= '<div class="_p" id="_files">';
    if ($fc) { foreach ($files as $file) {
      $echo .= "<a href='$file' class='_link _l'>$file</a>";
    }}
    $echo .= '</div>';
  } else {
    $echo .= '<div class="_p" id="_directory">';
    $echo .= $parentLink;
    $echo .= '<span class="_mh _b _mono _tc_red">Invalid access</span>';
    $echo .= '</div>';
  }
  return $echo;
}

?>