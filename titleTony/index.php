<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Title -->
    <title>SVIACAM</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C500%2C600%2C700%2C800%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/vendor/icon-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/icon-line/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendor/icon-hs/style.css">
    <link rel="stylesheet" href="assets/vendor/hamburgers/hamburgers.min.css">
    <link rel="stylesheet" href="assets/vendor/animate.css">
    <link rel="stylesheet" href="assets/vendor/slick-carousel/slick/slick.css">

    <!-- CSS Template -->
    <link rel="stylesheet" href="assets/css/styles.op-architecture.css">
  </head>

  <body>
    <main>
      <!-- Header v1 -->
      <header id="js-header" class="u-header u-header--sticky-top u-header--change-appearance"
              data-header-fix-moment="100">
        <div class="dark-theme u-header__section g-bg-black-opacity-0_4 g-transition-0_3 g-py-8 g-py-17--md"
             data-header-fix-moment-exclude="dark-theme g-bg-black-opacity-0_4 g-py-17--md"
             data-header-fix-moment-classes="light-theme u-theme-shadow-v1 g-bg-white g-py-10--md">
          <nav class="navbar navbar-expand-lg p-0 g-px-15">
            <div class="container g-pos-rel">

              <!-- Navigation -->
              <?php include "include/nav.html"; ?>
              <!-- End Navigation -->

              <!-- Responsive Toggle Button -->
              <button class="navbar-toggler btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-15 g-right-0" type="button"
                      aria-label="Toggle navigation"
                      aria-expanded="false"
                      aria-controls="navBar"
                      data-toggle="collapse"
                      data-target="#navBar">
                <span class="hamburger hamburger--slider">
                  <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                  </span>
                </span>
              </button>
              <!-- End Responsive Toggle Button -->
            </div>
          </nav>
        </div>
      </header>
      <!-- End Header v1 -->

      <!-- Section Content -->
      <section  class="u-bg-overlay g-pos-rel g-theme-bg-blue-dark-v1-opacity-0_8--after">
          <div class="js-slide g-bg-img-hero g-height-100vh" style="background-image: url(assets/img-temp/background.jpg);"></div>
        </div>

        <div class="u-bg-overlay__inner g-absolute-centered w-100">
          <div class="container text-center g-max-width-750">
            <div class="text-uppercase u-heading-v2-4--bottom u-promo-title g-brd-primary">
              <h3 class="h3 g-letter-spacing-7 g-font-size-12 g-font-weight-400 g-color-white g-mb-25">Projet d'etude SVIACAM</h3>
              <h2 class="u-heading-v2__title g-line-height-1 g-letter-spacing-3 g-font-size-75 g-color-white mb-0">We are Web</h2>
            </div>

            <a class="btn btn-lg u-btn-darkred g-font-weight-800 g-font-size-18 text-uppercase g-rounded-50 g-px-40 g-py-15" href="app.php">
              Commencer
            </a>
          </div>
        </div>
      </section>
      <!-- End Section Content -->

      <a class="js-go-to u-go-to-v1" href="#!"
         data-type="fixed"
         data-position='{
           "bottom": 15,
           "right": 15
         }'
         data-offset-top="400"
         data-compensation="#js-header"
         data-show-effect="zoomIn">
        <i class="hs-icon hs-icon-arrow-top"></i>
      </a>
    </main>

    <!-- JS Global Compulsory -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>

    <!-- JS Implementing Plugins -->
    <script src="assets/vendor/appear.js"></script>
    <script src="assets/vendor/slick-carousel/slick/slick.js"></script>
    <script src="assets/vendor/gmaps/gmaps.min.js"></script>

    <!-- JS Unify -->
    <script src="assets/js/hs.core.js"></script>
    <script src="assets/js/components/hs.header.js"></script>
    <script src="assets/js/helpers/hs.hamburgers.js"></script>
    <script src="assets/js/components/hs.scroll-nav.js"></script>
    <script src="assets/js/components/hs.tabs.js"></script>
    <script src="assets/js/components/hs.carousel.js"></script>
    <script src="assets/js/components/gmap/hs.map.js"></script>
    <script src="assets/js/components/hs.go-to.js"></script>

    <!-- JS Customization -->
    <script src="assets/js/custom.js"></script>

    <!-- JS Plugins Init. -->
    <script>
      // initialization of google map
      function initMap() {
        $.HSCore.components.HSGMap.init('.js-g-map');
      }

      $(document).on('ready', function () {
        // initialization of carousel
        $.HSCore.components.HSCarousel.init('.js-carousel');

        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of go to section
        $.HSCore.components.HSGoTo.init('.js-go-to');

        $('#processes [role="tablist"] .nav-link').on('click', function () {
          setTimeout(function () {
            $('#processesTabs .js-carousel').slick('setPosition');
          }, 200);
        });
      });

      $(window).on('load', function() {
        // initialization of HSScrollNav
        $.HSCore.components.HSScrollNav.init($('.js-scroll-nav'), {
          duration: 700
        });
      });

      $(window).on('resize', function () {
        setTimeout(function () {
          $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
      });
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtt1z99GtrHZt_IcnK-wryNsQ30A112J0&callback=initMap" async></script>
  </body>
</html>
