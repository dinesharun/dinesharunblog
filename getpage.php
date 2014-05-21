<?php 

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
    getPage($catId, $idxId, $postId);
  }

  function getPage($cat, $idx, $post)
  {
    /* Build the post path */
    $postFile = "posts/" . $cat . "/" . $idx . "/" . $post . ".txt";
	
	/* Get the file contents */
    $postData = file_get_contents($postFile);
	
	eval("\$postData = \"$postData\";");
	
	/* If got post the data */
	if($postData != FALSE)
	{
	  echo $postData;
	}
	else
	{
	  echo "No Such Posts Exists!";
	}
  }
?>