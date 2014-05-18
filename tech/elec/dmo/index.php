<?php include("../../../template.php");

  AddHeader(3, "Dot Matrix Oscilloscope", "Blog, Electronics, Dot Matrix, Oscilloscope");

  AddBody(2, 2, 2);

?>

<h2> Dot Matrix Digital Oscillscope </h2>

<div class="PostDataPlain">

     <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Every electronics enthusiats will always love own an oscilloscope to analyze every circuits they encounter.
 But economical issues always prevents the possesion of such an cool toy. I was also longing for an oscilloscope for years,
 but unable to get my hands on one. So one day i decided i will build my own oscillscope, albeit a small one. <br /><br />

     The basic operation of an oscilloscope is simple, a horizontal/vertical sweep system and a comparator would do.
     I built a small prototype based on this theory. It is a 7x8 LED display with a range of 20 - 100 Hz.
     In details the circuit does the following operations,
	 
	 </div><br /><br />

     <div align="center" class="InTextPicPinRight" style="text-align:center;width:18%">
        &nbsp; <img style="position:absolute" src="../../../images/greenpin.png" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</img>
        <div class="InTextPicRight3">
            <img onClick="ShowImage('dmo2.png', 'Sine Wave')" src="dmo2_t.png" width="99%" />
        </div>
     </div><br />

  <div class="PostDataPlain" style="width:81%">
   <ul>
     <li> First a frequency generator based on a 555 timer generates the base frequency used all along the system. It determines the maximum frequency of the input wave
          that can be traced without aliasing. </li>
     <li> Then a stair case generator circuit generates a staircase signal, which is split into two to form a stair case window for comparision.
          These stair case signals are fed into the references end of two comparators based on OP AMP 741. </li>
     <li> The input goes straight to the comparators and the comparators output either TRUE or FALSE based of the input signals presence in between the
          comaprision window. </li>
     <li> In parallel there are vertical and horizontal sweep generator circuits that enable one row at a time in the 7*8 LED array </li>
     <li> The column LED is selected from the comparator output. So when a row and a coloumn is selected a LED glows. </li>
     <li> When this process is repeated several times a second the input wave appears in the LED array. </li>
   </ul>

   </div>
     <div align="center" class="InTextPicPinLeft" style="text-align:center;width:18%">
        &nbsp;&nbsp;&nbsp;&nbsp; <img style="position:absolute" src="../../../images/bluepin.png" >&nbsp;&nbsp;&nbsp;&nbsp;</img>
        <div class="InTextPicLeft2">
            <img onClick="ShowImage('dmo1.png', 'Square Wave')" src="dmo1_t.png" width="99%" />
        </div>
     </div>

     <br /><br /><br /><br /><br /><br /> <div class="PostDataPlain" style="margin-left:27%; width:63%;">

     For a complete overview of the circuit <a class="InTextLink" href="dmo.pdf" target="_blank"> download this pdf file </a>.

     </div> <br /><br /><br /><br />

<?php

  AddFooter(2, 2, 2);

?>