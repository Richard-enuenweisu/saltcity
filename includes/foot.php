<!-- Footer -->
  <section id="footer">
    <div class="container-fluid">
      <div class="row home-header-flex">
        <div class="col-sm-6 col-md-6 pusher">
          <h1>Join the community of word believers today</h1>
            <p>
              If God is already stirring your heart to visit our church or you are looking for place where the gospel of Truth is rightly divided in atmosphere that is always saturated by God’s Spirit, then you might be one of us. 

              What are you doing this weekend?
              Join us!
            </p>          
          <ul class="list-unstyled list-inline social text-center">
            <li class="list-inline-item"><a href="https://web.facebook.com/mysaltcity/?_rdc=1&_rdr">
              <i class="fa fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="https://twitter.com/mysaltcity"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="https://www.instagram.com/mysaltcity/"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="mailto://hello@mysaltcity.org"><i class="fa fa-google-plus"></i></a></li>
            <!-- <li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li> -->
          </ul>
        </div>
        </hr>
      </div>

      <div class="row text-center text-xs-center text-sm-left text-md-left">
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3">
              <img src="images/logo.png" style="width: 90px;">
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
              <!-- <h5>Quick links</h5> -->
              <ul class="list-unstyled quick-links">
                <li><a href="javascript:void();">Home</a></li>
                <li><a href="javascript:void();">About us</a></li>
                <li><a href="javascript:void();">Sermon</a></li>
                <li><a href="javascript:void();">Blog</a></li>
                <li><a href="javascript:void();">Give</a></li>
              </ul>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
              <!-- <h5>Quick links</h5> -->
              <ul class="list-unstyled quick-links">
                <li><a href="javascript:void();">SaltKids</a></li>
                <li><a href="javascript:void();">SaltGroups</a></li>
                <li><a href="javascript:void();">Saltiness Institute </a></li>
                <li><a href="javascript:void();">Confessions</a></li>
                <li><a href="javascript:void();">Get Involved</a></li>
              </ul>
            </div> 
            <div class="col-xs-12 col-sm-3 col-md-3">
              <!-- <h5>Quick links</h5> -->
              <ul class="list-unstyled quick-links">
                <li><a href="javascript:void();">Need Prayers</a></li>
                <li><a href="javascript:void();">Location/Times</a></li>
                <li><a href="javascript:void();">Need Counseling </a></li>
              </ul>
            </div> 
            </div>            
          </div>
        <div class="col-sm-3 col-md-3">
          <h5>Quick Contact</h5>
          <ul class="list-unstyled quick-links">
            <li><a href="tel:0803 059 7015">0803 059 7015</a></li>
            <li class="small"><a href="mailto:saltdesk@mysaltcity.org">hello@mysaltcity.org</a></li>
          </ul>          
        </div>
      </div>  
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
          <p class="h6">
            <hr style="border-color: #fff; width: 80%;">
            Allrights Reserved &copy; SalcityChurch 2019 | <span><a href="">Privacy Policy</a></span>
          </p>
        </div>
        </hr>
      </div>  
    </div>
  </section>
  <!-- ./Footer -->  
  <script type="text/javascript">
//scrolling text script
var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };      
  </script>
  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })  

// Music Player script
    $(document).ready(function () {
        $('.mediPlayer').mediaPlayer();
    }); 
  </script>
  
  <script src="music-player/jquery-music.js"></script>
  <script src="music-player/player.js"></script>
  <script type="text/javascript" src="bootstrap-4.3.1-dist/js/custom.js"></script>   
  <script type="text/javascript" src="bootstrap-4.3.1-dist/js/popper.js"></script>   
  <script src="bootstrap-4.3.1-dist/dist/bsnav.min.js"></script>
  <script type="text/javascript" src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
  <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script> -->
</body>
</html>
    </body>
</html>