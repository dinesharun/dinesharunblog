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
    stageDiv.style.width = "100%";
    stageDiv.style.height = "100%";
    stageDiv.style.zIndex = "16";
    imgDiv.style.top = "3%";
    imgDiv.style.left = "9%";
    imgDiv.style.bottom = "1%";
    imgDiv.style.right = "9%";    
    imgDiv.style.width = "81%";
    imgDiv.style.height = "88%";
    stageDiv.innerHTML = '<br />' + title;
    var img = document.createElement('img');
    img.addEventListener('load', function () {
         var imagData = "";
         
         imagData = '<span class="closeImg" title="Close" onClick="StopImage()"> &nbsp;&nbsp;&nbsp; </span> <br /><br /><br /><a target="_blank" title="Open Image in a new tab" href="';
         imagData = imagData + path;
         if(img.width > img.height)
         {
           imagData = imagData + '"><img class="ShowImageImgLandscape" id="ShowImageImg" src=';
         }
         else
         {
           imagData = imagData + '"><img class="ShowImageImgPotrait" id="ShowImageImg" src=';
         }
         imagData = imagData + path;
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
    stageDiv.innerHTML = "";
    imgDiv.innerHTML = "";
    stageDiv = null;
    imgDiv = null;
  }
}
