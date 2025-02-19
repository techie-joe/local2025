<?php

$title       = 'Localhost 2025';
$heading     = 'Localhost 2025';
$description = 'Local development environment';

?>
<!DOCTYPE html>
<html class="_nojs _scrollbar _a" id="_html" lang="en"><!-- localhost:index -->

<head>
  <meta charset="utf-8" />
  <title><?= $title ?></title>
  <meta name="description" content="<?= $description ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
  <meta id="_color-scheme" name="color-scheme" />
  <meta id="_theme-color" name="theme-color" content="#222222" />
  <!--[if lt IE 9]><script src="//unpkg.com/html5shiv@3.7.3/dist/html5shiv.min.js"></script><![endif]-->
  <style>
    html {
      background-color: #ddd;
      color: #666;
    }

    /* light theme - (default) */
    @media (prefers-color-scheme: dark) {
      html {
        background-color: #222;
        color: #999;
      }
    }

    /* dark theme */
  </style>
  <link rel="stylesheet" media="all" href="/local2025/assets/css/ace.css?v=0.1.12&b=164.16" />
  <link rel="stylesheet" media="all" href="/local2025/assets/css/style.css?v=0.1.12&b=164.16" />
  <style>
  </style>
</head>

<body id="_body">
  <div id="_contents">
    <div class="_view">
      <div class="_view_layout">
        <header id="_header">
          <div class="_header_layout">
            <h1 class="_h1" id="_heading"><a href="/" class="__a _hover-link"><?= $heading ?></a></h1>
            <p class="_small" id="_about"><?= $description ?></p>
            <hr />
          </div>
        </header>
        <div class="_page_layout" id="_pageData">

          <div class="_mono _small _b">
            <a title="Back to previous page" class="_nav-item" onclick="event.preventDefault();window.history.back();">← Back</a>
            <a href=".." title="Parent directory" class="_nav-item _nav-icon">●</a>
            <a href="/" title="Go to home page" class="_nav-item">Home</a>
            <a title="Change theme" class="_nav-item _nav-icon" onclick="event.preventDefault();base.theme.change();">☀</a>
            <a href="/404.html" class="_nav-item">404</a>
            <a href="404" title="Simulate Real 404" class="_nav-item _nav-icon">⊘</a>
          </div>
          <hr />

          <div class="_pre _b">
            <div class="_p">
              <?php

              function match_dir($directory, $file)
              {
                // Directory to be excluded
                $exclude = '/^[._]|^(node_modules)$/';
                if ($_SERVER['REQUEST_URI'] == '/') {
                  $exclude = '/^[._]|^(node_modules)$/';
                }
                return is_dir($directory . $file)
                  && preg_match($exclude, $file) === 0;
              }

              function match_file($file)
              {
                // Files to be included only
                $exclude = '/^(404\.html?|index\.(html?|php))$/';
                $include = '/^(.*)\.(html?|php|s?css|js(on)?|txt|md)$/';
                return preg_match($include, $file)
                  && preg_match($exclude, $file) === 0;
              }

              // Directory path to be listed
              $directory = isset($directory) ? $directory : './';

              // echo '<div>' . $directory . '</div>';
              // echo '<div><span class="_nav-label">' . $_SERVER['REQUEST_URI'] . '</span></div>';

              // Open a known directory, and proceed to read its contents
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

                  if ($dc) {
                    echo '<div>';
                    foreach ($dirs as $dir) {
                      if ($dir) {
                        echo "<a href='$dir' class='_nav-item'>$dir</a> ";
                      }
                    }
                    echo '</div>';
                    echo '<hr/>';
                  }

                  if ($fc) {
                    echo '<div>';
                    foreach ($files as $file) {
                      echo "<a href='$file' class='_nav-item'>$file</a> ";
                    }
                    echo '</div>';
                  }

                  if ($fc + $dc == 0) {
                    echo '<p><span class="_nav-label _tc_red">Empty</span></p>';
                  }
                } else {
                  echo '<p><span class="_nav-label _tc_red">Could not open directory</span></p>';
                }
              } else {
                echo '<p><span class="_nav-label _tc_red">Invalid directory</span></p>';
              }

              ?>
            </div>
          </div>
          <hr />
          <div class="_p _pre _b">
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
          <hr />
        </div>
        <footer id="_footer">
          <div class="_footer_layout">
          </div>
        </footer>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="/local2025/assets/cjs/thm.js?v=0.1.12&b=164.16" defer="defer"></script>
  <!-- IE needs 512+ bytes: https://techie-joe.github.io/library/html5/ie#ie-needs-512-bytes -->
</body>

</html>