stageDiv  = null;
imgDiv    = null;
currPath  = null;
currTitle = null;

function ShowImage(path, title)
{
  stageDiv = document.getElementById("StageBG");
  imgDiv   = document.getElementById("StageImg");
  
  if((path != null) && (title != null))
  {
    currPath  = path;
    currTitle = title;
  }
  else
  {
    path  = currPath;
    title = currTitle;
  }
  
  if((stageDiv != null) && (imgDiv != null) && (path != null) && (title != null))
  {
    stageDiv.style.top = "0px";
    stageDiv.style.left = "0px";
    stageDiv.style.bottom = "0px";
    stageDiv.style.right = "0px";
    stageDiv.style.width = "99%";
    stageDiv.style.height = "99%";
    stageDiv.style.zIndex = "16";
    stageDiv.style.padding = "0.5%";
    imgDiv.style.marginTop = "3%";
    imgDiv.style.marginLeft = "9%";
    imgDiv.style.marginBottom = "3%";
    imgDiv.style.marginRight = "9%";    
    imgDiv.style.width = "81%";
    imgDiv.style.height = "90%";
    imgDiv.style.padding = "0.5%";
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
         
         var closeRight = ((stageDiv.offsetWidth - imgWidth)/2) - 12;
         var closeTop   = ((stageDiv.offsetHeight - imgHeight)/2) - 3;
         
         imagData = '<span class="closeImg" title="Close" onClick="StopImage()" style="';
         imagData = imagData + 'right:' + closeRight + 'px;';
         imagData = imagData + 'top:' + closeTop + 'px;';
         imagData = imagData + '"> &nbsp;&nbsp;&nbsp; </span> <a target="_blank" title="Open Image in a new tab" href="';
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
    stageDiv.style.top = "0px";
    stageDiv.style.left = "0px";
    stageDiv.style.bottom = "100%";
    stageDiv.style.right = "100%";
    stageDiv.style.width = "0px";
    stageDiv.style.height = "0px";
    stageDiv.style.zIndex = "-1";
    stageDiv.style.padding = "0px";
    imgDiv.style.top = "0px";
    imgDiv.style.left = "0px";
    imgDiv.style.bottom = "100%";
    imgDiv.style.right = "100%"; 
    imgDiv.style.width = "0px";
    imgDiv.style.height = "0px";
    imgDiv.style.padding = "0px";
    imgDiv.style.margin  = "0px";
    stageDiv.innerHTML = "";
    imgDiv.innerHTML = "";
    stageDiv = null;
    imgDiv = null;
    currPath  = null;
    currTitle = null;
  }
}
