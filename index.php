<?php

include "_config.php";
include "_php/main.php";
include "_php/html.php";

$style = <<<CSS
.header { line-height: 0 }
.heading,.description {
  display: inline-block;
  vertical-align: middle;
  margin: 0;
  font-size: 1em;
  line-height: 1em;
}
.description {
  font-size: .8em;
  margin-left: 1em;
  color: #888C;
}
#_directory ._link,
#_favourites ._link,
#_files ._link { margin:.25em .2em }
#_directory ._link {
  border: 2px solid rgba(197,117,31,.74);
  background-color: rgba(255,184,108,.14);
  display: inline-block;
  box-sizing: border-box;
  position: relative;
  margin:.4rem .2em;
}
#_directory ._link::before {
  content: '';
  display: block;
  width: 50%;
  height: 5px;
  position: absolute;
  border-top: 5px solid #a36623;
  top: -6px;
  left: 2px;
  border-radius: 5px;
}
._flex { display:flex }
._gap_a { gap:1rem }
._full { flex:12 0 100% }
._fill { flex:12 1 0 }
CSS;

/*
$pre = <<<HTML
<pre>

<b>build: 7</b>

\$__ROOT__: $__ROOT__
\$__BASE__: $__BASE__

\$_DIR    : $_DIR
\$_URI    : $_URI

\$_HOST   : $_HOST

</pre>
<hr />
HTML;
*/

$directory  = getDirectoryContent($_DIR);

$favourites = ''; if($_URI === '/') { $favourites = <<<HTML
<style>
#_favourites ._link {
  border-width:2px;
  border-style:solid;
}
#_favourites ._link.special {
  color: black !important;
  background-color: #e8a049;
  border-color: transparent;
}
</style>
<nav id="_favourites" class="_f featured" style="flex-basis:30%">
  <h3 class="_h7 _mv_x5r">Favourite</h3>
  <div class="_ma_x5r _idiv">
    <a href='/core-dev/x' class='_link _l _border special'>Core</a>
    <a href='/nova/site' class='_link _l _border special'>Nova</a>
    <a href='/neo' class='_link _l _border'>Neo</a>
    <a href='/segio/site' class='_link _l _border'>Segio</a>
    <a href='/tidloo/dev/manual' class='_link _l _border'>Tidloo</a>
    <a href='/test-sites' class='_link _l _border'>Test Sites</a>
    <a href='/styles' class='_link _l _border'>Styles</a>
  </div>
  <h3 class="_h7 _mb_x5r">Featured</h3>
  <div class="_ma_x5r _idiv">
    <a href='/ace' class='_link _l _border'>Ace</a>
    <a href='/ace/easymenu' class='_link _l _border'>EasyMenu&trade;</a>
    <a href='/ace/themejs' class='_link _l _border'>ThemeJS&trade;</a>
    <a href='/ace/vanamir' class='_link _l _border'>Vanamir</a>
  </div>
  <h3 class="_h7 _mb_x5r">Tools</h3>
  <div class="_ma_x5r _idiv">
    <a href='/{$__BASE__}/phpinfo.php' class='_link _l _border'>PHP Info</a>
    <a href='/phpMyAdmin' class='_link _l _border'>PHP MyAdmin</a>
  </div>
</nav>
HTML;}

$content = <<<HTML
<div class="_views" id="_views">
  <div class="_view _full_view">
    <div class="_view_layout">
      <header id="_header">
        <div class="_header_layout">
          <nav class="_no_print" id="_topRightNav">
            <div class="_nav_layout"><a class="_link _color _ticon" href="#" title="Change Theme (Ctrl+Alt+T)" onclick="event.preventDefault();theme.change();">☯</a><a class="_link _color" title="Back to previous page" href="/#_back_to_previous_page" onclick="event.preventDefault();window.history.back();">&times;</a>
            </div>
          </nav>
          <div class="_pageHeader _simpleHeader">
            <h1 class="_h1 _mb0" id="_heading">
              <a href="/" title="Back to home" class="_link _l">{$heading}</a>
            </h1>
            <p id="_about" class="_small _mt0">{$description}</p>
            <hr/>
          </div>
        </div>
      </header>
      <main id="_main">
        <div class="_main_layout">
          <article class="_article _flex _gap_a">
            <div class="_fill">

              <div class="_color_1 _radius" style="padding:.5rem">
                <span>🔍</span>
                <span>{$_HOST}{$_URI}</span>
              </div>

              <nav class="directory" style="min-height:250px">
                {$directory}
              </nav>

            </div>
            {$favourites}
          </article>
        </div>
      </main>
      <footer id="_footer" class="_color">
        <div class="_footer_layout">
          <div class="_pageFooter _defaultFooter">
            <hr/><p class="_ph_x5r _small _system">&copy; Copyright {$year} - {$author}</p>
          </div>
        </div>
      </footer>
    </div>
  </div>
</div>
HTML;

echo html();
?>