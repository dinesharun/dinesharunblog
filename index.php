<?php include("template.php");

  AddHeader(0, "Photography, Animation, Music, Nature & more .......", "Blog, Photography, Blender, Nature, Landscape, Electronics, Animation");

  AddBody(0, 0, 0);

?>

  <table style="width: 100%; margin:0px; padding: 1%;"> <tr>
  <td style="width: 84%; vertical-align: top;">
  <div class="PostDataPlain" style="">

  <span class="firstWord">W</span>elcome to my corner of the web. <br /><br />

  &nbsp; &nbsp; &nbsp; &nbsp; A place dedicated for my pursuit of <a class="InTextLink" href="art/photo/"> recording </a>
  (through photography) or <a class="InTextLink" href="art/anim/"> recreating </a> (through animation)
  the wonders of the natural world in both it's <a class="InTextLink" href="art/nature/"> visual </a> form
  or <a class="InTextLink" href="art/music/"> audible </a> form. Along the lines of the famous quote "Technology Inspires Art,
  Art Challenges Technology", my life follows both.  As a programmer by profession and with a passion for technology, a fascination for nature & history,
  and an artist by soul, I try to find a point where technology and art collide.

  </div>
  </td>

  <td style="padding-left: 1%; width: 15%; vertical-align: top;">
  <div class="PostDataPlain" style="padding: 1.8%; text-align: center; font-family: corbel; font-size: 87%">
  Currently Reading <br /><br />
  <a href="http://www.amazon.co.uk/London-Edward-Rutherfurd/dp/0099551373" target="_blank"> <img style="width: 81%; cursor:pointer; border: 0px;" src="images/bookLondon.jpg" /> <br /><br /></a>
  </div>
  </td></tr></table>

  <h3 style="text-align: center;"> A few Random Images from my <a class="InTextLink" href="art/photo/"> Photography </a> Archive <br /></h3><br />
  <div style="width: 98%; border: 0px; padding: 0%;">
    <?php GetRandomImages(); ?>
  </div>

<?php

  AddFooter(0, 0, 0);

?>