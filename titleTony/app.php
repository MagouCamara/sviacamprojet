<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>SVIACAM</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="/favicon.ico">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendor/icon-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/vendor/icon-hs/style.css">
  <link rel="stylesheet" href="assets/vendor/animate.css">
  <link rel="stylesheet" href="assets/vendor/hs-megamenu/src/hs.megamenu.css">
  <link rel="stylesheet" href="assets/vendor/hamburgers/hamburgers.min.css">

  <!-- CSS Unify -->
  <link rel="stylesheet" href="assets/css/unify-core.css">
  <link rel="stylesheet" href="assets/css/unify-components.css">
  <link rel="stylesheet" href="assets/css/unify-globals.css">

</head>

<body>
  <main>
    <!-- Header -->
    <header id="js-header" class="u-header u-header--static">
      <div class="u-header__section u-header__section--light g-bg-black g-transition-0_3 g-py-10">
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
          <div class="container">
            <!-- Navigation -->
            <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg g-mr-40--lg" id="navBar">
              <?php include "include/nav.html" ?>
            </div>
            <!-- End Navigation -->
          </div>
        </nav>
      </div>
    </header>
    <!-- End Header -->

    <!-- Breadcrumb -->
    <section class="g-my-30">
      <div class="container">
        <ul class="u-list-inline">
        </ul>
      </div>
    </section>
    <!-- End Breadcrumb -->

      <section class="container g-pb-100">

        <div class="row">
                  <div class="col-lg-6 g-mb-40 g-mb-0--lg">
                    <video id="monitor" autoplay style="display: none; width: 320px; height: 240px;"></video>
                    <div id="canvasLayers" width="320" height="240" style=" /*border: 5px solid pink;*/ position: absolute;/*top : 0px;*/">
                      <canvas id="videoCanvas" width="320" height="240" style="/*z-index: 1;*/position: absolute; /*top:0px;*/"></canvas>

                      <canvas id="layer2" width="320" height="240" style="z-index: 2; position: absolute; opacity:0.5; border: 3px solid yellow;"></canvas>

                      <canvas id="layerA" width="40" height="40" style="/*z-index: 2; */position: absolute; left:5px; top:5px; opacity:0.5; border: 3px solid red; display:none;"></canvas>
                      <canvas id="layerB" width="40" height="40" style="/*z-index: 2; */position: absolute; left:140px; top:5px; opacity:0.5; border: 3px solid green; display:none;"></canvas>
                      <canvas id="layerC" width="40" height="40" style="/*z-index: 2; */; position: absolute; left:270px; top:5px; opacity:0.5; border: 3px solid blue; display:none;"></canvas>
                      <!-- <canvas id="layer4" width="70" height="70" style="z-index: 2; position: absolute; left:5px; top:150px; opacity:0.5; border: 3px solid yellow;"></canvas> -->
                    </div>

                    <canvas id="blendCanvas" style="border : 3px solid yellow; position: relative; left: 350px; width: 320px; height: 240px; display:none;"></canvas>

                    <div id="messageError"></div>
                    <div id="messageArea" style="position: fixed; left: 30%; top: 30px;">
                      <font size="+4" color="blue">
                        <b> button blue Triggered.</b>
                      </font>
                    </div>

                  </div>

                  <div class="col-lg-5 g-mb-40 g-mb-10--lg">
                    <form role="form">
                        <div>
                            <label>   <input type="checkbox" class="i-checks" id="i-checks" onclick="checking1(this)"> Activé le capteur Rouge</label>
                              <label>   <input type="checkbox" class="i-checks" id="i-checks" onclick="checking2(this)"> Activé le capteur Vert</label>
                                <label>   <input type="checkbox" class="i-checks" id="i-checks" onclick="checking3(this)"> Activé le capteur Bleu</label>
                        </div>
                    </form>

                  </div>
        </div>

      </section>

    <a class="js-go-to u-go-to-v1" href="#!" data-type="fixed" data-position='{
     "bottom": 15,
     "right": 15
   }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
      <i class="hs-icon hs-icon-arrow-top"></i>
    </a>
  </main>

  <div class="u-outer-spaces-helper"></div>


  <!-- JS Global Compulsory -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
  <script src="assets/vendor/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>


  <!-- JS Implementing Plugins -->
  <script src="assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>

  <!-- JS Unify -->
  <script src="assets/js/hs.core.js"></script>
  <script src="assets/js/components/hs.header.js"></script>
  <script src="assets/js/helpers/hs.hamburgers.js"></script>
  <script src="assets/js/components/hs.tabs.js"></script>
  <script src="assets/js/components/hs.go-to.js"></script>

  <!-- JS Customization -->
  <script src="assets/js/custom.js"></script>

  <script src="js/RequestAnimationFrame.js"></script>
  <script src="js/media.js"></script>


  <!-- JS Plugins Init. -->
  <script>
    // assign global variables to HTML elements
    var video = document.getElementById( 'monitor' );
    var videoCanvas = document.getElementById( 'videoCanvas' );
    var videoContext = videoCanvas.getContext( '2d' );

    var layer2Canvas = document.getElementById( 'layer2' );
    var layer2Context = layer2Canvas.getContext( '2d' );

    var blendCanvas  = document.getElementById( "blendCanvas" );
    var blendContext = blendCanvas.getContext('2d');

    var messageArea = document.getElementById( "messageArea" );

    // these changes are permanent
    videoContext.translate(320, 0);
    videoContext.scale(-1, 1);

    // background color if no video present
    videoContext.fillStyle = '#005337';
    videoContext.fillRect( 0, 0, videoCanvas.width, videoCanvas.height );

    var buttons = [];
    var large = 40 ;
    var haut = 40 ;
    // ACTIVE CANVAS 1
        function checking1 (check) {
            if (check.checked)
              {
                // document.getElementById("canvas1").style.display="block";
              // var button1 = document.getElementById('layer1');
              var button1 = new Image();
               button1.src ="images/square.png";
              var buttonData1 = { name:"red", image:button1, x:131 - 96 - 30, y:5, w:large, h:haut };
              // var buttonData1 = { name:"red"};
              buttons.push( buttonData1 );

              document.getElementById("layerA").style.display="block";
            }
              else {
                for(var i = buttons.length -1; i>=0; i--)
                {
                  if(buttons[i].name === "red")
                  {
                    buttons.splice( i , 1);
                  }
                }
                document.getElementById("layerA").style.display="none";
              }
        };

        // ACTIVE CANVAS 2
            function checking2 (check) {
                if (check.checked)
                {
                  // var button2 = document.getElementById('layer2');
                 var button2 = new Image();
                button2.src ="images/square.png";
                  var buttonData2 = { name:"green", image:button2, x:224 - 64 - 20, y:5, w:large, h:haut };
                 buttons.push( buttonData2 );

                 document.getElementById("layerB").style.display="block";
               }
               else {
                 for(var i = buttons.length -1; i>=0; i--)
                 {
                   if(buttons[i].name === "green")
                   {
                     buttons.splice( i , 1);
                   }
                 }
                 document.getElementById("layerB").style.display="none";
               }
            };

            // ACTIVE CANVAS 3
                function checking3 (check) {
                    if (check.checked)
                    {
                      // var button3 = document.getElementById('layer3');
                    var button3 = new Image();
                    button3.src ="images/square.png";
                     var buttonData3 = { name:"blue", image:button3, x:312 - 32 - 10, y:5, w:large, h:haut };
                    buttons.push( buttonData3 );

                    document.getElementById("layerC").style.display="block";
                  }
                  else {
                    for(var i = buttons.length -1; i>=0; i--)
                    {
                      if(buttons[i].name === "blue")
                      {
                        buttons.splice( i , 1);
                      }
                    }

                    document.getElementById("layerC").style.display="none";
                  }
                };


    function animate()
    {
      requestAnimationFrame( animate );
      render();
      blend();
      checkAreas();
    }
    // start the loop
    animate();

    function render()
    {
      if ( video.readyState === video.HAVE_ENOUGH_DATA )
      {
        // mirror video
        videoContext.drawImage( video,0,0,videoCanvas.width, videoCanvas.height );
        for ( var i = 0; i < buttons.length; i++ )
          layer2Context.drawImage( buttons[i].image, buttons[i].x, buttons[i].y, buttons[i].w, buttons[i].h );
      }
    }

    var lastImageData;

    function blend()
    {
      var width  = videoCanvas.width;
      var height = videoCanvas.height;
      // get current webcam image data
      var sourceData = videoContext.getImageData(0, 0, width, height);
      // create an image if the previous image doesn�t exist
      if (!lastImageData) lastImageData = videoContext.getImageData(0, 0, width, height);
      // create a ImageData instance to receive the blended result
      var blendedData = videoContext.createImageData(width, height);
      // blend the 2 images
      differenceAccuracy(blendedData.data, sourceData.data, lastImageData.data);
      // draw the result in a canvas
      blendContext.putImageData(blendedData, 0, 0);
      // store the current webcam image
      lastImageData = sourceData;
    }


    function differenceAccuracy(target, data1, data2)
    {
      if (data1.length != data2.length) return null;
      var i = 0;
      while (i < (data1.length * 0.25))
      {
        var average1 = (data1[4*i] + data1[4*i+1] + data1[4*i+2])/3;
        var average2 = (data2[4*i] + data2[4*i+1] + data2[4*i+2])/3;
        var diff = threshold(fastAbs(average1 - average2));
        target[4*i]   = diff;
        target[4*i+1] = diff;
        target[4*i+2] = diff;
        target[4*i+3] = 0xFF;
        ++i;
      }
    }
    function fastAbs(value)
    {
      return (value ^ (value >> 31)) - (value >> 31);
    }
    function threshold(value)
    {
      return (value > 0x15) ? 0xFF : 0;
    }

    // check if white region from blend overlaps area of interest (e.g. triggers)
    function checkAreas()
    {
      for (var b = 0; b < buttons.length; b++)	{
        // get the pixels in a note area from the blended image
         var blendedData = blendContext.getImageData( buttons[b].x, buttons[b].y, buttons[b].w, buttons[b].h );
        // calculate the average lightness of the blended data
        var i = 0;
        var sum = 0;
        var countPixels = blendedData.data.length * 0.25;
        while (i < countPixels)
        {
          sum += (blendedData.data[i*4] + blendedData.data[i*4+1] + blendedData.data[i*4+2]);
          ++i;
        }
        // calculate an average between of the color values of the note area [0-255]
        var average = Math.round(sum / (3 * countPixels));
        if (average > 50) // more than 40% movement detected
        {

          if (buttons[b].name == "blue") {
            console.log( "Button " + buttons[b].name + " triggered." ); // do stuff
            //window.open('http://www.google.fr','fullscreen=yes');
            window.scrollBy(0,-100);

        }
          else if (buttons[b].name == "red") {
            console.log( "Button " + buttons[b].name + " triggered." ); // do stuff
            window.open('http://www.eurosport.fr','fullscreen=yes');

          }
          else {
            console.log( "Button " + buttons[b].name + " triggered." ); // do stuff
            //window.open('http://www.yahoo.fr','fullscreen=yes');
            window.scrollBy(0,100);

          }
          //window.open('http://www.google.fr','fullscreen=yes');break;
         // window.scrollBy(0,100);
          //window.history.back();
          messageArea.innerHTML = "<font size='+4' color=" + buttons[b].name + "><b>Button " + buttons[b].name + " triggered.</b></font>";
        }
      }
    }

    $(document).on('ready', function () {
        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');
      });

      $(window).on('load', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
          event: 'hover',
          pageContainer: $('.container'),
          breakpoint: 991
        });
      });

      $(window).on('resize', function () {
        setTimeout(function () {
          $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
      });
  </script>

</body>

</html>
