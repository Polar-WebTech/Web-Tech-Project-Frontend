<?php
  require './config/url.php';
?>
  <script>


  var xhr=new XMLHttpRequest();
        xhr.open("get","<?php echo $ToProfile?>");
        xhr.send();
        xhr.onload=function()
        {


            var profile=JSON.parse(xhr.responseText);

            document.getElementById("webname").innerHTML=profile[0].name;
            document.getElementsByClassName("copyright")[0].innerHTML=' &copy; Copyright <strong><span>'+profile[0].name+'</span></strong>. All Rights Reserved';
        }



  </script>

  <!-- ======= Footer ======= -->
  <footer id="footer" >
    <div class="container">
      <h3 id="webname"></h3>


      <div class="copyright">

      </div>

    </div>
  </footer><!-- End Footer -->
