<?php 

  include("template.php");

  $catId  = 0;
  $idxId  = 0;
  $postId = 0;
  $link   = "";
  
  /* Get the request params */
  if(isset($_GET["category"]))
  {
    $catId  = $_GET["category"];
  }
  if(isset($_GET["index"]))
  {
    $idxId  = $_GET["index"];
  }
  if(isset($_GET["post"]))
  {
    $postId = $_GET["post"];
  }
  
  if(isset($_GET["category"]))
  {
    /* Get the requested page */
    $link = AddBody($catId, $idxId, $postId);
    
    /* Return the link of the current page as a property in a empty DIV */
    echo '<div id="currLinkDiv" class="currLinkDiv" linkStr="' . $link . '" titleStr="' . $postId . '" ></div>';
  }
  else if(isset($_GET["randImages"]))
  {
    GetRandomImages();
  }
?>
