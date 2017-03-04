<script>

    // Prepare the FB api
    window.fbAsyncInit = function () {
        FB.init({
            appId: '289093381507110',
            xfbml: true,
            version: 'v2.8'
        });

        FB.AppEvents.logPageView();
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Populate the images
    $(document).ready(function () {
//        // Set the instagram api
//        var api = "https://api.instagram.com/oauth/authorize/?";
//
//        // Set the client id
//        api = api + 'client_id=925023492402457192f7db23d68f0c1e';
//
//        // Get the data from the api
//        $.get(api, function (result) {
//            console.log(result);
//        });
//
//        var api = "https://api.instagram.com/v1/users/self/media/liked?access_token=qwe";
//
//        // Get the data from the api
//        $.get(api, function (result) {
//            console.log(result);
//        });

    });

    // Display the images
    $('#btnDisplayImages').on('click', function () {
        // Set the instagram api
        var api = "https://api.instagram.com/oauth/authorize/?";

        // Set the client id
        api = api + 'client_id=925023492402457192f7db23d68f0c1e';

        // Set other data needed
        api = api + '&redirect_uri=http://sauchi.co&response_type=token&&scope=public_content';

        //&redirect_uri=REDIRECT-URI&response_type=token

        // Get the data from the api
        $.get(api, function (result) {
            console.log(result);
        });

    });

</script>