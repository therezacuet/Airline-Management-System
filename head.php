<!-- Website head placed here -->
    
<head>

    <meta charset="utf-8">

    <title><?php if (isset($title)) {echo $title;}
        else {echo "Bangladesh Airlines";} ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <link rel="stylesheet" href="./vendor/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="./vendor/css/bootswatch.min.css">

    <script src="./vendor/js/jquery-1.10.2.min.js"></script>
    <script src="./vendor/js/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="./vendor/js/jquery-ui.css" />
    <script src="./vendor/js/bootstrap.min.js"></script>
    <script src="./vendor/js/bootswatch.js"></script>

    <script type="text/javascript">
               	$(document).ready(function(){
               	     $("#departure_date").datepicker({
          					     maxDate: 30,
          					     minDate: 0,
          					     dateFormat:"dd-mm-yy"
          					  });
                      $("#return_date").datepicker({
          					     maxDate: 30,
          					     minDate: 1,
          					     dateFormat:"dd-mm-yy"
          					  });
                });
               	function setReadOnly(obj){
				   if(obj.value == "oneway"){
				     $('#departure_date').datepicker('enable');
				     $('#return_date').datepicker('disable');
				   } 
				   else {
				     $('#departure_date').datepicker('enable');
				     $('#return_date').datepicker('enable');
				   }
				}
          $(function() {
            var availableTags = [
            "Dhaka","Chittagong","Cox's Bazzar","Barishal"
            ];
            $( "#from_city" ).autocomplete({
            source: availableTags
            });
          });
          $(function() {
            var availableTags = [
            "Dhaka","Chittagong","Cox's Bazzar","Barishal"
            ];
            $( "#to_city" ).autocomplete({
            source: availableTags
            });
          });
       </script>
       
</head>