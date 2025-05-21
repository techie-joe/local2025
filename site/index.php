<?php

$title       = 'Localhost 2025';
$heading     = 'Localhost 2025';
$description = 'Local development environment';

// Directory path to be listed
$_URI = $_SERVER['REQUEST_URI'];
$_DIRECTORY = $_SERVER['DOCUMENT_ROOT'] . $_URI;

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


function renderDirectoryContent($directory) {
  
  $parentLink = '<a href=".." title="Parent directory" class="_link _l _outline">&middot;&middot;</a>';

  // Open a known directory, and proceed to read its contents
  // echo $directory;
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

      echo '<div class="_mh_x5r _p">';
      if($_SERVER['REQUEST_URI'] != '/') { echo $parentLink.' '; }
      if ($dc) {
        foreach ($dirs as $dir) {
          if ($dir) {
            echo "<a href='$dir' class='_link _l _outline'>$dir</a> ";
          }
        }
      }
      echo '</div>';
      // echo '<hr/>';
      if ($fc) {
        echo '<div class="_mh_x5r _p">';
        foreach ($files as $file) {
          echo "<a href='$file' class='_link _l'>$file</a> ";
        }
        echo '</div>';
      }

      if ($fc + $dc == 0) {
        echo '<p class="_mh"><span class="_b _mono _tc_red">Empty directory</span></p>';
      }
    } else {
      echo '<p class="_mh"><span class="_b _mono _tc_red">Could not open directory</span></p>';
    }
  } else {
    echo '<div class="_mh"><p>';
    echo $parentLink;
    echo '<span class="_b _mono _tc_red _ph">Invalid directory</span>';
    echo '</p></div>';
  }

}

?>
<!DOCTYPE html>
<html class="_html _nojs _scrollbar _a _hidden" id="_html" lang="en">

  <!-- Ace Template v0.1.27 b14 | (c) Copyright 2025 - Techie Joe -->
  <!-- layout:local2025/site/index -->
  
  <head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>" />

    <meta name="author" content="Techie Joe"/>
    <meta name="publisher" content="Tidloo Digital"/>

    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
    <meta id="_color_scheme" name="color-scheme" content="light dark"/>
    <meta id="_theme_color" name="theme-color" content="#222222"/>
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="/ace/icons/apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="/ace/icons/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/ace/icons/favicon-16x16.png"/>
    <link rel="icon" type="image/x-icon" sizes="any" href="/ace/icons/favicon.ico"/>
    <!--[if lt IE 9]><script src="//unpkg.com/html5shiv@3.7.3/dist/html5shiv.min.js"></script><![endif]-->
    <style>
      html{font-family:system-ui,sans-serif}
      body{margin:0}
      ._view{overflow-y:scroll;padding:.5rem}
      ._dark hr{border-color:#666}
    </style>
    <link rel="stylesheet" media="all" href="/ace/assets/css/core_2/html.css?v=0.1.27-14" id="_core_style"/>
    <style>
      #_heading,#_about { display:inline }
      #_heading { font-size:1em }
      #_footer { position:absolute;bottom:0;left:0;right:0;padding-bottom:0; }
      ._footer_layout, ._header_layout { padding:0 }
      ._main_layout, ._page_layout { padding:0 .5rem }
    </style>
  </head>
  <body class="_body" id="_body">
    <div class="_views" id="_views">
      <div class="_view _full_view">
        <div class="_view_layout">
          <header id="_header">
            <div class="_header_layout">
              <nav class="_no_print" id="_topRightNav">
                <div class="_nav_layout"><a class="_link _color _ticon" href="#" title="Change Theme (Ctrl+Alt+T)" onclick="event.preventDefault();theme.change();">☯</a><a class="_link _color" title="Back to previous page" href="/#_back_to_previous_page" onclick="event.preventDefault();window.history.back();">&times;</a>
                </div>
              </nav>
              <?php if(0) { ?>
                <nav class="_color_1 _no_print" id="_navbar">
                  <div class="_nav_layout">
                    <div class="_flex">
                      <div class="_f">
                        <style>
                          #_navlogo {
                            border: 0;
                            padding: .25em 1em;
                            border-radius: 0;
                            margin: 0;
                            line-height: 2;
                            font-size: 1.2em;
                            box-sizing: border-box;
                            width: 100%;
                          }
                        </style><a class="_btnlink" href="/ace/" id="_navlogo"><b class="_tc_contra">Ace</b><b class="_tc_blue">Template</b></a>
                      </div>
                      <div class="_fill" style="flex-basis:20rem">
                      </div>
                    </div>
                  </div>
                </nav>
              <?php } ?>
              <div class="_pageHeader _simpleHeader">
                <h1 class="_h1 _mb0" id="_heading">
                  <a href="/" title="Back to home page" class="_link _l"><?= $heading ?></a>
                </h1>
                <p id="_about" class="_small _mt0" style="padding:0 1.5rem"><?= $description ?></p>
                <hr/>
              </div>
            </div>
          </header>
          <main id="_main">
            <div class="_main_layout">
              <article class="_article">

                <div class="_flex _gap_a_x5">
                  <div class="_fill">
                    
                    <div class="_color_1 _radius_x5r" style="padding:.7rem">
                      <span>localhost<?= $_URI ?></span>
                    </div>
                    
                  </div>
                  <div class="_f" style="flex: 0 0 12rem">
                    <nav class="_color_1 _radius_x5r _clearfix">
                      <div class="_nav_layout _text_right">
                      <a href="/local2025/site/500.html" class="_link _l">500</a><a href="/local2025/site/403.html" class="_link _l">403</a><a href="/local2025/site/404.html" class="_link _l">404</a><a href="404" title="Simulate Real 404" class="_link _l _icon">&bull;</a>
                      </div>
                    </nav>
                  </div>
                </div>
                <hr class="_hidden"/>
                <div class="_flex _gap_a_x5">
                  <div class="_fill directory" style="min-height:250px">
                    <?php

                    // echo "<pre>";
                      // print_r([ '$__DIR__' => $__DIR__ ]);
                      // print_r($_SERVER);
                      // echo "</pre>";
                      
                      renderDirectoryContent($_DIRECTORY);

                    ?>
                  </div>
                  <div class="_f directory" style="flex-basis:20%">
                    <!-- <h3 class="_small">Favourites:</h3> -->
                    <div class="_mh_x5r _p">
                      <!-- <a href='/ace/easymenu' class='_link _l _border'>Ace - EasyMenu&trade;</a> -->
                      <a href='/easymenu' class='_link _l _border'>EasyMenu&trade;</a>
                    </div>
                  </div>
                </div>
              </article>
            </div>
          </main>
          <aside id="_aside">
            <div class="_aside_layout">
            </div>
          </aside>
          <footer id="_footer">
            <div class="_footer_layout">
              <div class="_pageFooter _defaultFooter">

                <hr/>
                <nav class="">
                  <div class="_nav_layout">

                    <div class="_small _mono _b">
                      <span id="jstest" class="_tc_red">[JS]</span>
                      <script>
                        (function(d) {
                          var e = d.getElementById('jstest');
                          e.setAttribute('class', '_tc_green');
                        })(document);
                      </script>
                      <?php
                      echo '<span class="_tc_green">[PHP]</span>';
                      ?>
                      <span id="host_test">[Local]</span>
                      <script>
                        (function(w, d) {
                          var e = d.getElementById('host_test');
                          if (w.location.hostname != 'localhost') {
                            e.innerHTML = '[Live]';
                            e.setAttribute('class', '_tc_orange');
                          }
                        })(window, document);
                      </script>
                    </div>
                
                  </div>
                </nav>

                <div style="margin-left:2em;float:right;">
                  <p class="_small"><a href="https://github.com/techie-joe/local2025" target="github-local2025" class="_link _l"><u>Git Source</u></a></p>
                </div>

                <hr/>
                <p class="_ph_x5r _small _system">&copy; Copyright 2025 - Techie Joe</p>

              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <div class="_widgets" id="_widgets"></div>
    <script type="text/javascript" src="/ace/assets/js/theme_v1.0.js?v=0.1.27-14" defer="defer"></script>
    <!-- IE needs 512+ bytes: https://techie-joe.github.io/library/html5/ie#ie-needs-512-bytes -->

  </body>

</html>