<?php 

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
    getPage($catId, $idxId, $postId);
  }
  else if(isset($_GET["randImages"]))
  {
    GetRandomImages();
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
  
  function GetRandomImages()
  {
    global $Debug;
    $startPath = "images/art/photo";
	$imgPath   = "";

	$imagesCount = CountImagesInDir(1, $startPath, 0, 0, $imgPath);

	if($Debug) { echo ' totalImages : ' . $imagesCount . '<br />'; }

    $i = 0;
    $selected = array();

    echo '<div class="imgStrip">';

    while($i < 4)
    {
      $currImgIndex = rand(1, $imagesCount);
      $selectedIndx[$i] = $currImgIndex;

      $j = 0;

      /* Check for duplicates if there are enough to check */
      while(($imagesCount >= 4) && ($j < $i))
      {
        /* If same index already selected */
        if($selectedIndx[$j] == $currImgIndex)
        {
          /* Select a new one */
          $currImgIndex = rand(1, $imagesCount);
          $selectedIndx[$i] = $currImgIndex;
          $j = 0;
        }
        else
        {
          $j++;
        }
      }

      if($Debug) { echo ' currImgIndex : ' . $currImgIndex . '&nbsp;'; }

      $imagesCount = CountImagesInDir(1, $startPath, 0, $currImgIndex, $imgPath);

      echo '<img id="randImages' . $i .'" style="width: 21%; cursor:pointer; margin-left: 1.5%; margin-right: 1.5%; margin-top: 0%; margin-bottom: 0%; border: 2px double grey;" src="'. $imgPath .'" onLoad="ResizeImage(' . $i . ')" onClick="ShowImage(\'' . str_replace("thumbs/", "", $imgPath) . '\', \'Image of the Moment\')" />';

      $i++;
    }

	echo '</div>';
  }  
?>