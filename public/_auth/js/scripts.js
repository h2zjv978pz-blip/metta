    /*!
    * Start Bootstrap - SB Admin v6.0.1 (https://startbootstrap.com/templates/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    (function($) {
        "use strict";

        // Toggle the side navigation
        $("#sidebarToggle").on("click", function(e) {
            e.preventDefault();
            $("body").toggleClass("sb-sidenav-toggled");
        });

        //logout
        let logoutLink = $('.logout-link');
        let logoutForm = $('#logout-form');
        logoutLink.on('click', function (events) {
            events.preventDefault();
            logoutForm.submit();
        });

        //loading spinner
        window.spinner = $(".loading-spinner");

        // //hide left sidebar scrollbar
        // $(".sb-sidenav-menu").slimScroll({
        //     height: 'auto',
        //     size: '10px',
        // });

        /**
         * get query parameters from url
         * from: https://stackoverflow.com/a/41152400/876255
         * @param name
         * @returns {any}
         */

        $.urlParam = function (name) {
            let results = new RegExp('[\?&]' + name + '=([^&#]*)')
                .exec(window.location.search);

            return (results !== null) ? results[1] || 0 : false;
        };

        /**
         *
         */
        $.loadStyleInHead = function (styleUrl, styleId) {
            if (!document.getElementById(styleId)) {
                let head = document.getElementsByTagName('head')[0];
                let link = document.createElement('link');
                link.rel = "stylesheet";
                link.href = styleUrl;
                head.appendChild(link);
            }
        }

        /**
         *
         */
        $.getBaseUrl = function () {
            let protocol = location.protocol;
            if (protocol === '') {
                protocol = 'http';
            }
            return protocol + '//' + location.host;
        };

    })(jQuery);
