<html>
    <head>
        <style>
            .loading{
                display:flex;
                justify-content:center;
              }

              .loading::after{
                  content:"";
                  position:absolute;
                  top:30%;
                left:50%;
                  width:100px;
                  height:100px;     
                  border: 20px solid #dddddd;
                  border-top-color: #cf0000;
                  border-bottom-color: #1b03f0;
                  border-radius: 50%;
                  animation: loading 1.5s linear infinite;
                  
              }
              .content{
                display:none;
              }

             
              @keyframes loading{
                  to{
                      transform:rotate(360deg);
                  }
              }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body onload="myfun()">
        <div class="loading"></div>
    <div class="content"></div>
        <script>
            $(window).on('load',function(){
                $(".loading").fadeOut(2000);
              $(".content").fadeIn(1000);

            });
        </script>
    </body>
</html>