<?php 

  include("template.php");

  $catId  = 0;
  $idxId  = 0;
  $postId = 0;
  $path   = "";
  $link   = "";
  
  /* Get the request params */
  if(isset($_GET["path"]))
  {
    $path  = $_GET["path"];
  }
  
  if(isset($_GET["path"]))
  {
    /* Get the ids from the path */
    GetIds($path, $catId, $idxId, $postId);
    
    /* Get the requested page */
    $link = AddBody($catId, $idxId, $postId);
    
    /* Return the link of the current page as a property in a empty DIV */
    echo '<div><div id="currLinkDiv" class="currLinkDiv" linkStr="' . $link . '" titleStr="' . $postId . '" ></div></div>';
  }
  else if(isset($_GET["randImages"]))
  {
    GetRandomImages();
  }
?>
