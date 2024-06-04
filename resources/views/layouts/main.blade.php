<!DOCTYPE html>
<html >
<head>
    <!-- Site made with Mobirise Online Website Builder v5.9.13, https://a.mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.9.13, a.mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <meta name="description" content="Strona internetowa oferująca szeroki wybór wynajmu sprzętu budowlanego w Polsce. Znajdź, porównaj i wynajmij sprzęt budowlany online już dziś!">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://r.mobirisesite.com/485019/assets/web/assets/mobirise-icons2/mobirise2.css?rnd=1717420586975">
    <link rel="stylesheet" href="https://r.mobirisesite.com/485019/assets/bootstrap/css/bootstrap.min.css?rnd=1717420586975">
    <link rel="stylesheet" href="https://r.mobirisesite.com/485019/assets/bootstrap/css/bootstrap-grid.min.css?rnd=1717420586975">
    <link rel="stylesheet" href="https://r.mobirisesite.com/485019/assets/bootstrap/css/bootstrap-reboot.min.css?rnd=1717420586975">
    <link rel="stylesheet" href="https://r.mobirisesite.com/485019/assets/parallax/jarallax.css?rnd=1717420586975">
    <link rel="stylesheet" href="https://r.mobirisesite.com/485019/assets/dropdown/css/style.css?rnd=1717420586975">
    <link rel="stylesheet" href="https://r.mobirisesite.com/485019/assets/socicon/css/styles.css?rnd=1717420586975">
    <link rel="stylesheet" href="https://r.mobirisesite.com/485019/assets/theme/css/style.css?rnd=1717420586975">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;700&display=swap&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;700&display=swap&display=swap"></noscript>
    <link rel="stylesheet" href="https://r.mobirisesite.com/485019/assets/css/mbr-additional.css?rnd=1717420586975" type="text/css">



    <style>
        .navbar-fixed-top {
            top: auto;
        }
        #mobiriseBanner.container-banner {
            height: 8rem;
            opacity: 1;
            -webkit-animation: 4s linear animationHeight;
            -moz-animation: 4s linear animationHeight;
            -o-animation: 4s linear animationHeight;
            animation: 4s linear animationHeight;
            transition: all  0.5s;
        }
        #mobiriseBanner.container-banner.container-banner-closing {
            pointer-events: none;
            height: 0;
            opacity: 0;
            -webkit-animation: 0.5s linear animationClosing;
            -moz-animation:  0.5s linear animationClosing;
            -o-animation:  0.5s linear animationClosing;
            animation:  0.5s linear animationClosing;
        }
        #mobiriseBanner .banner {
            min-height: 8rem;
            position:fixed;
            top: 0;
            left: 0;
            right: 0;
            background: #fff;
            padding: 10px;
            opacity:1;
            -webkit-animation: 4s linear animationBanner;
            -moz-animation: 4s linear animationBanner;
            -o-animation: 4s linear animationBanner;
            animation: 4s linear animationBanner;
            z-index: 1031;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        #mobiriseBanner .banner p {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            animation: none;
            visibility: visible;
        }
        #mobiriseBanner .buy-license {
            text-decoration: underline;
        }
        #mobiriseBanner .banner .btn {
            margin: 0.3rem 0.5rem;
            animation: none;
            visibility: visible;
        }
        .navbar.opened {
            z-index: 1032;
        }
        @-webkit-keyframes animationBanner { 0% { opacity: 0; top: -8rem; } 75% { opacity: 0; top: -8rem; } 100% { opacity: 1; top: 0; } }
        @-moz-keyframes animationBanner { 0% { opacity: 0; top: -8rem; } 75% { opacity: 0; top: -8rem; } 100% { opacity: 1; top: 0; } }
        @-o-keyframes animationBanner { 0% { opacity: 0; top: -8rem; } 75% { opacity: 0; top: -8rem; } 100% { opacity: 1; top: 0; } }
        @keyframes animationBanner { 0% { opacity: 0; top: -8rem; } 75% { opacity: 0; top: -8rem; } 100% { opacity: 1; top: 0; } }
        @-webkit-keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 8rem; } }
        @-moz-keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 8rem; } }
        @-o-keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 8rem; } }
        @keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 8rem; } }

        @-webkit-keyframes animationClosing { 0% { height: 8rem; opacity: 1; } 30% { height: 8rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
        @-moz-keyframes animationClosing { 0% { height: 8rem; opacity: 1; } 30% { height: 8rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
        @-o-keyframes animationClosing { 0% { height: 8rem; opacity: 1; } 30% { height: 8rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
        @keyframes animationClosing { 0% { height: 8rem; opacity: 1; } 30% { height: 8rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }

        @media(max-width: 767px) {
            #mobiriseBanner.container-banner {
                height: 12rem;
            }
            #mobiriseBanner .banner {
                min-height: 12rem;
            }
            @-webkit-keyframes animationBanner { 0% { opacity: 0; top: -12rem; } 75% { opacity: 0; top: -12rem; } 100% { opacity: 1; top: 0; } }
            @-moz-keyframes animationBanner { 0% { opacity: 0; top: -12rem; } 75% { opacity: 0; top: -12rem; } 100% { opacity: 1; top: 0; } }
            @-o-keyframes animationBanner { 0% { opacity: 0; top: -12rem; } 75% { opacity: 0; top: -12rem; } 100% { opacity: 1; top: 0; } }
            @keyframes animationBanner { 0% { opacity: 0; top: -12rem; } 75% { opacity: 0; top: -12rem; } 100% { opacity: 1; top: 0; } }
            @-webkit-keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 12rem; } }
            @-moz-keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 12rem; } }
            @-o-keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 12rem; } }
            @keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 12rem; } }

            @-webkit-keyframes animationClosing { 0% { height: 12rem; opacity: 1; } 30% { height: 12rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
            @-moz-keyframes animationClosing { 0% { height: 12rem; opacity: 1; } 30% { height: 12rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
            @-o-keyframes animationClosing { 0% { height: 12rem; opacity: 1; } 30% { height: 12rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
            @keyframes animationClosing { 0% { height: 12rem; opacity: 1; } 30% { height: 12rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
        }
    </style>
</head>
<body>

<section data-bs-version="5.1" class="menu menu2 cid-ueDKg7QU0K" once="menu" id="menu-5-ueDKg7QU0K">
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container" bis_skin_checked="1">
            <div class="navbar-brand" bis_skin_checked="1">
				<span class="navbar-logo">
					<a href="{{ route('main') }}" bis_skin_checked="1" bis_size="{&quot;x&quot;:109,&quot;y&quot;:26,&quot;w&quot;:103,&quot;h&quot;:68,&quot;abs_x&quot;:109,&quot;abs_y&quot;:26}">
						<img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 4.3rem;" bis_size="{&quot;x&quot;:109,&quot;y&quot;:26,&quot;w&quot;:103,&quot;h&quot;:68,&quot;abs_x&quot;:109,&quot;abs_y&quot;:26}" bis_id="bn_ey694vk0limpu498l2qohc">
					</a>
				</span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-4" href="{{ route('main') }}" bis_skin_checked="1">Rentify</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger" bis_skin_checked="1">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" bis_skin_checked="1">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                        <a class="nav-link link text-black display-4" href="{{ route('onas') }}" bis_skin_checked="1">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="{{ route('kontakt') }}" aria-expanded="false" bis_skin_checked="1">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="{{ route('wypozyczenia.index') }}" aria-expanded="false" bis_skin_checked="1">Zarezerwuj</a>
                    </li>
                </ul>
                <div class="navbar-buttons mbr-section-btn" bis_skin_checked="1"><a class="btn btn-primary display-4" href="{{ route('login') }}" bis_skin_checked="1">Logowanie</a></div>
            </div>
        </div>
    </nav>
</section>

@yield('content')

<section data-bs-version="5.1" class="footer3 cid-ueDKg7ZUgC" once="footers" id="footer-6-ueDKg7ZUgC">

    <div class="container">
        <div class="row">
            <div class="row-links">
                <ul class="header-menu">
                    <li class="header-menu-item mbr-fonts-style display-5">
                        <a href="onas" class="text-white">O nas</a>
                    </li>
                    <li class="header-menu-item mbr-fonts-style display-5">
                        <a href="#" class="text-white">Regulamin</a>
                    </li>
                    <li class="header-menu-item mbr-fonts-style display-5">
                        <a href="kontakt" class="text-white">Kontakt</a>
                    </li></ul>
            </div>


            <div class="col-12 mt-4">
                <p class="mbr-fonts-style copyright display-7">© 2024 Wypożyczalnia Sprzętu Budowlanego. Wszelkie prawa zastrzeżone.</p>
            </div>
        </div>
    </div>
</section>


<script src="https://r.mobirisesite.com/485019/assets/web/assets/jquery/jquery.min.js?rnd=1717420586975"></script>
<script src="https://r.mobirisesite.com/485019/assets/bootstrap/js/bootstrap.bundle.min.js?rnd=1717420586975"></script>
<script src="https://r.mobirisesite.com/485019/assets/parallax/jarallax.js?rnd=1717420586975"></script>
<script src="https://r.mobirisesite.com/485019/assets/smoothscroll/smooth-scroll.js?rnd=1717420586975"></script>
<script src="https://r.mobirisesite.com/485019/assets/ytplayer/index.js?rnd=1717420586975"></script>
<script src="https://r.mobirisesite.com/485019/assets/dropdown/js/navbar-dropdown.js?rnd=1717420586975"></script>
<script src="https://r.mobirisesite.com/485019/assets/theme/js/script.js?rnd=1717420586975"></script>
<script src="https://r.mobirisesite.com/485019/assets/formoid/formoid.min.js?rnd=1717420586975"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: false // Disable automatic slide switching
        });

        $('.carousel .carousel-control-prev').click(function(e) {
            var id = $(this).closest('.carousel').attr('id');
            $('#' + id).carousel('prev');
        });

        $('.carousel .carousel-control-next').click(function(e) {
            var id = $(this).closest('.carousel').attr('id');
            $('#' + id).carousel('next');
        });
    });
</script>


</body>
</html>
