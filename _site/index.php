<?php

$title = 'Localhost';

?>
<!DOCTYPE html>
<html class="_nojs _scrollbar _a" id="_html" lang="en"><!-- localhost:index -->

<head>
  <meta charset="utf-8"/>
  <title><?= $title ?></title>
  <meta name="description" content="Sorry, the item you are trying to view does not exist."/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
  <meta id="_color-scheme" name="color-scheme"/>
  <meta id="_theme-color" name="theme-color" content="#222222"/>
  <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="/ace/icons/apple-touch-icon.png"/>
  <link rel="icon" type="image/png" sizes="32x32" href="/ace/icons/favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="/ace/icons/favicon-16x16.png"/>
  <link rel="icon" type="image/x-icon" sizes="any" href="/ace/icons/favicon.ico"/><!--[if lt IE 9]><script src="//unpkg.com/html5shiv@3.7.3/dist/html5shiv.min.js"></script><![endif]-->
  <style>
    html { background-color: #ddd; color: #666; } /* light theme - (default) */
    @media (prefers-color-scheme: dark) { html { background-color: #222; color: #999; } } /* dark theme */
    
  </style>
  <link rel="stylesheet" media="all" href="/ace/assets/css/ace.css?v=0.1.12&b=164.16"/>
  <link rel="stylesheet" media="all" href="/ace/assets/css/demo.css?v=0.1.12&b=164.16"/>
  <style>.nav-button { min-width: 10rem; }</style>
</head>

<body id="_body">
  <div id="_contents">
    <div class="_view">
      <div class="_view_layout">
        <header id="_header">
          <div class="_header_layout">
            <h1 class="_h1" id="_heading"><?= $title ?>
            </h1>
            <hr>
          </div>
        </header>
        <div class="_page_layout" id="_pageData">
          <aside>
            <div class="_pre_layout">
              <div class="_pre">

                <ul class='_b'>
                  <li><a href="404" class="_nav-item">404</a></li>
                  <?php

                    // Directory path to be listed
                    $directory = './';

                    // Open a known directory, and proceed to read its contents
                    if (is_dir($directory)) {
                      if ($dh = opendir($directory)) {
                        while (($file = readdir($dh)) !== false) {
                          if ($file != "." && $file != ".." && is_dir($file) && preg_match('/^[._]/', $file) === 0) {
                            // Display file name as hyperlink
                            echo "<li><a href='$file' class='_nav-item'>$file</a></li>";
                          }
                        }
                        closedir($dh);
                      } else {
                        echo "<li><span class='_nav-label'>Could not open directory.</span></li>";
                      }
                    } else {
                      echo "<li><span class='_nav-label'>Invalid directory.</span></li>";
                    }

                  ?>
                </ul>

              </div>
            </div>
          </aside>
        </div>
        <footer id="_footer">
          <div class="_footer_layout">
          </div>
        </footer>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="/ace/assets/cjs/thm.js?v=0.1.12&b=164.16" defer="defer"></script>
  <!-- IE needs 512+ bytes: https://techie-joe.github.io/library/html5/ie#ie-needs-512-bytes -->
</body>

</html>