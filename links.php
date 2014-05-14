<?php

$idxLink;
$currPost;

$numLinks = array(4, 6, 10, 2, 2);

                /* Link, Display Name, Category, Index, Test, Time, Description, IncludeInRightPanel */
$links = array(
                /* 1 - Programming */
                array( array("PrintThySelf/", "Print Thy Self", 2, 1, 0, "22 May 2012", "A C program that prints it's own source.", 1),
                       array("PalinSqrChecker/", "Palindromic Palindrome Checker", 2, 1, 0, "22 May 2012", "A palindrome checker program writeen in C, where even the program is a palindrome", 1),
                       array("Snake/", "Snake Game", 2, 1, 0, "20 Nov 2007", "The Classic Snake game as a simple console mode c program.", 1),
                       array("Sudoku/", "SU-DO-KU Solver", 2, 1, 0, "15 Jan 2007", "A backtracking SU-DO-KU Solver.", 1)
                     ),

                /* 2 - Photography */
                array( array("Flowers/FirstSet.php", "Flowers Collection - 1", 1, 1, 0, "22 May 2012", "A collection of my best photographs with macros of flowers", 1),
                       array("360Pano/MyHomeSep2011.php", "360 Deg Panorama of My Home", 1, 1, 0, "22 May 2012", "360 Degree photo of My Home. Made with SE 750i and some very steady hands.", 1),
                       array("sunriseset/FirstSet.php", "Sunrise Sunset Collection", 1, 1, 0, "03 July 2012", "Golden and magical moments when the sun rises or falls", 1),
                       array("trees/FirstSet.php", "Trees Collection", 1, 1, 0, "07 July 2012", "The majestic and wonderful trees around us", 1),
                       array("rain/FirstSet.php", "Rain Collection", 1, 1, 0, "07 July 2012", "Gift from the skies graces use - Rain", 1),
					             array("seasons/autum001.php", "Seasons Collection", 1, 1, 0, "22 October 2012", "Seasons Collection - Autum in Germany 2012", 1)
                     ),

                /* 3 - Travel */
                array( array("EuropeMay2011", "Europe Trip - May 2011", 1, 5, 0, "25 May 2012", "My Trip to Europe in My 2011", 1),
                       array("EuropeMay2011/Lubeck.php", "Lubeck - May 2011", 1, 5, 0, "25 May 2012", "Lubeck - A medieval city", 0),
                       array("EuropeMay2011/Hamburg.php", "Hamburg - May 2011", 1, 5, 0, "25 May 2012", "Hamburg - A wealthy city", 0),
                       array("EuropeMay2011/Berlin.php", "Berlin - May 2011", 1, 5, 0, "25 May 2012", "Berlin - A artistic, infrastructre, cultural, social and historical city", 0),
                       array("EuropeMay2011/Kiel.php", "Kiel - May 2011", 1, 5, 0, "25 May 2012", "Kiel - A sailars paradise with a great natural harbour", 0),
                       array("EuropeMay2011/Muritz.php", "Muritz - May 2011", 1, 5, 0, "25 May 2012", "Muritz - A land of thousand lakes and unsopiled nature", 0),
                       array("EuropeMay2011/Paris.php", "Paris - May 2011", 1, 5, 0, "25 May 2012", "Paris - An artists canvas", 0),
                       array("EuropeMay2011/Sonderborg.php", "Sonderberg - May 2011", 1, 5, 0, "25 May 2012", "Sonderberg - A secluded getaway", 0),
                       array("EuropeOct2012/", "Europe Trip - Oct 2012", 1, 5, 0, "20 October 2012", "Trip to Germany in Autum of 2012", 1),
					             array("EuropeOct2012/mini.php", "Miniature Wonderland - Oct 2012", 1, 5, 0, "20 October 2012", "Miniature Wonderland - Life in micro propotions", 0),
					             array("EuropeOct2012/autum.php", "Autum in Germany - Oct 2012", 1, 5, 0, "10 November 2012", "Autum - Nature's Color Canvas", 0)
                     ),

				        /* 4 - Animation */
				        array( array("gallery/", "Blender - Gallery", 1, 2, 0, "27 May 2012", "A collection of my generic Blender works", 1),
					             array("TheQuasarLink/", "The Quasar Link", 1, 2, 0, "27 May 2012", "A mysterious guest - with an unfinished bussiness - An Blender Animation - Trailer", 1)
				             ),

                /* 5 - Electronics */
                array( array("bwlc/", "Basic Water Level Controller", 2, 2, 0, "27 May 2012", "A water motor controller that automatically switches ON/OFF the motor based on water level in tank", 1),
                       array("dmo/", "Dot Matrix Oscilloscope", 2, 2, 0, "27 May 2012", "A collection of my generic Blender works", 1)
                     )
              );




function InitLinkIdx($cat, $idx, $post)
{
  global $idxLink;
  global $currPost;

  if(($cat == 2) && ($idx == 1))
  {
    $idxLink = 1;
  }
  else if(($cat == 1) && ($idx == 1))
  {
    $idxLink = 2;
  }
  else if(($cat == 1) && ($idx == 5))
  {
    $idxLink = 3;
  }
  else if(($cat == 1) && ($idx == 2))
  {
    $idxLink = 4;
  }
  else if(($cat == 2) && ($idx == 2))
  {
    $idxLink = 5;
  }
  else
  {
    $idxLink = 0;
  }

  $currPost = $post;
}

function GetLinkParam($paramID)
{
  global $idxLink;
  global $currPost;

  global $cats;
  global $numLinks;
  global $links;

  if($idxLink != 0)
  {
    if($paramID == 0)
    {
      return $numLinks[$idxLink-1];
    }
    else
    {
      return $links[$idxLink-1][$currPost][$paramID-1];
    }
  }
  else
  {
    return 0;
  }

}

?>
