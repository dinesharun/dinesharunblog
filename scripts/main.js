/* Onload init function */
function onLoadFn() {
  new Vue({
        el: "#vueApp",
        data: {
          loading: true,
          currLevel: -1,
          postData: {},
          postValid: false
        },
        methods: {
          onLoad: function() {
            var urlParts = window.location.pathname.split("/");
            urlParts = urlParts.filter(f => (f != ""));
            this.currLevel = urlParts.length;

            /* load root links */
            if(this.currLevel == 0) {
              this.loading = false;
            /* load category links */
            } else if(this.currLevel == 1) {
              this.loading = false;
            /* load the post */
            } else {
              var vueObj = this;
              var xhr = new XMLHttpRequest();
              xhr.open("GET", ("/post" + window.location.pathname));
              xhr.onreadystatechange = function() {
                if(this.readyState == 4) {
                  if(this.status == 200) {
                    vueObj.postValid = true;
                    vueObj.postData = JSON.parse(this.responseText);
                  }
                  vueObj.loading = false;
                } 
              }
              xhr.send(); 
            }
          }
        },
        mounted: function() {
          this.onLoad();
        }
  });
}