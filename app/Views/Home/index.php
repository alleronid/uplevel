            <?php $this->extend('template'); ?>
            
            <?php $this->section('css'); ?>
            <style>
                @media (min-width:976px) {
                    #promoImage {
                    height: 500px;
                    width: auto;
                    }
                }
                
                @media (max-width:900px) {
                    #promoImage {
                    height: auto;
                    width: 100%;
                    }
                }
                
                @media (min-width:976px) {
                    .swiper-container {
                    width: 1000px !important;
                    }
                }

                .shadow-md {
                --tw-shadow: 0 4px 16px 1px rgb(0 0 0 / 0.1), 0 2px 4px 2px rgb(0 0 0 / 0.1);
                --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
                box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow);
            }
            .text-gray-600 {
                color:#000;
            }
            .text-lg {
                font-size: 1.125rem;
                line-height: 1.75rem;
            }
            .form-control:focus {
                border: 1px solid #cfd5db;
                background-color: #ffffff;
                color: #495057 !important;
            }
            .navbar .container .col,.navbar .container .col-10 {
                padding:0px !important;
            }
                

                .tab-category.nav-pills .nav-link {
                    color: #ddd;
                }
                .tab-category.nav-pills .nav-link:hover {
                    color: #fff;
                }
                .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
                color: #fff;
                background-color: var(--warna_3);
                border-bottom: 3px solid #fff;
                }
                .nav-pills .nav-link {
                    margin:0px !important;
                    font-size:8px;
                }
                
                .swiper-pagination-bullet{border: 1px solid #1da1f2;}.swiper-pagination-bullet-active{background:#1da1f2}
                img:not([draggable]), embed, object, video {
                    max-width: 100%;
                    height: auto;
                }
                
                .swiper-container {
                    margin-left: auto;
                    margin-right: auto;
                    position: relative;
                    overflow: hidden;
                    z-index: 1
                }
                
                .swiper-container-no-flexbox .swiper-slide {
                    float: left
                }
                
                .swiper-container-vertical>.swiper-wrapper {
                    -webkit-box-orient: vertical;
                    -ms-flex-direction: column;
                    flex-direction: column
                }
                
                .swiper-wrapper {
                    position: relative;
                    width: 100%;
                    height: 100%;
                    z-index: 1;
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-transition-property: -webkit-transform;
                    transition-property: -webkit-transform;
                    transition-property: transform;
                    transition-property: transform, -webkit-transform;
                    box-sizing: content-box
                }
                
                .swiper-container-android .swiper-slide,
                .swiper-wrapper {
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0)
                }
                
                .swiper-container-multirow>.swiper-wrapper {
                    -webkit-box-lines: multiple;
                    -moz-box-lines: multiple;
                    -ms-flex-wrap: wrap;
                    flex-wrap: wrap
                }
                
                .swiper-container-free-mode>.swiper-wrapper {
                    -webkit-transition-timing-function: ease-out;
                    transition-timing-function: ease-out;
                    margin: 0 auto
                }
                
                .swiper-slide {
                    -webkit-flex-shrink: 0;
                    -ms-flex: 0 0 auto;
                    -ms-flex-negative: 0;
                    flex-shrink: 0;
                    width: 100%;
                    height: 100%;
                    position: relative
                }
                
                .swiper-container-autoheight,
                .swiper-container-autoheight .swiper-slide {
                    height: auto
                }
                
                .swiper-container-autoheight .swiper-wrapper {
                    -webkit-box-align: start;
                    -ms-flex-align: start;
                    align-items: flex-start;
                    -webkit-transition-property: -webkit-transform, height;
                    -webkit-transition-property: height, -webkit-transform;
                    transition-property: height, -webkit-transform;
                    transition-property: transform, height;
                    transition-property: transform, height, -webkit-transform
                }
                
                .swiper-container .swiper-notification {
                    position: absolute;
                    left: 0;
                    top: 0;
                    pointer-events: none;
                    opacity: 0;
                    z-index: -1000
                }
                
                .swiper-wp8-horizontal {
                    -ms-touch-action: pan-y;
                    touch-action: pan-y
                }
                
                .swiper-wp8-vertical {
                    -ms-touch-action: pan-x;
                    touch-action: pan-x
                }
                
                .swiper-button-next,
                .swiper-button-prev {
                    position: absolute;
                    top: 50%;
                    width: 27px;
                    height: 44px;
                    margin-top: -22px;
                    z-index: 10;
                    cursor: pointer;
                    background-size: 27px 44px;
                    background-position: center;
                    background-repeat: no-repeat
                }
                
                .swiper-button-next.swiper-button-disabled,
                .swiper-button-prev.swiper-button-disabled {
                    opacity: .35;
                    cursor: auto;
                    pointer-events: none
                }
                
                .swiper-button-prev,
                .swiper-container-rtl .swiper-button-next {
                    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M0%2C22L22%2C0l2.1%2C2.1L4.2%2C22l19.9%2C19.9L22%2C44L0%2C22L0%2C22L0%2C22z'%20fill%3D'%23007aff'%2F%3E%3C%2Fsvg%3E");
                    left: 10px;
                    right: auto
                }
                
                .swiper-button-prev.swiper-button-black,
                .swiper-container-rtl .swiper-button-next.swiper-button-black {
                    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M0%2C22L22%2C0l2.1%2C2.1L4.2%2C22l19.9%2C19.9L22%2C44L0%2C22L0%2C22L0%2C22z'%20fill%3D'%23000000'%2F%3E%3C%2Fsvg%3E")
                }
                
                .swiper-button-prev.swiper-button-white,
                .swiper-container-rtl .swiper-button-next.swiper-button-white {
                    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M0%2C22L22%2C0l2.1%2C2.1L4.2%2C22l19.9%2C19.9L22%2C44L0%2C22L0%2C22L0%2C22z'%20fill%3D'%23ffffff'%2F%3E%3C%2Fsvg%3E")
                }
                
                .swiper-button-next,
                .swiper-container-rtl .swiper-button-prev {
                    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M27%2C22L27%2C22L5%2C44l-2.1-2.1L22.8%2C22L2.9%2C2.1L5%2C0L27%2C22L27%2C22z'%20fill%3D'%23007aff'%2F%3E%3C%2Fsvg%3E");
                    right: 10px;
                    left: auto
                }
                
                .swiper-button-next.swiper-button-black,
                .swiper-container-rtl .swiper-button-prev.swiper-button-black {
                    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M27%2C22L27%2C22L5%2C44l-2.1-2.1L22.8%2C22L2.9%2C2.1L5%2C0L27%2C22L27%2C22z'%20fill%3D'%23000000'%2F%3E%3C%2Fsvg%3E")
                }
                
                .swiper-button-next.swiper-button-white,
                .swiper-container-rtl .swiper-button-prev.swiper-button-white {
                    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M27%2C22L27%2C22L5%2C44l-2.1-2.1L22.8%2C22L2.9%2C2.1L5%2C0L27%2C22L27%2C22z'%20fill%3D'%23ffffff'%2F%3E%3C%2Fsvg%3E")
                }
                
                .swiper-pagination {
                    position: absolute;
                    text-align: center;
                    -webkit-transition: .3s;
                    transition: .3s;
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                    z-index: 10
                }
                
                .swiper-pagination.swiper-pagination-hidden {
                    opacity: 0
                }
                
                .swiper-container-horizontal>.swiper-pagination-bullets,
                .swiper-pagination-custom,
                .swiper-pagination-fraction {
                    bottom: 10px;
                    left: 0;
                    width: 100%
                }
                
                .swiper-pagination-bullet {
                    width: 8px;
                    height: 8px;
                    display: inline-block;
                    border-radius: 100%;
                    background: #000;
                    opacity: .2
                }
                
                button.swiper-pagination-bullet {
                    border: none;
                    margin: 0;
                    padding: 0;
                    box-shadow: none;
                    -moz-appearance: none;
                    -ms-appearance: none;
                    -webkit-appearance: none;
                    appearance: none
                }
                
                .swiper-pagination-clickable .swiper-pagination-bullet {
                    cursor: pointer
                }
                
                .swiper-pagination-white .swiper-pagination-bullet {
                    background: #fff
                }
                
                .swiper-pagination-bullet-active {
                    opacity: 1;
                    background: #007aff
                }
                
                .swiper-pagination-white .swiper-pagination-bullet-active {
                    background: #fff
                }
                
                .swiper-pagination-black .swiper-pagination-bullet-active {
                    background: #000
                }
                
                .swiper-container-vertical>.swiper-pagination-bullets {
                    right: 10px;
                    top: 50%;
                    -webkit-transform: translate3d(0, -50%, 0);
                    transform: translate3d(0, -50%, 0)
                }
                
                .swiper-container-vertical>.swiper-pagination-bullets .swiper-pagination-bullet {
                    margin: 5px 0;
                    display: block
                }
                
                .swiper-container-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet {
                    margin: 0 5px
                }
                
                .swiper-pagination-progress {
                    background: rgba(0, 0, 0, .25);
                    position: absolute
                }
                
                .swiper-pagination-progress .swiper-pagination-progressbar {
                    background: #007aff;
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    -webkit-transform: scale(0);
                    transform: scale(0);
                    -webkit-transform-origin: left top;
                    transform-origin: left top
                }
                
                .swiper-container-rtl .swiper-pagination-progress .swiper-pagination-progressbar {
                    -webkit-transform-origin: right top;
                    transform-origin: right top
                }
                
                .swiper-container-horizontal>.swiper-pagination-progress {
                    width: 100%;
                    height: 4px;
                    left: 0;
                    top: 0
                }
                
                .swiper-container-vertical>.swiper-pagination-progress {
                    width: 4px;
                    height: 100%;
                    left: 0;
                    top: 0
                }
                
                .swiper-pagination-progress.swiper-pagination-white {
                    background: rgba(255, 255, 255, .5)
                }
                
                .swiper-pagination-progress.swiper-pagination-white .swiper-pagination-progressbar {
                    background: #fff
                }
                
                .swiper-pagination-progress.swiper-pagination-black .swiper-pagination-progressbar {
                    background: #000
                }
                
                .swiper-container-3d {
                    -webkit-perspective: 1200px;
                    -o-perspective: 1200px;
                    perspective: 1200px
                }
                
                .swiper-container-3d .swiper-cube-shadow,
                .swiper-container-3d .swiper-slide,
                .swiper-container-3d .swiper-slide-shadow-bottom,
                .swiper-container-3d .swiper-slide-shadow-left,
                .swiper-container-3d .swiper-slide-shadow-right,
                .swiper-container-3d .swiper-slide-shadow-top,
                .swiper-container-3d .swiper-wrapper {
                    -webkit-transform-style: preserve-3d;
                    transform-style: preserve-3d
                }
                
                .swiper-container-3d .swiper-slide-shadow-bottom,
                .swiper-container-3d .swiper-slide-shadow-left,
                .swiper-container-3d .swiper-slide-shadow-right,
                .swiper-container-3d .swiper-slide-shadow-top {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    pointer-events: none;
                    z-index: 10
                }
                
                .swiper-container-3d .swiper-slide-shadow-left {
                    background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, 0)));
                    background-image: -webkit-linear-gradient(right, rgba(0, 0, 0, .5), rgba(0, 0, 0, 0));
                    background-image: linear-gradient(to left, rgba(0, 0, 0, .5), rgba(0, 0, 0, 0))
                }
                
                .swiper-container-3d .swiper-slide-shadow-right {
                    background-image: -webkit-gradient(linear, right top, left top, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, 0)));
                    background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .5), rgba(0, 0, 0, 0));
                    background-image: linear-gradient(to right, rgba(0, 0, 0, .5), rgba(0, 0, 0, 0))
                }
                
                .swiper-container-3d .swiper-slide-shadow-top {
                    background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, 0)));
                    background-image: -webkit-linear-gradient(bottom, rgba(0, 0, 0, .5), rgba(0, 0, 0, 0));
                    background-image: linear-gradient(to top, rgba(0, 0, 0, .5), rgba(0, 0, 0, 0))
                }
                
                .swiper-container-3d .swiper-slide-shadow-bottom {
                    background-image: -webkit-gradient(linear, left bottom, left top, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, 0)));
                    background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, .5), rgba(0, 0, 0, 0));
                    background-image: linear-gradient(to bottom, rgba(0, 0, 0, .5), rgba(0, 0, 0, 0))
                }
                
                .swiper-container-coverflow .swiper-wrapper,
                .swiper-container-flip .swiper-wrapper {
                    -ms-perspective: 1200px
                }
                
                .swiper-container-cube,
                .swiper-container-flip {
                    overflow: visible
                }
                
                .swiper-container-cube .swiper-slide,
                .swiper-container-flip .swiper-slide {
                    pointer-events: none;
                    -webkit-backface-visibility: hidden;
                    backface-visibility: hidden;
                    z-index: 1
                }
                
                .swiper-container-cube .swiper-slide .swiper-slide,
                .swiper-container-flip .swiper-slide .swiper-slide {
                    pointer-events: none
                }
                
                .swiper-container-cube .swiper-slide-active,
                .swiper-container-cube .swiper-slide-active .swiper-slide-active,
                .swiper-container-flip .swiper-slide-active,
                .swiper-container-flip .swiper-slide-active .swiper-slide-active {
                    pointer-events: auto
                }
                
                .swiper-container-cube .swiper-slide-shadow-bottom,
                .swiper-container-cube .swiper-slide-shadow-left,
                .swiper-container-cube .swiper-slide-shadow-right,
                .swiper-container-cube .swiper-slide-shadow-top,
                .swiper-container-flip .swiper-slide-shadow-bottom,
                .swiper-container-flip .swiper-slide-shadow-left,
                .swiper-container-flip .swiper-slide-shadow-right,
                .swiper-container-flip .swiper-slide-shadow-top {
                    z-index: 0;
                    -webkit-backface-visibility: hidden;
                    backface-visibility: hidden
                }
                
                .swiper-container-cube .swiper-slide {
                    visibility: hidden;
                    -webkit-transform-origin: 0 0;
                    transform-origin: 0 0;
                    width: 100%;
                    height: 100%
                }
                
                .swiper-container-cube.swiper-container-rtl .swiper-slide {
                    -webkit-transform-origin: 100% 0;
                    transform-origin: 100% 0
                }
                
                .swiper-container-cube .swiper-slide-active,
                .swiper-container-cube .swiper-slide-next,
                .swiper-container-cube .swiper-slide-next+.swiper-slide,
                .swiper-container-cube .swiper-slide-prev {
                    pointer-events: auto;
                    visibility: visible
                }
                
                .swiper-container-cube .swiper-cube-shadow {
                    position: absolute;
                    left: 0;
                    bottom: 0;
                    width: 100%;
                    height: 100%;
                    background: #000;
                    opacity: .6;
                    -webkit-filter: blur(50px);
                    filter: blur(50px);
                    z-index: 0
                }
                
                .swiper-container-fade.swiper-container-free-mode .swiper-slide {
                    -webkit-transition-timing-function: ease-out;
                    transition-timing-function: ease-out
                }
                
                .swiper-container-fade .swiper-slide {
                    pointer-events: none;
                    -webkit-transition-property: opacity;
                    transition-property: opacity
                }
                
                .swiper-container-fade .swiper-slide .swiper-slide {
                    pointer-events: none
                }
                
                .swiper-container-fade .swiper-slide-active,
                .swiper-container-fade .swiper-slide-active .swiper-slide-active {
                    pointer-events: auto
                }
                
                .swiper-zoom-container {
                    width: 100%;
                    height: 100%;
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    justify-content: center;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    text-align: center
                }
                
                .swiper-zoom-container>canvas,
                .swiper-zoom-container>img,
                .swiper-zoom-container>svg {
                    max-width: 100%;
                    max-height: 100%;
                    -o-object-fit: contain;
                    object-fit: contain
                }
                
                .swiper-scrollbar {
                    border-radius: 10px;
                    position: relative;
                    -ms-touch-action: none;
                    background: rgba(0, 0, 0, .1)
                }
                
                .swiper-container-horizontal>.swiper-scrollbar {
                    position: absolute;
                    left: 1%;
                    bottom: 3px;
                    z-index: 50;
                    height: 5px;
                    width: 98%
                }
                
                .swiper-container-vertical>.swiper-scrollbar {
                    position: absolute;
                    right: 3px;
                    top: 1%;
                    z-index: 50;
                    width: 5px;
                    height: 98%
                }
                
                .swiper-scrollbar-drag {
                    height: 100%;
                    width: 100%;
                    position: relative;
                    background: rgba(0, 0, 0, .5);
                    border-radius: 10px;
                    left: 0;
                    top: 0
                }
                
                .swiper-scrollbar-cursor-drag {
                    cursor: move
                }
                
                .swiper-lazy-preloader {
                    width: 42px;
                    height: 42px;
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    margin-left: -21px;
                    margin-top: -21px;
                    z-index: 10;
                    -webkit-transform-origin: 50%;
                    transform-origin: 50%;
                    -webkit-animation: swiper-preloader-spin 1s steps(12, end) infinite;
                    animation: swiper-preloader-spin 1s steps(12, end) infinite
                }
                
                .swiper-lazy-preloader:after {
                    display: block;
                    content: "";
                    width: 100%;
                    height: 100%;
                    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20viewBox%3D'0%200%20120%20120'%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20xmlns%3Axlink%3D'http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink'%3E%3Cdefs%3E%3Cline%20id%3D'l'%20x1%3D'60'%20x2%3D'60'%20y1%3D'7'%20y2%3D'27'%20stroke%3D'%236c6c6c'%20stroke-width%3D'11'%20stroke-linecap%3D'round'%2F%3E%3C%2Fdefs%3E%3Cg%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(30%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(60%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(90%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(120%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(150%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.37'%20transform%3D'rotate(180%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.46'%20transform%3D'rotate(210%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.56'%20transform%3D'rotate(240%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.66'%20transform%3D'rotate(270%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.75'%20transform%3D'rotate(300%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.85'%20transform%3D'rotate(330%2060%2C60)'%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E");
                    background-position: 50%;
                    background-size: 100%;
                    background-repeat: no-repeat
                }
                
                .swiper-lazy-preloader-white:after {
                    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20viewBox%3D'0%200%20120%20120'%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20xmlns%3Axlink%3D'http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink'%3E%3Cdefs%3E%3Cline%20id%3D'l'%20x1%3D'60'%20x2%3D'60'%20y1%3D'7'%20y2%3D'27'%20stroke%3D'%23fff'%20stroke-width%3D'11'%20stroke-linecap%3D'round'%2F%3E%3C%2Fdefs%3E%3Cg%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(30%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(60%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(90%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(120%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(150%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.37'%20transform%3D'rotate(180%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.46'%20transform%3D'rotate(210%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.56'%20transform%3D'rotate(240%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.66'%20transform%3D'rotate(270%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.75'%20transform%3D'rotate(300%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.85'%20transform%3D'rotate(330%2060%2C60)'%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E")
                }
                
                @-webkit-keyframes swiper-preloader-spin {
                    100% {
                        -webkit-transform: rotate(360deg)
                    }
                }
                
                @keyframes swiper-preloader-spin {
                    100% {
                        -webkit-transform: rotate(360deg);
                        transform: rotate(360deg)
                    }
                }
                
                .swiper-container.one {
                    padding-top: 40px;
                    text-align: center;
                }
                
                .swiper-container.one .swiper-slide {
                    padding: 0 43px;
                }
                
                .swiper-container {
                    width: 100%;
                    padding-bottom: 60px;
                }
                
                .swiper-slide img {
                    display: block;
                    margin: auto;
                    width: 100%;
                }
                
                .swiper-slide {
                    width: 390px;
                    height: auto;
                    padding: 0 15px;
                }
                .two .swiper-slide {
                    width: 300px;
                }
                .swiper-slide img {
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
                }
                
                .swiper-slide .slider-image .preview-icon {
                    z-index: -1;
                    width: calc(100% - 30px);
                }
                
                .swiper-slide.swiper-slide-active .slider-image:hover .preview-icon {
                    opacity: 1;
                    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
                    z-index: 1;
                }
                
                .swiper-container-horizontal > .swiper-pagination-bullets,
                .swiper-pagination-custom,
                .swiper-pagination-fraction {
                    bottom: 0;
                }
                
                .swiper-pagination-bullet {
                	background: transparent none repeat scroll 0 0;
                	border: 1px solid var(--warna_3);
                	border-radius: 10px;
                	display: inline-block;
                	height: 10px;
                	opacity: 1;
                	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
                	width: 26px;
                    -webkit-transition: 0.2s;
                    transition: 0.2s;
                }
                
                .swiper-pagination-bullet-active {
                    background: var(--warna_3);
                    border: medium none;
                    height: 12px;
                    opacity: 1;
                    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
                    width: 12px;
                }

            </style>
            <?php $this->endSection(); ?>
            
           
            
            <?php $this->section('content'); ?>
            <script>
            var demoImage = '<?= base_url(); ?>/assets/images/<?= $popup['gambarpopup']; ?>';
            </script>
            <div style="padding-top: 96px;">
                <div class="swiper-container two">
                    		<div class="swiper-wrapper">
                    		   <?php $no = 1; foreach ($banner as $loop): ?>
                    							<div class="swiper-slide" >
                    					<div class="slider-image">
                    						<img src="<?= base_url(); ?>/assets/images/banner/<?= $loop['image']; ?>" alt="slide <?= $no; ?>">
                    						
                    					</div>
                    				</div>
                    			<?php $no++; endforeach ?>
                    						<!-- Add Pagination -->
                    		</div>
                    		<div class="swiper-pagination"></div>
                    </div>
            </div>
            

               <div class="container" style=" padding:0px !important;">
                <div>
                    <div class="col-12" style="background: var(--warna_2) !important;padding:0px !important">
                        <ul class="nav nav-pills tab-category" id="pills-tab" role="tablist">
                            <li class="nav-item col text-center mt-md-0" id="tambah-kata1" style="padding:0px !important">
                                <a id="tambah-kata" class="nav-link active" data-bs-toggle="pill" href="#pills-games" role="tab" aria-controls="pills-games" aria-selected="true">
                                    <i class="fa fa-gamepad mb-2" style="font-size:25px"></i><br>
                                    Games
                                </a>
                            </li>
                            <li class="nav-item col text-center mt-md-0" id="tambah-kata1" id="tambah-kata1" style="padding:0px !important">
                                <a id="tambah-kata" class="nav-link " data-bs-toggle="pill" href="#pills-voucher" role="tab" aria-controls="pills-voucher" aria-selected="true">
                                    <i class="fa fa-ticket mb-2" style="font-size:25px"></i><br>
                                    Voucher
                                </a>
                            </li>
                            
                            <li class="nav-item col text-center mt-md-0" id="tambah-kata1" id="tambah-kata1" style="padding:0px !important">
                                <a id="tambah-kata" class="nav-link " data-bs-toggle="pill" href="#pills-pulsa" role="tab" aria-controls="pills-pulsa" aria-selected="true">
                                    <i class="fa fa-phone mb-2" style="font-size:25px"></i><br>
                                    Pulsa
                                </a>
                            </li>
                            <li class="nav-item col text-center mt-md-0" id="tambah-kata1" id="tambah-kata1" style="padding:0px !important">
                                <a id="tambah-kata" class="nav-link " data-bs-toggle="pill" href="#pills-data" role="tab" aria-controls="pills-data" aria-selected="true">
                                    <i class="fa fa-mobile mb-2" style="font-size:25px"></i><br>
                                    Data
                                </a>
                            </li>
                            <li class="nav-item col text-center mt-md-0" id="tambah-kata1" id="tambah-kata1" style="padding:0px !important">
                                <a id="tambah-kata" class="nav-link " data-bs-toggle="pill" href="#pills-pln" role="tab" aria-controls="pills-pln" aria-selected="true">
                                    <i class="fa fa-flash mb-2" style="font-size:25px"></i><br>
                                    PLN
                                </a>
                            </li>
                            
                            <li class="nav-item col text-center mt-md-0" id="tambah-kata1" id="tambah-kata1" style="padding:0px !important" hidden>
                                <a id="tambah-kata" class="nav-link " data-bs-toggle="pill" href="#pills-e-money" role="tab" aria-controls="pills-e-money" aria-selected="true">
                                    <i class="fa fa-money mb-2" style="font-size:25px"></i><br>
                                    E-Money
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 mt-3" style="margin-bottom:30px">
                        <form action="" method="POST">
                            <div class="input-group">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Mau topup games apa?" name="search" value="<?= $search; ?>">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            

            <div class="container">
                <div class="tab-content" id="pills-tabContent">
                    <?php $no = 1; foreach ($games as $game): ?>
                    <div class="tab-pane fade <?= $no == 1 ? 'show active' : ''; ?>" id="pills-<?= url_title($game['category'], '-', true); ?>" role="tabpanel" aria-labelledby="pills-<?= url_title($game['category'], '-', true); ?>-tab">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5><?= $game['category']; ?></h5>
                                <span class="strip-primary"></span>
                            </div>
                        </div>
                        <div class="row game">
                            <?php foreach ($game['games'] as $loop): ?>
                            <?php if ($loop['status'] == 'On'): ?>
                            <div class="col-sm-3 col-lg-2 col-4 text-center" style="display: grid;">
                                <div class="card mb-3 phy-card">
                                    <a href="<?= base_url(); ?>/games/<?= $loop['slug']; ?>" class="product_list">
                                        <div style="padding: 0.85rem 1.30rem;" class="card-game" bis_skin_checked="1">
                                            <img src="<?= base_url(); ?>/assets/images/games/<?= $loop['image']; ?>" class="img-fluid phy-img" style="border-radius: 10px; display: block;">
                                        </div>
                                        <div class="card-title phy-card-title" bis_skin_checked="1"> <?= $loop['games']; ?> </div>
                                        <div class="card-subtitle" bis_skin_checked="1"></div>
                                        <div class="card-topup" bis_skin_checked="1" hidden> 
                                            <div class="btn-topup" style="font-size: 0.60rem!important;" bis_skin_checked="1"> TOP UP </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                             <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <?php $no++; endforeach ?>
                </div>
                
            <div class="container text-center pt-3 py-3">
                <h2 style="color: #ffffff">Metode Pembayaran</h2>
            </div>
            <div class="owl-carousel metode-top owl-theme owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage"
                        style="transform: translate3d(-1259px, 0px, 0px); transition: all 0.25s ease 0s; width: 1832px;">
                        <?php foreach ($method as $loop): ?>
                        <div class="owl-item" style="width: 50px; margin-right: 10px;">
                            <div class="item">
                                <div class="metode">
                                    <img src="<?= base_url(); ?>/assets/images/method/<?= $loop['image']; ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <?php foreach ($method as $loop): ?>
                        <div class="owl-item" style="width: 50px; margin-right: 10px;">
                            <div class="item">
                                <div class="metode">
                                    <img src="<?= base_url(); ?>/assets/images/method/<?= $loop['image']; ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="owl-carousel metode-bottom owl-theme mb-4 owl-rtl owl-loaded owl-drag">
              <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(1260px, 0px, 0px); transition: all 0.25s ease 0s; width: 1832px;">
                        <?php foreach ($method as $loop): ?>
                        <div class="owl-item" style="width: 50px; margin-left: 10px;">
                            <div class="item">
                                <div class="metode">
                                    <img src="<?= base_url(); ?>/assets/images/method/<?= $loop['image']; ?>" height="50px" width="50px" alt="">
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <?php foreach ($method as $loop): ?>
                        <div class="owl-item" style="width: 50px; margin-left: 10px;">
                            <div class="item">
                                <div class="metode">
                                    <img src="<?= base_url(); ?>/assets/images/method/<?= $loop['image']; ?>" height="50px"  width="50px" alt="">
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
          </div>
        </div>
                
            </div>
            

            
                            
            <?php $this->endSection(); ?>
            
            <?php $this->section('js'); ?>
            <script> 
            
            var swiper = new Swiper( '.swiper-container.two', {
            		pagination: '.swiper-pagination',
            		paginationClickable: true,
            		effect: 'coverflow',
            		loop: true,
            		 autoplay: 2000,
            		grabCursor: true,
            		centeredSlides: true,
            		slidesPerView: 1,
            		coverflow: {
            			rotate: 0,
            			stretch: 260,
            			depth: 150,
            			modifier: 2.7,
            			slideShadows : true,
            		}
            		
            		
            		
            		
            } );

            
            </script>
            <script>
                $('.metode-top').owlCarousel({
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 1000,
                    responsive: {
                        0: {
                            items: 3
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 6
                        }
                    }
                });
                $('.metode-bottom').owlCarousel({
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 1000,
                    rtl: true,
                    responsive: {
                        0: {
                            items: 3
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 6
                        }
                    }
                });
            </script>
            <?php $this->endSection(); ?>