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

  $bgImg = array(array('/images/photo.png', '/images/art.png', '/images/tech.png'),
                 array('/images/art.png', '/images/photo.png', '/images/anim.png', '/images/music.png', '/images/nature.png', '/images/travel.png'),
                 array('/images/tech.png', '/images/pgm.png', '/images/elec.png', '/images/bio.png', '/images/web.png'),
                 array('/images/photo.png', '/images/enter.png', '/images/history.png', '/images/spritual.png', '/images/rand.png', '/images/home.png')
                );

  $totalQuotes = 8;
  $quotes = array(array('You dont take a photograph, you make it', 'Ansel Adams'),
                  array('There are no rules for good photographs, there are only good photographs.', 'Ansel Adams'),
                  array('A photograph is a portrait painted by the sun', 'unknown'),
                  array('A work of art which did not begin in emotion is not art', 'Paul Cezanne'),
                  array('Great art picks up where nature ends', 'Marc Chagall'),
                  array('Art is not what you see, but what you make others see', 'Edgar Degas'),
                  array('A Good artist has less time than ideas', 'Martin Kippenberger'),
                  array('I saw the angel in the marble and carved until I set him free', 'Michelangelo')
                 );

  $TestMode = 1;
  $Debug = 0;
  $totalImages;
  
function GetIds($path, &$catId, &$idxId, &$postId)
{
  global $catStrs;
  global $Debug;
  
  $catId  = 0;
  $idxId  = 0;
  $postId = 0;
  
  $parts  = explode('/', $path);
  
  if($Debug) { echo 'Path:' . $path . 'Path 0:' . $parts[0] .'&nbsp;&nbsp;&nbsp;'; }
  
  if(isset($parts[0]))
  {
    $catId  = array_search($parts[1], $catStrs[0]);
    if($Debug) { echo 'Path 1:' . $parts[1] . ', Val 1:' . $catId . '&nbsp;&nbsp;&nbsp;'; }
  }
  if(isset($parts[1]))
  {
    $idxId  = array_search($parts[2], $catStrs[$catId]);
    if($Debug) { echo 'Path 2:' . $parts[2] . ', Val 2:' . $idxId . '&nbsp;&nbsp;&nbsp;'; }
  }
  if(isset($parts[2]))
  {
    $postId = getPostId($parts[3]);
    if($Debug) { echo 'Path 3:' . $parts[3] . ', Val 3:' . $postId . '&nbsp;&nbsp;&nbsp;'; }
  }
}

function AddHeader($depth, $title, $keywords)
{
  echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
  echo '<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->';
  echo '<html xmlns="http://www.w3.org/1999/xhtml">';
  echo '<head>';

  echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
  echo '<meta name="Description" content="Personal Blog of Dinesh Arun.K." />';

  echo '<meta name="Keywords" content=" ' . $keywords . ' " />';
  echo '<title> ' . $title . ' </title>';

  echo '<link rel="stylesheet" type="text/css" href="/css/main.css" />';
	echo '<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet" type="text/css" />';
	echo '<link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet" type="text/css" />';
	echo '<link href="https://fonts.googleapis.com/css?family=Emblema+One" rel="stylesheet" type="text/css" />';
	echo '<link href="https://fonts.googleapis.com/css?family=Combo" rel="stylesheet" type="text/css" />';
  echo '<script type="text/javascript" src="/scripts/main.js"></script>';
  echo '<script type="text/javascript" src="/scripts/jquery.js"></script>';
  echo '<script type="text/javascript" src="/scripts/showImage.js"></script>';
	echo '<script type="text/javascript" src="/scripts/galleria.js"></script>';
	echo '<script type="text/javascript" src="/scripts/swfobject.js"></script>';
  echo '</head>';
  echo '<body onload="StartScripts()" onresize="resizeMe()">';
  echo '<div class="stageBG"  id="StageBG">   </div>';
  echo '<div class="stageImg" id="StageImg" align="center">  </div>';
  echo '<div class="topBar">';
  echo '  <span class="topBarClock" style="border:0px;" id="clk">';
  echo '    22-05-2012  <br /> 11:30';
  echo '  </span>';
  echo '  <span class="topBarItem">   '; 
  echo '    <a class="topILink" href="https://plus.google.com/117144638090915831878?rel=author" target="_blank"> ';
  echo '      <img style="width: 100%; border: 0px;" src="/css/images/googleplus.png" /> ';
  echo '    </a> ';
  echo '  </span>';
  echo '  <span class="topBarItem">';
  echo '    <a class="topILink" href="http://www.orkut.co.in/Main#Profile?uid=7117684347204734942" target="_blank"> ';
  echo '      <img style="width: 100%; border: 0px;" src="/css/images/orkut.png" /> ';
  echo '    </a> ';
  echo '  </span>';
  echo '  <span class="topBarItem">';
  echo '  <a class="topILink" href="https://twitter.com/#!/dinesharun" target="_blank"> ';
  echo '    <img style="width: 100%; border: 0px;" src="/css/images/twitter.png" /> ';
  echo '  </a> ';
  echo '  </span>';
  echo '  <span class="topBarItem">';
  echo '  <a class="topILink" href="http://www.facebook.com/dinesharunk" target="_blank"> ';
  echo '    <img style="width: 100%; border: 0px;" src="/css/images/facebook.png" /> ';
  echo '  </a> ';
  echo '  </span>';
  echo '  <span class="topBarBigLink">';
  echo '    <a class="toplbLink" onclick="getPage(0, 0, 0)"> Home </a> ';
  echo '  </span>';
  echo '  <span class="topBarBigLink">';
  echo '    <a class="toplbLink" onclick="getPage(1, 0, 0)"> Art </a> ';
  echo '  </span>';
  echo '  <span class="topBarBigLink">';
  echo '    <a class="toplbLink" onclick="getPage(2, 0, 0)"> Technology </a>';
  echo '  </span>';
  echo '</div>';
 
	echo '<div class="contentFrame" id="contentFrame">';
}

function getPage($cat, $idx, $post)
{
  global $catStrs;
  
  /* Build link */
  $link = '/' . $catStrs[0][$cat];
  
  if($idx != 0)
  {
     $link = $link . '/' . $catStrs[$cat][$idx] . '/';
     
     if($post != 0)
     {
       /* Get the post */
       $postRow = GetPost($post);
       
       $link = $link . $postRow["link"] . '/';
     }
  }
  
  $postFile  = $link . 'index.htm';
  $imgPrefix = $link . '/images/';
	
	/* Get the file contents */
  $postData = file_get_contents($postFile);
	
	/* If got post the data */
	if($postData != FALSE)
	{
    /* Parse the data and replace MACROS */
    $parsedData = parseData($postData, $imgPrefix);
    
	  echo htmlspecialchars_decode($parsedData);
	}
	else
	{
    $link = "/error";
	  echo "<br /><div class=\"errorDiv\"> No Such Posts Exists! </div><br />";
	}
  
  return $link;  
}

function parseData($rawData, $imgPrefix)
{
  $parsedData = "";
 
  $pattern = '/StartGalleria\(\);/i';
  $rep     = '&lt;div id="galleria" class="galleriaDIV"&gt;';
  $parsedData = preg_replace($pattern, $rep, $rawData);
  
  $pattern = '/EndGalleria\(.*\);/i';
  $rep = '&lt;/div&gt;&lt;script type="text/javascript"&gt;Galleria.loadTheme(\'/scripts/themes/lightbox/galleria.lightbox.js\');\$(\'#galleria\').galleria();&lt;/script&gt;';
  $parsedData = preg_replace($pattern, $rep, $parsedData);
 
  $pattern = '/AddImageToGalleria\("(.*)", "(.*)", "(.*)"\);/i';
  $rep = '&lt;a href="'. $imgPrefix . '$1"&gt;&lt;img src="' . $imgPrefix . 'thumbs/$1" data-title="$2" data-description="$3" /&gt;&lt;/a&gt;';
  $parsedData = preg_replace($pattern, $rep, $parsedData);
  
  $pattern = '/AddInlineImage\((.*)\);/i';
  $rep = AddInlineImage("$1");
  $parsedData = preg_replace($pattern, $rep, $parsedData);
  
  return $parsedData;
}
  
function AddBody($cat, $idx, $post)
{
	global $bgImg;
	global $quotes;
  global $totalQuotes;
	global $enableComments;	
  
  $link = "";

	echo '<div class="centerBlock">';
	
	/* Home section */
  if($cat == 0)
  {
    echo '<div class="header">';
    echo '  <a class="mainLinksCurr"> <span class="hMenuCurr" style="right: -2%;"> &nbsp; &nbsp;<img class="menuImg" alt="" src="/images/home.png"/> Home &nbsp; &nbsp; </span> </a>';
    echo '  <a class="mainLinks" onclick="getPage(1, 0, 0)"> <span class="hMenu" style="right: -2%;">  <img class="menuImg" alt="" src="/images/art.png"/> Art </span> </a> ';
    echo '  <a class="mainLinks" onclick="getPage(2, 0, 0)"> <span class="hMenu" style="right: -2%;"> <img class="menuImg" alt="" src="/images/tech.png"/> Technology </span> </a> ';
    echo '</div>';
  }
	/* Art Section */
  else if($cat == 1)
  {
    echo '<div class="header">';
    echo '  <a class="mainLinks' . (($idx==0)?('Curr'):('')) . '" onclick="getPage(1, 0, 0)"> <span class="hMenu' . (($idx==0)?('Curr'):('')) . '" style="right: -2%;">  <img class="menuImg" alt="" src="/images/art.png"/> Art </span> </a> ';
    echo '  <a class="mainLinks' . (($idx==1)?('Curr'):('')) . '" onclick="getPage(1, 1, 0)"> <span class="hMenu' . (($idx==1)?('Curr'):('')) . '" style="right: -1%;"> <img class="menuImg" alt="" src="/images/photo.png"/> Photography </span> </a> ';
    echo '  <a class="mainLinks' . (($idx==2)?('Curr'):('')) . '" onclick="getPage(1, 2, 0)"> <span class="hMenu' . (($idx==2)?('Curr'):('')) . '" style="right: 0%;"> <img class="menuImg" alt="" src="/images/anim.png"/> Animation </span> </a> ';
    echo '  <a class="mainLinks' . (($idx==3)?('Curr'):('')) . '" onclick="getPage(1, 3, 0)"> <span class="hMenu' . (($idx==3)?('Curr'):('')) . '" style="right: 1%;"> <img class="menuImg" alt="" src="/images/music.png"/> Music </span> </a> ';
    echo '  <a class="mainLinks' . (($idx==4)?('Curr'):('')) . '" onclick="getPage(1, 4, 0)"> <span class="hMenu' . (($idx==4)?('Curr'):('')) . '" style="right: 2%;"> <img class="menuImg" alt="" src="/images/nature.png"/> Nature </span> </a> ';
    echo '  <a class="mainLinks' . (($idx==5)?('Curr'):('')) . '" onclick="getPage(1, 5, 0)"> <span class="hMenu' . (($idx==5)?('Curr'):('')) . '" style="right: 3%;"> <img class="menuImg" alt="" src="/images/travel.png"/> Travel </span> </a> ';
    echo '</div>';
  }
	/* Tech Section */
  else if($cat == 2)
  {
    echo '<div class="header">';
    echo '  <a class="mainLinks' . (($idx==0)?('Curr'):('')) . '" onclick="getPage(2, 0, 0)"> <span class="hMenu' . (($idx==0)?('Curr'):('')) . '" style="right: -2%;"> <img class="menuImg" alt="" src="/images/tech.png"/> Technology </span> </a> ';
    echo '  <a class="mainLinks' . (($idx==1)?('Curr'):('')) . '" onclick="getPage(2, 1, 0)"> <span class="hMenu' . (($idx==1)?('Curr'):('')) . '" style="right: -1%;"> <img class="menuImg" alt="" src="/images/pgm.png"/> Programming </span> </a> ';
    echo '  <a class="mainLinks' . (($idx==2)?('Curr'):('')) . '" onclick="getPage(2, 2, 0)"> <span class="hMenu' . (($idx==2)?('Curr'):('')) . '" style="right: 0%;"> <img class="menuImg" alt="" src="/images/elec.png"/> Electronics </span> </a> ';
    echo '  <a class="mainLinks' . (($idx==3)?('Curr'):('')) . '" onclick="getPage(2, 3, 0)"> <span class="hMenu' . (($idx==3)?('Curr'):('')) . '" style="right: 1%;">  <img class="menuImg" alt="" src="/images/bio.png"/> Biology </span> </a> ';
    echo '  <a class="mainLinks' . (($idx==4)?('Curr'):('')) . '" onclick="getPage(2, 4, 0)"> <span class="hMenu' . (($idx==4)?('Curr'):('')) . '" style="right: 2%;"> <img class="menuImg" alt="" src="/images/web.png"/> Webdesign </span> </a> ';
    echo '</div>';
  }
	/* Default: Home Section */
  else
  {
    echo '<div class="header">';
    echo '  <a class="mainLinks" onclick="getPage(0, 0, 0)"> <span class="hMenu" style="right: -2%;"> &nbsp; &nbsp; <img class="menuImg" alt="" src="/images/home.png"/> Home &nbsp; &nbsp;  </span> </a>';
    echo '  <a class="mainLinks" onclick="getPage(1, 0, 0)"> <span class="hMenu" style="right: -2%;">  <img class="menuImg" alt="" src="/images/art.png"/> Art </span> </a> ';
    echo '  <a class="mainLinks" onclick="getPage(2, 0, 0)"> <span class="hMenu" style="right: -2%;"> <img class="menuImg" alt="" src="/images/tech.png"/> Technology </span> </a> ';
    echo '</div>';
  }

	/* Background thumbnail image for every category and index */
  echo'<div class="bodyBGImgDiv"><img class="bodyImg" alt="" src="' . $bgImg[$cat][$idx] . '"/> </div>';

	/* Post date addition */
  if($post != 0)
  {
    $postData = GetPost($post);
    echo '<div class="dateTimeDiv">' . $postData["date"] . ' </div>';
  }

	/* Main post panel */
  echo '<div class="mainPanel" id="mp">';
	
	/* Get the actual post from the data file */
	$link = getPage($cat, $idx, $post);

	/* Random post list for all categories in root except about me */
  if(($post == 0) && (!(($cat == 3) && ($idx == 5))))
  {
    GetRandomPosts($cat, $idx, 5);
  }

	/* Comments for posts if enabled */
  if(($post != 0) && ($enableComments != 0))
  {
    AddCommentSection($cat, $idx, $post);
  }
	
	echo '</div>';

	/* Right hand side image */
	$rightImg = '/images/index_header_' . $cat . '_' . $idx . '_' . $post . '.png';
	
	/* Post Specific image not present, check group specific file present */
	if((file_exists($rightImg)) == false)
	{
	  $rightImg = '/images/index_header_' . $cat . '_' . $idx . '_0' . '.png';

	  /* Default to home pages image */
	  if((file_exists($rightImg)) == false)
	  {
	    $rightImg = '/images/index_header_0_0_0.png';
	  }
	}
  echo '<img class="rightImg" src="' . $rightImg . '" />';

  /* Right side list of links, only for posts */
  if($post != 0)
  {
    GetPostLinks($cat, $idx);
  }

	/* There is no need for fotter current link if the category is not general */
  if($cat != 3) { $idx = 0; }

	/* Fotter section (general) */
  echo '<a name="fotter"></a>';
  echo '<div class="fotter">';
  echo '   <a class="mainLinks' . (($idx==1)?('Curr'):('')) . '" onclick="getPage(3, 0, 0)"> <span class="fMenu' . (($idx==1)?('Curr'):('')) . '" style="right: -2%;"> <img class="menuImgBottom" alt="" src="/images/enter.png"/> Entertainment </span> </a>';
  echo '   <a class="mainLinks' . (($idx==2)?('Curr'):('')) . '" onclick="getPage(3, 1, 0)"> <span class="fMenu' . (($idx==2)?('Curr'):('')) . '" style="right: -1%;"> <img class="menuImgBottom" alt="" src="/images/history.png"/> History </span> </a>';
  echo '   <a class="mainLinks' . (($idx==3)?('Curr'):('')) . '" onclick="getPage(3, 2, 0)"> <span class="fMenu' . (($idx==3)?('Curr'):('')) . '" style="right: 0%;"> <img class="menuImgBottom" alt="" src="/images/spritual.png"/> Spritual </span> </a>';
  echo '   <a class="mainLinks' . (($idx==4)?('Curr'):('')) . '" onclick="getPage(3, 3, 0)"> <span class="fMenu' . (($idx==4)?('Curr'):('')) . '" style="right: 1%;"> <img class="menuImgBottom" alt="" src="/images/rand.png"/> Random Thoughts </span> </a>';
  echo '   <a class="mainLinks' . (($idx==5)?('Curr'):('')) . '" onclick="getPage(3, 4, 0)" rel="author"> <span class="fMenu' . (($idx==5)?('Curr'):('')) . '" style="right: 2%;"> <img class="menuImgBottom" alt="" src="/images/home.png"/> About me </span> </a>';
  echo '</div>';

  echo '<br /><br /><br /><br /><br />';

  echo '</div>'; /* End of main panel */

	/* Ramdom quation at the top */
  $indx = rand(0, $totalQuotes-1);
  echo '<div class="bodyBGHeading"> "' . $quotes[$indx][0] . '" <br />';
  echo '<span style="font-size: 69%;"> - ' . $quotes[$indx][1] .  ' </span></div>';	
  
  return $link;
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
  $startPath = "/art/photo/";
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

  /* Until GAE Support file system access or 
    until an alternate mathod is found
  --------------------------------------------
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
--------------------------------------------------------*/

  $totalImages = 21;
  $randImgs    = array('/art/photo/Flowers/thumbs/DSC00025.JPG', '/art/photo/Flowers/thumbs/DSC00039.JPG', '/art/photo/Flowers/thumbs/DSC00008.JPG',
                       '/art/photo/Flowers/thumbs/DSC09158.JPG', '/art/photo/Flowers/thumbs/DSC09048.JPG', '/art/photo/Flowers/thumbs/DSC01083.JPG',
                       '/art/photo/rain/thumbs/DSC01142.JPG',    '/art/photo/rain/thumbs/DSC07569.JPG',    '/art/photo/rain/thumbs/DSC08640.JPG',
                       '/art/photo/seasons/thumbs/DSC01347.jpg', '/art/photo/seasons/thumbs/DSC01349.jpg', '/art/photo/seasons/thumbs/DSC01368.jpg',
                       '/art/photo/seasons/thumbs/DSC01390.jpg', '/art/photo/seasons/thumbs/DSC01419.jpg', '/art/photo/seasons/thumbs/DSC01433.jpg',
                       '/art/photo/sunriseset/thumbs/DSC01231.JPG', '/art/photo/sunriseset/thumbs/DSC01419.JPG', '/art/photo/sunriseset/thumbs/DSC01427.JPG',
                       '/art/photo/trees/thumbs/DSC01533.JPG', '/art/photo/trees/thumbs/DSC00012.JPG', '/art/photo/trees/thumbs/DSC03663.JPG');
           
  if(($imageIndx != 0) && ($imageIndx <= $totalImages))
  {
    $selectedFile = $randImgs[$imageIndx-1];
  }
  else
  {
    $selectedFile = $randImgs[3];
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

function GetPostLinks($cat, $idx)
{
  $num   = 0;
  $posts = GetPosts($cat, $idx);

  foreach($posts as $post)
  {
    if($num == 0)
    {
      echo '<div class="rightPanel" id="rp">';
      echo '<br /><br />';
    }

    if($post["enable"] != 0)
    {
      echo '<a class="PostLinks" onclick="getPage(' . $post["catId"] . ',' . $post["idxId"] . ',' . $post["postId"] . ')">' . $post["title"] . ' </a> <br />';
    }
    
    $num++;
  }

  if($num != 0)
  {
    echo '<br /><br />';
    echo '</div>';
  }
}

function GetRandomPosts($cat, $idx, $count)
{
  global $catStrs;
  global $catFullStrs;
  $selCat = $cat;
  $selIdx = $idx;
  $postIdx = 0;
  $urlPrefix = "";
  $selPosts = array();
  $numSel = 0;
  $totalTries = 0;

  echo '<h2>' . $catFullStrs[$cat][$idx] . '</h2>';
  
  $posts    = GetPosts($cat, $idx);
  $numPosts = count($posts);

  for($i=0;$i<$count;$i++)
  {
    $totalTries++;

    if($numPosts == 0)
    {
      echo '<div class="PostDataPlain" > Work in progress <br />';
      break;
    }
    else if($numSel == $numPosts)
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
      $post = $posts[$postIdx];

      if(IsPostSelected($selPosts, $numSel, $selCat, $selIdx, $postIdx) == true)
      {
        $i--;
      }
      else
      {
        SetSelectedPost($selPosts, $numSel, $selCat, $selIdx, $postIdx);

        if($i == 0)
        {
          echo '<div class="PostDataPlain" > <h3 style="text-align:center"> Random Topics </h3> <br /> ';
        }

        echo '<table style="text-align: left;border:0px;width:99%;"><tr><td style="width:33%"><a class="InTextLink" onclick="getPage(' . $post["catId"] . ',' . $post["idxId"] . ',' . $post["postId"] . ')">' . $post["title"] . '  </a></td><td>' . $post["desc"] . '<br /></td></tr></table>';
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

function AddInlineImage($argList)
{
  $args = explode(',', $argList);
  
  $styleNum   = (int)$args[0];
  $pinPath    = $args[1];
  $imgPath    = $args[2];
  $thumbPath  = $args[3];
  $imgName    = $args[4];
  
  $retStr = "";
  
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

  $retStr = $retStr . '<div align="center" class="' . $classOne[$classOneIndx] . '" style="text-align:center;width:18%">';
  $retStr = $retStr . '&nbsp<img style="position:absolute" src="/' . $pinPath . '" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</img>';
	$retStr = $retStr . '<div class="' . $classTwo[$classTwoIndx] . '">';
	$retStr = $retStr . '<img onClick="ShowImage(\'' . $imgPath . '\', \'' . $imgName . '\')" src="' . $thumbPath . '" width="99%"> </img>';
	$retStr = $retStr . '<div class="InTextPicCaption">' . $imgName . '</div>';
	$retStr = $retStr . '</div>';
	$retStr = $retStr . '</div>';
  
  return $retStr;
}

?>
