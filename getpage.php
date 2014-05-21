<?php 

  include("template.php");
  
  $Debug  = 0;
  $catId  = 0;
  $idxId  = 0;
  $postId = 0;
  
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
    AddBody($catId, $idxId, $postId);
  }
  else if(isset($_GET["randImages"]))
  {
    GetRandomImages();
  }
?>