<html>
  <head>
   <title>Chart</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>/js/jqbargraph.min.js"></script>
    
    <script type="text/javascript">
        
      $(document).ready(function () {
        var arrayOfPHPData = <?php echo json_encode($graph) ?>; //jason_encode methos takes querried data from database
        arrayOfDataJS = new Array();
        $.each(arrayOfPHPData, function (i, elem) {
          arrayOfDataJS[i] = [(elem['name']),parseInt(elem['u_pec'])];
        });
        console.log(arrayOfDataJS);
        $('#divForGraph').jqBarGraph({
          data: arrayOfDataJS,
          title: "",
          barSpace: 20,
          });
      });
      
    </script>
  </head>
   
  <body>
    <div id="wrapper">
      <div id="divForGraph"></div>
      <p>Progress of user stories</p>
    </div>
  </body>
</html>