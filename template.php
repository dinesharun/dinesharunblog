<?php 
  include("links.php");

  $enableComments = 0;

  $catStrs = array(array('', 'art', 'tech', 'gen', '', ''),
                   array('', 'photo', 'anim', 'music', 'nature', 'travel'),
                   array('', 'pgm', 'elec', 'bio', 'web', ''),
                   array('', 'enter', 'history', 'spirit', 'rand', 'abtme')
                   );

  $catFullStrs = array(array('', 'Art', 'Technology', 'General', '', ''),
                       array('Art', 'Photography', 'Animation', 'Music', 'Nature', 'Travel'),
                       array('Technology', 'Programming', 'Electronics', 'Biology', 'Webdesign', ''),
					   array('', 'Entertainment', 'History', 'Spirituality', 'Random Topics', 'About Me')
                      );

  $bgImg = array( array('images/photo.png', 'images/art.png', 'images/tech.png'),
                  array('images/art.png', 'images/photo.png', 'images/anim.png', 'images/music.png', 'images/nature.png', 'images/travel.png'),
				  array('images/tech.png', 'images/pgm.png', 'images/elec.png', 'images/bio.png', 'images/web.png'),
				  array('images/photo.png', 'images/enter.png', 'images/history.png', 'images/spritual.png', 'images/rand.png', 'images/home.png')
				 );

  $totalQuotes = 8;
  $quotes = array( array('You dont take a photograph, you make it', 'Ansel Adams'),
                   array('There are no rules for good photographs, there are only good photographs.', 'Ansel Adams'),
				   array('A photograph is a portrait painted by the sun', 'unknown'),
				   array('A work of art which did not begin in emotion is not art', 'Paul Cezanne'),
				   array('Great art picks up where nature ends', 'Marc Chagall'),
				   array('Art is not what you see, but what you make others see', 'Edgar Degas'),
				   array('A Good artist has less time than ideas', 'Martin Kippenberger'),
				   array('I saw the angel in the marble and carved until I set him free', 'Michelangelo')
                  );

  $TestMode = 1;
  $Debug = 1;
  $pathPrefix;
  $currDepth;
  $totalImages;

  function AddHeader($depth, $title, $keywords)
  {
     global $pathPrefix;
     global $currDepth;

     $pathPrefix = "";
     $i = 0;

     while($i < $depth)
     {
       $pathPrefix .= "../";
       $i++;
     }

     $currDepth = $depth;

     echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
     echo '<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->';
     echo '<html xmlns="http://www.w3.org/1999/xhtml">';
     echo '<head>';

     echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
     echo '<meta name="Description" content="Personal Blog of Dinesh Arun.K." />';

     echo '<meta name="Keywords" content=" ' . $keywords . ' " />';
     echo '<title> ' . $title . ' </title>';

     echo '<link rel="stylesheet" type="text/css" href="' . $pathPrefix . 'css/main.css" />';
	 echo '<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet" type="text/css">';
	 echo '<link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet" type="text/css">';
	 echo '<link href="https://fonts.googleapis.com/css?family=Emblema+One" rel="stylesheet" type="text/css">';
	 echo '<link href="https://fonts.googleapis.com/css?family=Combo" rel="stylesheet" type="text/css">';
     echo '<script type="text/javascript" src="' . $pathPrefix . 'scripts/main.js"></script>';
     echo '<script type="text/javascript" src="' . $pathPrefix . 'scripts/jquery.js"></script>';
     echo '<script type="text/javascript" src="' . $pathPrefix . 'scripts/showImage.js"></script>';

	 echo '<script type="text/javascript" src="' . $pathPrefix . 'scripts/galleria.js"></script>';
	 echo '<script type="text/javascript" src="' . $pathPrefix . 'scripts/swfobject.js"></script>';

     echo '</head>';

     echo '<body onload="StartScripts()" onresize="resizeMe()">';

     echo '<div class="stageBG"  Id="StageBG">   </div>';
     echo '<div class="stageImg" Id="StageImg" align="center">  </div>';
     echo '<div class="topBar">';
     echo '  <table style="margin: 0px; margin-left: 9%; padding: 0px;width: 33%;">';
     echo '    <tr style="margin: 0px; padding: 0px;">';
     echo '      <td style="font-size: 210%;"> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td style="font-size: 210%;"> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td style="font-size: 210%;"> &nbsp; &nbsp; &nbsp; </td>';
     echo '    </tr>';
     echo '  </table>';
     echo '  <table style="position: fixed; top: 3px; left: 0px; margin: 0px; margin-left: 42%; padding: 0px;width: 58%;">';
     echo '    <tr style="margin: 0px; padding: 0px;">';
     echo '      <td class="topImageDisabled"> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td class="topImageDisabled"> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td class="topImageDisabled"> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td class="topImageDisabled"> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td class="topImageDisabled"> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td class="topImageDisabled"> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td class="topImageDisabled"> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td class="topImageDisabled"> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td class="topImageDisabled"> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td class="topImageDisabled"> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td class="topImageDisabled"> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td class="topImageDisabled"> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td class="topImage"> <a class="topILink" href="https://plus.google.com/117144638090915831878?rel=author" target="_blank"> <img style="width: 99%; border: 0px;" src="' . $pathPrefix . 'css/images/googleplus.png" /> </a> </td>';
     echo '      <td class="topImage"> <a class="topILink" href="http://www.orkut.co.in/Main#Profile?uid=7117684347204734942" target="_blank"> <img style="width: 99%; border: 0px;" src="' . $pathPrefix . 'css/images/orkut.png" /> </a> </td>';
     echo '      <td class="topImage"> <a class="topILink" href="https://twitter.com/#!/dinesharun" target="_blank"> <img style="width: 99%; border: 0px;" src="' . $pathPrefix . 'css/images/twitter.png" /> </a> </td>';
     echo '      <td class="topImage"> <a class="topILink" href="http://www.facebook.com/dinesharunk" target="_blank"> <img style="width: 99%; border: 0px;" src="' . $pathPrefix . 'css/images/facebook.png" /> </a> </td>';
     echo '      <td colspan="2" class="topClock" id="clk"> 22-05-2012 <br /> 11:30 </td>';
     echo '    </tr>';
     echo '  </table>';
     echo '</div>';
     echo '  <table style="z-index: 15; position: fixed; top: -3px; left: 0px; margin: 0px; margin-left: 9%; padding: 0px;width: 33%;">';
     echo '    <tr style="margin: 0px; padding: 0px;">';
     echo '      <td class="toplargeButton"> <a class="toplbLink" onclick="getPage(0, 0, 0)"> Home </a> </td> <td> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td class="toplargeButton"> <a class="toplbLink" onclick="getPage(1, 0, 0)"> Art </a> </td> <td> &nbsp; &nbsp; &nbsp; </td>';
     echo '      <td class="toplargeButton"> <a class="toplbLink" onclick="getPage(2, 0, 0)"> Technology </a> </td> <td> &nbsp; &nbsp; &nbsp; </td>';
     echo '    </tr>';
     echo '  </table>';
	 
	 echo '<div class="contentFrame" id="contentFrame">';
  }

  function getPage($cat, $idx, $post)
  {
    /* Build the post path */
    $postFile = "posts/" . $cat . "/" . $idx . "/" . $post . ".txt";
	
	/* Get the file contents */
    $postData = file_get_contents($postFile);
	
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
  
  function AddBody($cat, $idx, $post)
  {
    global $pathPrefix;
	global $currDepth;
	global $bgImg;
	global $quotes;
   	global $totalQuotes;
	global $enableComments;	

	echo '<div class="centerBlock">';
	
	/* Home section */
    if($cat == 0)
    {
      echo '<div class="header">';
      echo '  <a class="mainLinksCurr"> <span class="hMenuCurr" style="right: -2%;"> &nbsp; &nbsp;<img class="menuImg" alt="" src="' . $pathPrefix . 'images/home.png"/> Home &nbsp; &nbsp; </span> </a>';
      echo '  <a class="mainLinks" href="' . $pathPrefix . 'art/"> <span class="hMenu" style="right: -2%;">  <img class="menuImg" alt="" src="' . $pathPrefix . 'images/art.png"/> Art </span> </a> ';
      echo '  <a class="mainLinks" href="' . $pathPrefix . 'tech/"> <span class="hMenu" style="right: -2%;"> <img class="menuImg" alt="" src="' . $pathPrefix . 'images/tech.png"/> Technology </span> </a> ';
      echo '</div>';
    }
	/* Art Section */
    else if($cat == 1)
    {
      echo '<div class="header">';
      echo '  <a class="mainLinks' . (($idx==0)?('Curr'):('')) . '" href="' . $pathPrefix . 'art/"> <span class="hMenu' . (($idx==0)?('Curr'):('')) . '" style="right: -2%;">  <img class="menuImg" alt="" src="' . $pathPrefix . 'images/art.png"/> Art </span> </a> ';
      echo '  <a class="mainLinks' . (($idx==1)?('Curr'):('')) . '" href="' . $pathPrefix . 'art/photo/"> <span class="hMenu' . (($idx==1)?('Curr'):('')) . '" style="right: -1%;"> <img class="menuImg" alt="" src="' . $pathPrefix . 'images/photo.png"/> Photography </span> </a> ';
      echo '  <a class="mainLinks' . (($idx==2)?('Curr'):('')) . '" href="' . $pathPrefix . 'art/anim/"> <span class="hMenu' . (($idx==2)?('Curr'):('')) . '" style="right: 0%;"> <img class="menuImg" alt="" src="' . $pathPrefix . 'images/anim.png"/> Animation </span> </a> ';
      echo '  <a class="mainLinks' . (($idx==3)?('Curr'):('')) . '" href="' . $pathPrefix . 'art/music/"> <span class="hMenu' . (($idx==3)?('Curr'):('')) . '" style="right: 1%;"> <img class="menuImg" alt="" src="' . $pathPrefix . 'images/music.png"/> Music </span> </a> ';
      echo '  <a class="mainLinks' . (($idx==4)?('Curr'):('')) . '" href="' . $pathPrefix . 'art/nature/"> <span class="hMenu' . (($idx==4)?('Curr'):('')) . '" style="right: 2%;"> <img class="menuImg" alt="" src="' . $pathPrefix . 'images/nature.png"/> Nature </span> </a> ';
      echo '  <a class="mainLinks' . (($idx==5)?('Curr'):('')) . '" href="' . $pathPrefix . 'art/travel/"> <span class="hMenu' . (($idx==5)?('Curr'):('')) . '" style="right: 3%;"> <img class="menuImg" alt="" src="' . $pathPrefix . 'images/travel.png"/> Travel </span> </a> ';
      echo '</div>';
    }
	/* Tech Section */
    else if($cat == 2)
    {
      echo '<div class="header">';
      echo '  <a class="mainLinks' . (($idx==0)?('Curr'):('')) . '" href="' . $pathPrefix . 'tech/"> <span class="hMenu' . (($idx==0)?('Curr'):('')) . '" style="right: -2%;"> <img class="menuImg" alt="" src="' . $pathPrefix . 'images/tech.png"/> Technology </span> </a> ';
      echo '  <a class="mainLinks' . (($idx==1)?('Curr'):('')) . '" href="' . $pathPrefix . 'tech/pgm/"> <span class="hMenu' . (($idx==1)?('Curr'):('')) . '" style="right: -1%;"> <img class="menuImg" alt="" src="' . $pathPrefix . 'images/pgm.png"/> Programming </span> </a> ';
      echo '  <a class="mainLinks' . (($idx==2)?('Curr'):('')) . '" href="' . $pathPrefix . 'tech/elec/"> <span class="hMenu' . (($idx==2)?('Curr'):('')) . '" style="right: 0%;"> <img class="menuImg" alt="" src="' . $pathPrefix . 'images/elec.png"/> Electronics </span> </a> ';
      echo '  <a class="mainLinks' . (($idx==3)?('Curr'):('')) . '" href="' . $pathPrefix . 'tech/bio/"> <span class="hMenu' . (($idx==3)?('Curr'):('')) . '" style="right: 1%;">  <img class="menuImg" alt="" src="' . $pathPrefix . 'images/bio.png"/> Biology </span> </a> ';
      echo '  <a class="mainLinks' . (($idx==4)?('Curr'):('')) . '" href="' . $pathPrefix . 'tech/web/"> <span class="hMenu' . (($idx==4)?('Curr'):('')) . '" style="right: 2%;"> <img class="menuImg" alt="" src="' . $pathPrefix . 'images/web.png"/> Webdesign </span> </a> ';
      echo '</div>';
    }
	/* Default: Home Section */
    else
    {
      echo '<div class="header">';
      echo '<a class="mainLinks" href="' . $pathPrefix . '"> <span class="hMenu" style="right: -2%;"> &nbsp; &nbsp; <img class="menuImg" alt="" src="' . $pathPrefix . 'images/home.png"/> Home &nbsp; &nbsp;  </span> </a>';
      echo '  <a class="mainLinks" href="' . $pathPrefix . 'art/"> <span class="hMenu" style="right: -2%;">  <img class="menuImg" alt="" src="' . $pathPrefix . 'images/art.png"/> Art </span> </a> ';
      echo '  <a class="mainLinks" href="' . $pathPrefix . 'tech/"> <span class="hMenu" style="right: -2%;"> <img class="menuImg" alt="" src="' . $pathPrefix . 'images/tech.png"/> Technology </span> </a> ';
      echo '</div>';
    }

	/* Background thumbnail image for every category and index */
    echo'<div class="bodyBGImgDiv"><img class="bodyImg" alt="" src="' . $pathPrefix . $bgImg[$cat][$idx] . '"/> </div>';

	/* Post date addition */
    if(($idx != 0) && ($post != 0))
    {
      InitLinkIdx($cat, $idx, ($post-1));
      echo '<div class="dateTimeDiv">' . GetLinkParam(6) . ' </div>';
    }

	/* Main post panel */
    echo '<div class="mainPanel" id="mp">';
	
	/* Get the actual post from the data file */
	getPage($cat, $idx, $post);

	/* Recent post list for all categories in root except about me */
    if(($post == 0) && (!(($cat == 3) && ($idx == 5))))
    {
      GetRecentPosts($cat, $idx, $currDepth, 5);
    }

	/* Comments for posts if enabled */
    if(($post != 0) && ($enableComments != 0))
    {
      AddCommentSection($cat, $idx, $post);
    }
	
	echo '</div>';

	/* Right hand side image */
	$rightImg = $pathPrefix . 'images/index_header_' . $cat . '_' . $idx . '_' . $post . '.png';
	
	/* Post Specific image not present, check group specific file present */
	if((file_exists($rightImg)) == false)
	{
	  $rightImg = $pathPrefix . 'images/index_header_' . $cat . '_' . $idx . '_0' . '.png';

	  /* Default to home pages image */
	  if((file_exists($rightImg)) == false)
	  {
	    $rightImg = $pathPrefix . 'images/index_header_0_0_0.png';
	  }
	}
    echo '<img class="rightImg" src="' . $rightImg . '" />';

	/* Right side list of links */
    GetPostLinks($cat, $idx, $post);

	/* There is no need for fotter current link if the category is not general */
    if($cat != 3) { $idx = 0; }

	/* Fotter section (general) */
    echo '<a name="fotter"></a>';
    echo '<div class="fotter">';
    echo '   <a class="mainLinks' . (($idx==1)?('Curr'):('')) . '" href="' . $pathPrefix . 'gen/enter/#fotter"> <span class="fMenu' . (($idx==1)?('Curr'):('')) . '" style="right: -2%;"> <img class="menuImgBottom" alt="" src="' . $pathPrefix . 'images/enter.png"/> Entertainment </span> </a>';
    echo '   <a class="mainLinks' . (($idx==2)?('Curr'):('')) . '" href="' . $pathPrefix . 'gen/history#fotter"> <span class="fMenu' . (($idx==2)?('Curr'):('')) . '" style="right: -1%;"> <img class="menuImgBottom" alt="" src="' . $pathPrefix . 'images/history.png"/> History </span> </a>';
    echo '   <a class="mainLinks' . (($idx==3)?('Curr'):('')) . '" href="' . $pathPrefix . 'gen/sprit/#fotter"> <span class="fMenu' . (($idx==3)?('Curr'):('')) . '" style="right: 0%;"> <img class="menuImgBottom" alt="" src="' . $pathPrefix . 'images/spritual.png"/> Spritual </span> </a>';
    echo '   <a class="mainLinks' . (($idx==4)?('Curr'):('')) . '" href="' . $pathPrefix . 'gen/rand/#fotter"> <span class="fMenu' . (($idx==4)?('Curr'):('')) . '" style="right: 1%;"> <img class="menuImgBottom" alt="" src="' . $pathPrefix . 'images/rand.png"/> Random Thoughts </span> </a>';
    echo '   <a class="mainLinks' . (($idx==5)?('Curr'):('')) . '" href="' . $pathPrefix . 'gen/abtme/#fotter" rel="author"> <span class="fMenu' . (($idx==5)?('Curr'):('')) . '" style="right: 2%;"> <img class="menuImgBottom" alt="" src="' . $pathPrefix . 'images/home.png"/> About me </span> </a>';
    echo '</div>';

    echo '<br /><br /><br /><br /><br />';

    echo '</div>'; /* End of main panel */

	/* Ramdom quation at the top */
    $indx = rand(0, $totalQuotes-1);
    echo '<div class="bodyBGHeading"> "' . $quotes[$indx][0] . '" <br />';
    echo '<span style="font-size: 69%;"> - ' . $quotes[$indx][1] .  ' </span></div>';	
  }

  function AddFooter($cat, $idx, $post)
  {
    echo '</div>'; /* End of content frame */
	
	/* Bottom frame */
    echo '<div class="bottomBar">';

    echo '  <table style="width:100%;text-align:center;padding:0px;">';
    echo '    <tr style="width:99%">';
	echo '      <td style="width:20%;"> ';
	echo '      </td>';
    echo '      <td style="width:65%;text-align:center;font-size:69%;color:rgb(210, 210, 210);">';
    echo '         All the content presented here are my personal works if unless otherwise specified. <br />';
    echo '         If you find any of the content not presentable or offsensive or copyrighted, kindly report';
    echo '         to <a Class="InTextLink" href="mailto:dinesh.arun@rediffmail.com"> me here </a>';
    echo '         Also your feedback and suggestions are welcome.<br />';
    echo '       </td>';
	echo '      <td style="width:15%;text-align:center;font-size:75%;color:rgb(210, 210, 210);"> ';
	echo '          Site best viewed in any mordern browsers with a resolution more than 1280x768 ';
	echo '      </td>';
    echo '     </tr>';
    echo '  </table>';

    echo '</div>';
    echo '</body>';

    echo '</html>';
  }
  
  function GetRandomImages()
  {
    global $Debug;
    $startPath = "images/art/photo/";
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
  
  function countImagesInDir($firstCall, $path, $thumbDir, $imageIndx, &$selectedFile)
  {
    global $Debug;
	global $totalImages;
	$newPath = "";

    if($firstCall == 1)
    {
      $totalImages = 0;
    }

	if(is_dir($path))
	{
	  if($currDir = opendir($path))
	  {
		while(($file = readdir($currDir)) != false)
        {
		  $newPath = $path . '/' . $file;
		  
		  if($Debug) { echo "filename:" . $file . ", filetype: " . filetype($newPath) . "<br />"; }

		  if((filetype($newPath) == 'dir') && (($file != '.') && ($file != '..')))
		  {
		    if($file == "thumbs")
			{
              countImagesInDir(0, $newPath, 1, $imageIndx, $selectedFile);
			}
			else
			{
              countImagesInDir(0, $newPath, 0, $imageIndx, $selectedFile);
			}
		  }
		  else
		  {
		    if(((filetype($newPath) == 'file')) && ($thumbDir == 1))
			{
			  if((substr_count($newPath, '.jpg') > 0) ||
			     (substr_count($newPath, '.JPG') > 0))
			  {
		        $totalImages++;

				if($totalImages == $imageIndx)
				{
				  $selectedFile = $newPath;
				}

				if($Debug)
				{ echo ' Selected File : ' . $newPath . '<br />'; }
		      }
			}
		  }
		}
	  }
	  else
	  {
	    if($Debug) { echo "Open Dir Failure"; }
	  }
	  closedir($currDir);
    }
	else
	{
	  if($Debug) { echo "Path:" . $path . "is not a Dir"; }
	}

	return $totalImages;
  }
  
  function AddCommentSection($cat, $idx, $post)
  {
    echo '<div class="CommentDIV"><h4> Comments </h4>';

    /* A Post is previously submitted add it */
    if(array_key_exists("Title", $_POST))
    {
      Comment(1, $cat, $idx, $_POST["postID"], $_POST["Title"], $_POST["comment"], $_POST["Name"], $_POST["email"], 0);
    }

    /* Start the comments block */
    Comment(0, $cat, $idx, $post, "", "", "", "", 0);

    echo '<form method="post" id="Comment" class="CommentForm">';
    echo '<h4> Leave a Comment : <br /></h4>';
    echo '<input class="CommentField" name="Title" type="input"></input> <<< Give a title for your comment <br />';
    echo '<input class="CommentField" name="Name" type="input"></input> <<< Enter your name <br />';
    echo '<input class="CommentField" name="email" type="input"></input> <<< Enter your Email ID (Optional)<br />';
    echo '<textarea class="CommentArea" cols="54" rows="9" name="comment"></textarea> <<< Put your thoughts down! <br />';
    echo '<input name="subIndx" type="hidden" value=' . $idx . ' />';
    echo '<input name="postID" type="hidden" value=' . $post . ' />';
    echo '<button class="CommentBtn" name="PostComment" onclick="PostComment()">Post</button><br />';
    echo '</form>';

    echo '</div><br /><br />';
  }

  function GetPostLinks($cat, $idx, $post)
  {
    $prefix = "";

    InitLinkIdx($cat, $idx, $post);

    if($post != 0)
    {
      $prefix = "../";
    }

    $num = GetLinkParam(0);

    for($i=0;$i<$num;$i++)
    {
      if($i == 0)
      {
        echo '<div class="rightPanel" id="rp">';
        echo '<br /><br />';
      }

      InitLinkIdx($cat, $idx, $i);

      $enabled = GetLinkParam(8);

      if ($enabled != 0)
      {
        echo '<a class="PostLinks" href="' . $prefix . GetLinkParam(1) . '">' . GetLinkParam(2) . ' </a> <br />';;
      }
    }

    if($num != 0)
    {
      echo '<br /><br />';
      echo '</div>';
    }
  }

  function GetRecentPosts($cat, $idx, $depth, $count)
  {
    global $catStrs;
	global $catFullStrs;
    $selCat = $cat;
	$selIdx = $idx;
	$numPosts = 0;
	$postIdx = 0;
	$urlPrefix = "";
    $selPosts = array();
    $numSel = 0;
    $totalTries = 0;

	echo '<h2>' . $catFullStrs[$cat][$idx] . '</h2>';

  	for($i=0;$i<$count;$i++)
	{
      $totalTries++;

      do
	  {
	      if($cat == 0)
	      {
	        $selCat = rand(1, 3);
	      }
	      if($idx == 0)
	      {
	        $selIdx = rand(1, 5);
	      }

	      InitLinkIdx($selCat, $selIdx, 0);

	      $numPosts = GetLinkParam(0);

      }while(($numPosts == 0) && ($idx == 0));

      if(($idx != 0) && ($numPosts == 0))
      {
         echo '<div class="PostDataPlain" > Work in progress <br />';
         break;
      }
      else if(($idx != 0) && ($numSel == $numPosts))
      {
        break;
      }
      else if($totalTries >= 1000)
      {
        break;
      }
      else
      {
        $postIdx = rand(0, $numPosts-1);

        if(IsPostSelected($selPosts, $numSel, $selCat, $selIdx, $postIdx) == true)
        {
          $i--;
        }
        else
        {
          SetSelectedPost($selPosts, $numSel, $selCat, $selIdx, $postIdx);

          InitLinkIdx($selCat, $selIdx, $postIdx);

          if($i == 0)
          {
            echo '<div class="PostDataPlain" > <h3 style="text-align:center"> Random Topics </h3> <br /> ';
          }

	        if($depth == 0)
	        {
	          $urlPrefix = $catStrs[0][$selCat];
	          $urlPrefix .= '/';
	          $urlPrefix .= $catStrs[$selCat][$selIdx];
	          $urlPrefix .= '/';
	        }
	        else if($depth == 1)
	        {
	          $urlPrefix = $catStrs[$selCat][$selIdx];
	          $urlPrefix .= '/';
	        }
	        else
	        {
	          $urlPrefix .= '';
	        }

	        echo '<table style="text-align: left;border:0px;width:99%;"><tr><td style="width:33%"><a class="InTextLink" href="' . $urlPrefix . GetLinkParam(1) . '">' . GetLinkParam(2) . '</a></td><td>' . GetLinkParam(7) . '<br /></td></tr></table>';
        }
	    }
    }
    echo '</div><br /><br /><br />';
  }

  function IsPostSelected(&$sel, &$num, $c, $i, $p)
  {
    global $Debug;
    $j;
    $found = false;

    if($Debug) { echo 'Gievn Post Cat: ' . $c . ' idx: ' . $i . ' post: ' . $p; }

    for($j=0;(($j<$num)&&($found==false));$j++)
    {
      if($Debug) { echo 'Checking No: ' . $j . ' Cat: ' . $sel[$j][0] . ' idx: ' . $sel[$j][1] . ' post: ' . $sel[$j][2]; }

      if(($sel[$j][0] == $c) && ($sel[$j][1] == $i) && ($sel[$j][2] == $p))
      {
        $found = true;
      }
    }

    return $found;
  }

  function SetSelectedPost(&$sel, &$num, $c, $i, $p)
  {
    global $Debug;

    if($Debug) { echo 'Selected Post No: ' . $num . ' Cat: ' . $c . ' idx: ' . $i . ' post: ' . $p; }
    $sel[$num][0] = $c;
    $sel[$num][1] = $i;
    $sel[$num][2] = $p;
    $num++;
  }

  function Comment($fnCode, $mainIndx, $subIndx, $postID, $postName, $postData, $posterName, $posterEmail, $Start)
  {
    $Query       = "";
    $MaxComments = 50;
    $i           = 0;

    global $Debug;
    global $TestMode;

    /* Open the database */

    if($Debug != 0) { echo 'Opening Database'; }

    $con = mysql_connect("localhost","dineshk_user","myuser");

    if(!$con)
    {
      echo 'Could not connect to database: ' . mysql_error();
    }
    else
    {
      /* View the comments Returns the comments that fit the selction conditions given in input */
      if($fnCode == 0)
      {
        if($Debug != 0) { echo 'Viewing Comments'; }

        mysql_select_db("dineshk_comments", $con);

        if(mysql_errno() != 0) echo "con = " . $con . '__error = ' . mysql_error() . '<br />';

        $Query  = 'SELECT * FROM ';
        $Query .= 'postcomments ';
        $Query .= 'WHERE     mainIndx=' . $mainIndx;
        $Query .= '      AND subIndx='   . $subIndx;
        $Query .= '      AND postID='    . $postID;
        $Query .= '      AND Flag=0';
        if($TestMode == 0) { $Query .= '      AND Test=0'; }
        else { $Query .= '      AND Test=1'; }
        $Query .= ' LIMIT ' . $Start .', ' . ($Start + $MaxComments);

        if($Debug != 0) { echo $Query; }

        $result = mysql_query($Query);

        if(mysql_errno() != 0) echo "result = " . $result . '__error = ' . mysql_error() . '<br />';

         $i = 0;
         while(($row = mysql_fetch_array($result)) && ($i <= $MaxComments))
         {
            echo '  <div class="CommentBlock" id="Comment_' . $row["commentCount"] . '">';
            echo '  <div class="CommentHeader">';
            echo '  <span class="CommentName">"' . $row["postName"] .'" </span>';
            echo '  <span class="CommenterName"> by ' . $row["posterName"] . ' at ' . $row["postTime"] . '</span></div>';
            echo '  <div class="Comment">' . $row["postData"] . '</div> </div>';

            $i++;
        }
      }
      /* Add a comment */
      else if($fnCode == 1)
      {
        if($Debug != 0) { echo 'Adding a comment '; }

        mysql_select_db("dineshk_comments", $con);

        if(mysql_errno() != 0) echo "con = " . $con . '__error = ' . mysql_error() . '<br />';

        $Query  = 'INSERT INTO postcomments (mainIndx, subIndx, postID, postName, postData, posterName, posterEmail, Test) ';
        $Query .= 'VALUES (';
        $Query .= $mainIndx. ', ';
        $Query .= $subIndx. ', ';
        $Query .= $postID. ', ';
        $Query .= "'" . $postName. "', ";
        $Query .= "'" . $postData. "', ";
        $Query .= "'" . $posterName. "', ";
        $Query .= "'" . $posterEmail. "', ";
        if($TestMode == 0) { $Query .= "0);"; }
        else { $Query .= "1);"; }

        if($Debug != 0) { echo $Query; }

        $result = mysql_query($Query);

        if(mysql_errno() != 0) echo "result = " . $result . '__error = ' . mysql_error() . '<br />';
      }
      /* Like a comment */
      else if($fnCode == 2)
      {
         echo 'This Post is Flagged';
      }
      /* Flag a commment */
      else if($fnCode == 3)
      {
         for($i=0;($i < 5);$i++)
         {
           echo '*';
         }
      }
      else
      {
      }

      mysql_close($con);
    }
  }

  function StartGalleria()
  {
    echo '<div id="galleria" class="galleriaDIV">';
  }

  function AddImageToGalleria($fileName, $title, $description)
  {
    echo '<a href="images/' . $fileName . '"><img src="images/thumbs/' . $fileName . '" data-title="' . $title . '" data-description="' . $description .'" /></a>';
  }

  function AddImageToSlimbox($fileName, $title, $link)
  {
    echo '<a href="images/' . $fileName . '" rel="lightbox' . $link .'"><img src="images/thumbs/' . $fileName . '" title="' . $title . '" /></a>';
  }

  function EndGalleria($theme)
  {
    echo '</div>';
    echo '<script>';
	if($theme == 0)
	{
      echo "Galleria.loadTheme('../../../scripts/themes/lightbox/galleria.lightbox.js');";
	}
	else
	{
      echo "Galleria.loadTheme('../../../scripts/themes/classic/galleria.classic.js';";
	}
    echo "$('#galleria').galleria();";
    echo '</script>';
  }

function AddInlineImage($styleNum, $pinPath, $imgPath, $thumbPath, $imgName)
{
  global $currDepth;
  global $pathPrefix;

  $classOne = array("InTextPicPinRight", "InTextPicPinLeft");
  $classTwo = array("InTextPicRight1", "InTextPicRight2", "InTextPicRight3",
                    "InTextPicLeft1", "InTextPicLeft2", "InTextPicLeft3");
  $classOneIndx = 0;
  $classTwoIndx = 0;

  if($styleNum > 3)
  {
    $classOneIndx = 1;
  }
  $classTwoIndx = $styleNum - 1;

  echo '<div align="center" class="' . $classOne[$classOneIndx] . '" style="text-align:center;width:18%">';
    echo '&nbsp<img style="position:absolute" src="' . $pathPrefix . $pinPath . '" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</img>';
	   echo '<div class="' . $classTwo[$classTwoIndx] . '">';
		 echo '<img onClick="ShowImage(\'' . $imgPath . '\', \'' . $imgName . '\')" src="' . $thumbPath . '" width="99%"> </img>';
		 echo '<div class="InTextPicCaption">' . $imgName . '</div>';
	   echo '</div>';
	 echo '</div>';
}

?>
