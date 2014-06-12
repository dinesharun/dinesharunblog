
var mouseIn  = 0;
var mouseOut = 1;

function StartScripts()
{
  resizeMe();
  StartClock();
  
  /* If not the root request the page using getPath method */
  if((window.location.pathname != null) && (window.location.pathname != "/"))
  {
    getPath(window.location.pathname);
  }
  else
  {
    getPage(0, 0, 0, false);
  }
  
  window.addEventListener("popstate", function(e) 
  {
    if(e.state == null)
    {
      getPage(0, 0, 0, false);
    }
    else
    {
      if(e.state["path"] == null)
      {
        getPage(e.state["catId"], e.state["idxId"], e.state["postId"], false);
      }
      else
      {
        getPath(e.state["path"], false);
      }
    }
  });
}

function StartClock()
{
  var t = "22-05-2012 <br /> 11:40 AM";
  var c = document.getElementById('clk');
  
  var CurrTime = new Date();
  var Hours = CurrTime.getHours();
  var Minutes = CurrTime.getMinutes();

  var Day = CurrTime.getDate();
  var Month = CurrTime.getMonth();
  var Year = CurrTime.getFullYear();
   
  if(Day < 10)
    t = "0";
  else
    t = "";
  t += Day + "-" 
  if((Month+1) < 10)
    t += "0";
  t += (Month+1) + "-" + Year;
  
  t += '<br />';

  if(Hours < 10)
    t += " 0"
  else
    t += " ";
  t += Hours + ":" 
  if(Minutes < 10)
    t += "0"
  t += Minutes;
   
  if(c != null)
  {
    c.innerHTML = t;
  }
  
  setTimeout("StartClock()", 60000);
}

function rightPanelExtend()
{
  mouseIn  = 1;
  mouseOut = 0;
  setTimeout("rpExtend()", 30);
}

function rpExtend()
{
 if((mouseIn == 1) && (mouseOut == 0))
 {
  $('#rp').animate(
             {
               width: "18%",
               marginLeft: "79%"
             },
             {
               duration: 600,
               easing: "swing",
               complete: function()
               {
               }
             } );
             
  $('#mp').animate(
             {
               width: "74%"
             },
             {
               duration: 600,
               easing: "swing",
               complete: function()
               {
               }
             } ); 
 }          
}

function rightPanelContract()
{
  mouseIn  = 0;
  mouseOut = 1;
  setTimeout("rpContract()", 60);
}

function rpContract()
{
 if((mouseIn == 0) && (mouseOut == 1))
 {
  $('#rp').animate(
             {
               width: "3%",
               marginLeft: "94%"
             },
             {
               duration: 600,
               easing: "swing",
               complete: function()
               {
               }
             } );
             
  $('#mp').animate(
             {
               width: "89%"
             },
             {
               duration: 600,
               easing: "swing",
               complete: function()
               {
               }
             } );             
 }             
}

function PostComment()
{
}

function ResizeImage(idx)
{
  var img = document.getElementById("randImages"+idx);
  var imgSrc = new Image();

  imgSrc.src = img.src;

  if(img != null)
  {
    if(imgSrc.width > imgSrc.height)
    {
      img.style.width  = "21%";
      img.style.height = "auto";
    }
    else
    {
      img.style.width = "12%";	
      img.style.height = "auto";	
      img.style.marginLeft = "6%";
      img.style.marginRight = "6%";
    }
  }
}
	
function resizeMe()
{
    //Standard height, for which the body font size is correct
    var preferredHeight = 720; 
    var preferredWidth = 1366; 
    var fontsize = 12;

    var displayHeight = $(window).height();
    var displayWidth = $(window).width();
    var percentageH = ((1.1 * displayHeight) / preferredHeight);
    var percentageW = ((1.1 * displayWidth) / preferredWidth);
    var percentage  = ((percentageH > percentageW)?(percentageW):(percentageH))
    var newFontSize = Math.floor(fontsize * percentage);
    $("body").css("font-size", newFontSize);
}


function formatCodeBlock()
{
  var c = document.getElementById("CodeBlock");
  
  if(c != null)
  {
    var txt  = c.innerHTML;
    var ftxt = ""; 
    var letters = txt.split("");
    var i = 0;
    var j = 0;
    var endSpan = 0;
    var dq = 0;
    var sq = 0;
    var prev = 0; 
    var next = 0;
    var cmt = 0;
    var prevCmt = 0;
    var lineNum = 0;
    
    /* First Pass, check for quotes (single & double and enclose them in brown span) */ 
    while(letters[i] != null)
    { 
      /* When quotes are enabled no need to chec for comments */
      if((dq == 0) && (sq == 0))
      {
        /* In Other cases check for comments */
        
        next = 0;
        
        if(letters[i+1] != null)
        {
          next = letters[i+1][0];
        }
        
        if((next == '*') && (letters[i][0] == '/'))
        {
          if(cmt == 0)
          {
            cmt = 1;
          }
        }
        else if((letters[i][0] == '/') && (prev == '*'))
        {
          if(cmt == 1)
          {
            cmt = 0;
          }
        }      
        else if((next == '/') && (letters[i][0] == '/'))
        {
          if(cmt == 0)
          {
            cmt = 2;
          }
        }
        else if(letters[i][0] == '\n')
        {
          if(cmt == 2)
          {
            cmt = 0;
          }
        }
        else
        {
        }
      }
      
      if((cmt != 0) && (prevCmt == 0))
      {
        ftxt += '<span style="color: green;">';
      }
      else if((cmt == 0) && (prevCmt != 0))
      {
        endSpan = 1;
      }
      else
      {
      }
      
      /* When comments are not enabled check for quotes */
      if(cmt == 0)
      {
        if((letters[i][0] == '"') && (prev != "\\"))
        {
          if(sq == 0)
          {
            if(dq == 0)
            {
              ftxt += '<span style="color: brown;">';
              dq = 1;
            }
            else
            {
              endSpan = 1;            
              dq = 0;
            }
          }
        }
        else if((letters[i][0] == "'") && (prev != "\\"))
        {
          if(dq == 0)
          {
            if(sq == 0)
            {
              ftxt += '<span style="color: brown;">';
              sq = 1;
            }
            else
            {
              endSpan = 1;
              sq = 0;
            }
          }
        }
      }      
      
      prev = letters[i][0];
      ftxt += prev;
      prevCmt = cmt;
      
      if(endSpan != 0)
      {
        ftxt +=  '</span >';
        endSpan = 0;
      }
      
      i++;
    }
    
    var lines = ftxt.split(/\r\n|\r|\n/);
    ftxt = "";
    i = 0;
    
    while(lines[i] != null)
    {
      var words = lines[i].split(/ /);
      
      j = 0;
      
      while(words[j] != null)
      {
        if(words[j].search("<span") != -1)
        {
          endSpan = 3;
        }
        else if(words[j].search("</span") != -1)
        {
          endSpan = 0;
        }        
        else if(words[j][0] == '#')
        {
          if(endSpan < 2) 
          {         
            ftxt += '<span style="color: lightblue;">';
            endSpan = 1; 
          }
        }
        else if(words[j].search(/if|else|for|while|do|void|int|char|unsigned|signed|long|short/) == 0)
        {
          if(endSpan < 2) 
          { 
            ftxt += '<span style="color: lightblue;">';
            endSpan = 1;
            
            if(words[j].search(/\(/) != -1)
            {
              var tokens = words[j].split(/\(/);
              var k = 0;
              
              words[j] = tokens[k++];
              words[j] += "</span>";
              
              while(tokens[k] != null)
              {
                words[j] += "(";
                words[j] += tokens[k++];
              }
                
              endSpan  = 0;
            }
          }        
        }
        else
        {
          if(endSpan < 2) { endSpan = 0; }
        }
        
        ftxt += words[j];
        ftxt += " ";
      
        if(endSpan == 1)
        {
          ftxt += "</span>";
        }
        
        j++;
      }
      
      ftxt += '\n  <span style="font-size: 72%; color: grey;">' + lineNum++;
      
      if(lineNum <= 10)
      {
        ftxt += "   ";
      }
      else if(lineNum <= 100)
      {
        ftxt += "  ";
      }
      else
      {
        ftxt += " ";
      }
      
      
      ftxt += "| </span>";
      
      if(endSpan < 2)
      {
        ftxt += "</span>";
      }
      
      i++;
    }
        
    c.innerHTML = ftxt;
  }
}

function addPage(path, catId, idxId, postId, data, addHistory)
{
  var link  = "";
  var title = "";
  
  if(addHistory == true)
  {
    var dataHtml = $(data);
    
    /* Get current link */
    link  = $(".currLinkDiv", dataHtml).attr("linkStr");
    title = $(".currLinkDiv", dataHtml).attr("titleStr");
    
    /* Push new state */
    var stateObj = { path: path, catId: catId, idxId: idxId, postId: postId };
    history.pushState(stateObj, title, link);
  }
  
  /* Update data */
  $(".contentFrame").html(data);
}

function addRandImages(data)
{
  $(".randImgsDiv").html(data);
}

function getPage(catId, idxId, postId, addHistory)
{
  addHistory = (typeof addHistory === "undefined") ? true : addHistory;
  
  $.get( "getpage", { category: catId, index: idxId, post: postId }).done(function( data ) 
  {
    addPage(null, catId, idxId, postId, data, addHistory);
    formatCodeBlock();
  });
}

function getPath(path, addHistory)
{
  addHistory = (typeof addHistory === "undefined") ? true : addHistory;
  
  $.get( "getpath", { path: path }).done(function( data ) 
  {
    addPage(path, 0, 0, 0, data, addHistory);
    formatCodeBlock();
  });
}

function GetRandomImages()
{
  $.get( "getpage", { randImages: true }).done(function( data ) 
  {
    addRandImages(data);
  });
}