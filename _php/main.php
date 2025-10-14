<?php

$__BASE__ = basename($__ROOT__);

$_URI = $_SERVER['REQUEST_URI'];
$_DIR = $_SERVER['DOCUMENT_ROOT'] . $_URI;

$_HOST = $_SERVER['HTTP_HOST'];

function match_dir($directory, $file)
{
  // Directory to be excluded
  $exclude = '/^[._]|^(node_modules)$/';
  if ($_SERVER['REQUEST_URI'] == '/') {
    $exclude = '/^[._]|^(node_modules)$/';
  }
  else if ($_SERVER['REQUEST_URI'] == '/local2025/') {
    $exclude = '/^[._]|^(node_modules|root)$/';
  }
  return is_dir($directory . $file)
    && preg_match($exclude, $file) === 0;
}

function match_file($file)
{
  // Files to be included only
  // $exclude = '/^(404\.html?|index\.(html?|php))$/';
  $exclude = '/^(index\.(php))$/';
  $include = '/^(.*)\.(html?|php|s?css|js(on)?|txt|md)$/';
  return preg_match($include, $file)
    && preg_match($exclude, $file) === 0;
}

function getDirectoryContent($directory) {
  
  $parentLink = <<<HTML
  <a href=".." title="Parent directory" class="_link _l">&middot;&middot;</a>
  HTML;

  $echo = '';

  // Open a known directory, and proceed to read its contents
  // $echo .= $directory;
  if (is_dir($directory)) {
    if ($dh = opendir($directory)) {
      $dirs = [];
      $files = [];
      while (($file = readdir($dh)) !== false) {
        if (match_dir($directory, $file)) {
          $dirs[] = $file;
        } else if (match_file($file)) {
          $files[] = $file;
        }
      }
      closedir($dh);

      $dc = count($dirs);
      $fc = count($files);

      $echo .= '<div class="_p" id="_directory">';
      if($_SERVER['REQUEST_URI'] != '/') { $echo .= $parentLink; }
      if ($dc) {
        foreach ($dirs as $dir) {
          if ($dir) {
            $echo .= "<a href='$dir' class='_link _l'>$dir</a>";
          }
        }
      }
      else if ($fc + $dc == 0) $echo .= '<span class="_mh _b _mono _tc_red">Empty directory</span>';
      $echo .= '</div>';
      // $echo .= '<hr/>';
      $echo .= '<div class="_p" id="_files">';
      if ($fc) {
        foreach ($files as $file) {
          $echo .= "<a href='$file' class='_link _l'>$file</a>";
        }
      }
      $echo .= '</div>';
    } else {
      $echo .= '<p class="_mh"><span class="_b _mono _tc_red">Could not open directory</span></p>';
    }
  } else {
    $echo .= '<div class="_p" id="_directory">';
    $echo .= $parentLink;
    $echo .= '<span class="_mh _b _mono _tc_red">Invalid directory</span>';
    $echo .= '</div>';
  }

  return $echo;

}

?>