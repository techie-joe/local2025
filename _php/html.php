<?php
function html () {
global
$__BASE__,
$title,
$description,
$author,
$version,
$charset,
$color_scheme,
$lang,
$year,
$style,
$content;

return <<<HTML
<!DOCTYPE html>
<html class="_html _nojs _scrollbar _a _hidden" id="_html" lang="{$lang}">
  <!-- (c) Copyright {$year} - {$author} -->
  <!-- layout: {$__BASE__}/html -->
  <head>
    <meta charset="{$charset}" />
    <title>{$title}</title>
    <meta name="description" content="{$description}" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
    <meta id="_color_scheme" name="color-scheme" content="{$color_scheme}" />
    <style id="_core_style">
      html,body { font-family:system-ui,sans-serif }
      body { margin:.5rem }
      ._hide { display:none }
      ._scrollable { overflow:auto }
      [hidden],._hidden { display:none !important }
      ._invisible { visibility:hidden !important }
      .hr { border:0;border-top:1px solid #888 }
      .isvg svg { max-width:1em;max-height:1em }
    </style>
    <style>
      body{margin:0}
      ._view{overflow-y:scroll;padding:.5rem}
      ._dark hr{border-color:#666}
    </style>
    <link rel="stylesheet" media="all" href="/ace/assets/css/core_2/html.css?v={$version}" id="_core_style" />
    <style>    
      #_heading,#_about { display:inline }
      #_heading { font-size:1em;margin:.25rem }
      #_footer { position:absolute;bottom:0;left:0;right:0;padding-bottom:0; }
      ._header_layout { padding:0 }
      ._footer_layout { padding:0 0 .5rem 0 }
      ._main_layout, ._page_layout { padding:0 .5rem }
    </style>
    <style>{$style}</style>
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="/{$__BASE__}/icons/apple-touch-icon.png?v={$version}"/>
    <link rel="icon" type="image/png" sizes="32x32" href="/{$__BASE__}/icons/favicon-32x32.png?v={$version}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/{$__BASE__}/icons/favicon-16x16.png?v={$version}"/>
    <link rel="icon" type="image/x-icon" sizes="any" href="/{$__BASE__}/icons/favicon.ico?v={$version}"/>
    <!--[if lt IE 9]><script src="//unpkg.com/html5shiv@3.7.3/dist/html5shiv.min.js"></script><![endif]-->
  </head>
  <body class="_body" id="_body">
    {$content}
    <script type="text/javascript" src="/ace/assets/js/theme_v1.0.js?v={$version}" defer="defer"></script>
    <!-- IE needs 512+ bytes: https://techie-joe.github.io/library/html5/ie#ie-needs-512-bytes -->
  </body>
</html>
HTML;
}
?>