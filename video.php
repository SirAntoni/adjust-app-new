<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.0/remodal.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.0/remodal-default-theme.min.css">
  <style>
    .remodal-close:before {
      left: 10px;
    }

    .remodal {
      max-width: 1450px !important;
      background: transparent !important;
      padding: 20px;
      padding-top: 20px;
      padding-bottom: 20px;

    }


    /* change icon align to left */
    .remodal-close {
      right: 0px;
      left: auto;
    }

    .video-container {
      position: relative;
      padding-bottom: 56.25%;
      padding-top: 30px;
      height: 0;
      overflow: hidden;

    }

    .video-container iframe,
    .video-container object,
    .video-container embed {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
  </style>
</head>

<body>
  <section class="remodal" data-remodal-id="modal">
    <button data-remodal-action="close" title="Close" class="remodal-close"></button>
    <div class="video-container" id="responsive-wrapper">
      <div id="player"></div>
    </div>
  </section>

  <!-- the html -->
  <main class="">
   
    <a class="btn btn-primary" href="#modal">
     video
    </a>
    <hr>
  </main>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.0/remodal.min.js"></script>

  <script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement("script");
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName("script")[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;

    function onYouTubeIframeAPIReady() {
      player = new YT.Player("player", {
        height: "100%",
        width: "100%",
        videoId: "Xa0Q0J5tOP0",
        playerVars: {
          autoplay: 1,
          mute: 1,
          controls: 1,
          info: 0,
          showinfo: 0,
          rel: 0,
          modestbranding: 1,
          wmode: "transparent"
        },
        events: {
          onReady: onPlayerReady,
          onStateChange: onPlayerStateChange
        }
      });
    }
    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
      // event.target.playVideo();  
    }
    // 5. The API calls this function when the player's state changes.
    var done = false;
    
    function onPlayerStateChange(event) {
      if (event.data == YT.PlayerState.PLAYING && !done) {
        done = true;
      }
    }

    function stopVideo() {
      player.stopVideo();
    }
    // remodal events //
    $(document).on("opening", ".remodal", function() {
      player.playVideo();
    });
  </script>
</body>

</html>
