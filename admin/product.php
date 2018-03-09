<!DOCTYPE html>
<html>
<head>
  <title>Package Title</title>
<!--   <meta property="og:url"           content="https://cyborg999.github.io/" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Pck title" />
  <meta property="og:description"   content="Pack Description text" />
  <meta property="og:image"         content="https://sugarbait.000webhostapp.com/lollipop2.png" />
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="200">
  <meta property="og:image:height" content="200"> -->
  <meta property="og:title" content="The Rock"/>
<meta property="og:type" content="movie"/>
<meta property="og:url" content="http://www.imdb.com/title/tt0117500/"/>
<meta property="og:image" content="http://lh3.googleusercontent.com/jN9tX6dCJ6_XL9E4K1KCO2Tuwe9_rYUbwv723eu6XGI0PWGLcPs0259VscOu249PPKKcU5AOXrq6JnleEaoK6K_JvZ2PY9lw3pMApzOpTQ=s660"/>
</head>
<body>
<div class="columns col-sm-12">
        <h2>Messages</h2>
        <image src="lollipop2.png">
        <div id="share-buttons">
    
     
        <!-- Facebook -->
        <a href="http://www.facebook.com/sharer.php?u=https://cyborg999.github.io/" target="_blank">
            <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
        </a>
        
        <!-- Google+ -->
        <a href="https://plus.google.com/share?url=https://cyborg999.github.io/" target="_blank">
            <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
        </a>
        
      
        <!-- Twitter -->
        <a href="https://twitter.com/share?url=https://cyborg999.github.io/&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
            <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
        </a>

      </div>
        <div class="fb-share-button" data-href="https://css-tricks.com/essential-meta-tags-social-media/" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
        <div id="fb-root"></div>
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
        
        <script type="text/javascript">
          $('#fb-share-button').click(function() {
            FB.ui({
                  method: 'feed',
                  link: "The link you want to share", 
                  picture: 'The picture url',
                  name: "The name who will be displayed on the post",
                  description: "The description who will be displayed"
                }, function(response){
                    console.log(response);
                }
            );
        });
          window.fbAsyncInit = function() {
            FB.init({
              appId      : 'your-app-id',
              xfbml      : true,
              version    : 'v2.3'
            });
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));

        </script>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
      </div>
</body>
</html>