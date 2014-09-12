<html>
   <html xmlns="http://www.w3.org/1999/xhtml">
  <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>
    function myFunction()
    {
      $(".test_button").click(function() {
        alert("test_ajax_" + $(this).attr("href") + ".html");
        // $("#test_load").html("test_ajax.html").load("\\test_ajax.html");
        $("#test_load").load("test_ajax_" + $(this).attr("href") + ".html", function(response, status, xhr) {
          if (status == "error") {
            var msg = "Sorry but there was an error: ";
            $("#test_load").html(msg + xhr.status + " " + xhr.statusText);
          }
        });
      });
    }
    $(document).ready(myFunction);
  </script>
  
  <body>
    <button class="test_button" href="one">Test Button One</button>
    <button class="test_button" href="two">Test Button Two</button>
    <div id="test_load"></div>
  </body>
</html>