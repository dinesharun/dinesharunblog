var stageDiv;
var imgDiv;

function ShowImage(path, title)
{
  stageDiv = document.getElementById("StageBG");
  imgDiv   = document.getElementById("StageImg");
  
  if((stageDiv != null) && (imgDiv != null))
  {
    stageDiv.style.top = "0%";
    stageDiv.style.left = "0%";
    stageDiv.style.bottom = "0%";
    stageDiv.style.right = "0%";
    stageDiv.style.width = "99%";
    stageDiv.style.height = "99%";
    stageDiv.style.zIndex = "16";
    imgDiv.style.paddingTop = "3%";
    imgDiv.style.paddingLeft = "9%";
    imgDiv.style.paddingBottom = "1%";
    imgDiv.style.paddingRight = "9%";    
    imgDiv.style.width = "81%";
    imgDiv.style.height = "88%";
    stageDiv.innerHTML = title;
    var img = document.createElement('img');
    img.addEventListener('load', function () {
         var imagData = "";
         var stageImg = document.getElementById("StageImg");
         var imgWidth  = img.width;
         var imgHeight = img.height;
         var aRatio    = (imgWidth/imgHeight);
         
         /* Height is 99% of the container */
         imgHeight = stageImg.offsetHeight * 0.99;
         /* Calculate width accordingly */
         imgWidth  = imgHeight * aRatio;
         
         /* Clip width if it overflows out of the container */
         if(imgWidth >= stageImg.offsetWidth)
         {
           imgWidth  = stageImg.offsetWidth - 9;
         }
         
         imagData = '<span class="closeImg" title="Close" onClick="StopImage()"> &nbsp;&nbsp;&nbsp; </span> <br /><br /><br /><a target="_blank" title="Open Image in a new tab" href="';
         imagData = imagData + path;
         imagData = imagData + '"><img class="ShowImageImg" id="ShowImageImg" style="';
         imagData = imagData + 'width:' + imgWidth + 'px;';
         imagData = imagData + 'height:' + imgHeight + 'px;"';
         imagData = imagData + ' src=' + path;
         imagData = imagData + ' /></a>'; 
         
         imgDiv.innerHTML = imagData;
      });    
    img.setAttribute('src', path);
  }
}

function StopImage()
{
  if((stageDiv != null) && (imgDiv != null))
  {
    stageDiv.style.top = "0%";
    stageDiv.style.left = "0%";
    stageDiv.style.bottom = "100%";
    stageDiv.style.right = "100%";
    stageDiv.style.width = "0%";
    stageDiv.style.height = "0%";
    stageDiv.style.zIndex = "-1";
    imgDiv.style.top = "0%";
    imgDiv.style.left = "0%";
    imgDiv.style.bottom = "100%";
    imgDiv.style.right = "100%"; 
    imgDiv.style.width = "0%";
    imgDiv.style.height = "0%";
    imgDiv.style.padding = "0%";
    stageDiv.innerHTML = "";
    imgDiv.innerHTML = "";
    stageDiv = null;
    imgDiv = null;
  }
}
