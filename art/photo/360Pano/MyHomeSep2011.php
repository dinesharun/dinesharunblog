<?php include("../../../template.php");

  AddHeader(3, "360 Panorama - My Home", "Blog, Photography, Blender, Nature, Landscape, Electronics, Animation");

  AddBody(1, 1, 2);

?>

<h2> 360 Degree Panaroma of My Home </h2>

<br />



<script type="text/javascript">
   var param = {wmode: "transparent"};
   swfobject.embedSWF("pano.swf", "swfContent", "100%", "600", "9.0.0", "", "", param, "", "");
</script>

<div style="width: 100%; border: 3px solid rgb(0, 0, 0); z-index: 0; padding: 0px">

<div id="swfContent" > </div>

</div>

<br /><br />

<?php

  AddFooter(1, 1, 2);

?>
