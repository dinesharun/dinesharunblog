const insQuotes = [
  'You dont take a photograph, you make it <br /> - Ansel Adams',
  'There are no rules for good photographs, there are only good photographs. <br /> - Ansel Adams',
  'A photograph is a portrait painted by the sun <br /> - unknown',
  'A work of art which did not begin in emotion is not art <br /> - Paul Cezanne',
  'Great art picks up where nature ends <br /> - Marc Chagall',
  'Art is not what you see, but what you make others see <br /> - Edgar Degas',
  'A Good artist has less time than ideas <br /> - Martin Kippenberger',
  'I saw the angel in the marble and carved until I set him free <br /> - Michelangelo'
];

/* image id of the image currently shown */
var currImgId = "";

function showImage(imgId) {
  currImgId = imgId;
  document.getElementById("imgStageImg").src = document.getElementById(imgId).src;
  document.getElementById("imgStageName").innerHTML = document.getElementById(imgId).name;
  document.getElementById("imgStage").style.display = "block";
}

function getImageList() {
  var list = Array.from(document.getElementsByClassName("ImgThumbLink"));
  return list.sort();
}

function showPrevImage() {
  var list = getImageList();
  var idx  = list.indexOf(document.getElementById(currImgId));
  idx--;
  idx = ((idx < 0)?(list.length - 1):(idx));
  showImage(list[idx].id);
}

function showNextImage() {
  var list = getImageList();
  var idx  = list.indexOf(document.getElementById(currImgId));
  idx = ((idx + 1) % list.length);
  showImage(list[idx].id);
}

function hideImage() {
  currImgId = "";
  document.getElementById("imgStage").style.display = "none";
  document.getElementById("imgStageName").innerHTML = "";
  document.getElementById("imgStageImg").src = "";
}

/* Onload init function */
function onLoadFn() {

  new Vue({
        el: "#vueApp",
        data: {
          currLevel: -1,
          urlParts: [],
          loading: true,
          postList: [],
          listReq: false,
          postData: [],
          dataReq: false,
          lastErr: -1,
          galImgList: ['/imgs/gears.png', '/imgs/gears.png', '/imgs/gears.png', '/imgs/gears.png', '/imgs/gears.png', '/imgs/gears.png']
        },
        methods: {
          showImage: function(imgId) {
            showImage(imgId);
          },
          loadUrl: function(url, pushSt=true) {
            /* If the state is to be pushed */
            if(pushSt == true) {
              /* Push current URL to history */
              window.history.pushState(null, null, url);
            }
            
            /* Clear data */
            this.postList.length = 0;
            this.postData.length = 0;
            this.lastErr = -1;
            this.currLevel = -1;
              
            /* Check if this is a specifc post request or a intermediate path request */
            if((url == "") || (url.charAt(url.length - 1) == '/')) {
              this.listReq = true;
              this.dataReq = false;
              document.title = "Art & Technology";
            } else {
              this.listReq = false;
              this.dataReq = true;
            }
            
            /* Find out the number of the levels in the path */
            this.urlParts = url.split("/");
            this.urlParts = this.urlParts.filter(f => (f != ""));
            this.currLevel = this.urlParts.length;
            
            /* Load the data */
            this.loadData();
          },
          loadPost: function(post) {
            var url = "/" + post.cats[0] + "/" + post.url;
            this.loadUrl(url);
          },
          getDateTimeStr: function(ts) {
            var dt = new Date(ts);
            const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const h = dt.getHours();
            const m = dt.getMinutes();
            
            var str = days[dt.getDay()] + ', ' + dt.getDate() + ' ' + months[dt.getMonth()] + ' ' + dt.getFullYear() + ', ';
            str += ((h < 10) ? ('0' + h):(h));
            str += ':' + ((m < 10) ? ('0' + m):(m));
            
            return str;
          },
          popState: function(e) {
            this.loadUrl(window.location.pathname, false);
          },
          getThumbUrl: function(tUrl) {
            if((tUrl == "") || (tUrl == undefined)) {
              return "/imgs/gears.png";
            } else {
              return tUrl;
            }
          },
          getErrStr: function() {
            var str = "";
            switch(this.lastErr) {
              case 1:
                str = "No posts for this category";
                break;
              case 2:
                str = "Requested post not found";
                break;
              default:
                str = "HTTP Error " + this.lastErr;
                break;
            }
            return str;
          },
          loadGalImgs: function() {
            var vueObj = this;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", ("/getRandGalImgs?num=6" ));
            xhr.onreadystatechange = function() {
              if(this.readyState == 4) {
                if((this.status == 200) || (this.status == 304)) {
                  vueObj.galImgList = JSON.parse(this.responseText);
                }
              } 
            }
            xhr.send(); 
          },
          loadData: function() {
            /* load lists */
            if(this.listReq == true) {
              this.loading = true;
              var vueObj = this;
              var xhr = new XMLHttpRequest();
              var filReq = "";
              this.urlParts.forEach(function(u, i) {
                filReq += (((i != 0)?(','):('cat=')) + u);
              });
              if(filReq == "") { this.loadGalImgs(); }
              xhr.open("GET", ("/getPostList?" + filReq));
              xhr.onreadystatechange = function() {
                if(this.readyState == 4) {
                  if((this.status == 200) || (this.status == 304)) {
                    vueObj.postList = JSON.parse(this.responseText);
                    if(vueObj.postList.length > 0) {
                      vueObj.lastErr = 0;
                    } else {
                      vueObj.lastErr = 1;
                    }
                  } else {
                    vueObj.lastErr = this.status;
                  }
                  vueObj.loading = false;
                } 
              }
              xhr.send(); 
            /* load post */
            } else if(this.dataReq == true) {
              this.loading = true;
              var vueObj = this;
              var xhr = new XMLHttpRequest();
              xhr.open("GET", ("/post" + window.location.pathname));
              xhr.onreadystatechange = function() {
                if(this.readyState == 4) {
                  if((this.status == 200) || (this.status == 304)) {
                    var postData = JSON.parse(this.responseText);
                    if(postData.length > 0) {
                      vueObj.postData = postData;
                      vueObj.lastErr  = 0;
                      document.title  = vueObj.postData[0].title;
                    } else {
                      vueObj.lastErr = 2;
                    }
                  } else {
                    vueObj.lastErr = this.status;
                  }
                  vueObj.loading = false;
                } 
              }
              xhr.send(); 
            } else {
              /* Do nothing */
            }
          }
        },
        computed: {
          randomQuote: function() {
            var rStr = "";
            
            if((this.loading == false) && (this.lastErr == 0)) {
              var rIdx = Math.round(Math.random() * insQuotes.length);
              rStr = insQuotes[rIdx];
            }
            
            return rStr;
          }
        },
        mounted: function() {
          this.loadUrl(window.location.pathname);
        },
        created: function() {
          window.addEventListener('popstate',this.popState);
        },
        destroyed: function() {
          window.removeEventListener('popstate', this.popState);
        }
  });
}