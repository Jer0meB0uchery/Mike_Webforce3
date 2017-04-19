<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>Exercice Json</title>
</head>
<body>
	<h1>Exercice Json</h1>

	<script type="text/javascript">
		$(function() {
			var request = $.ajax({
				url: "http://jsonplaceholder.typicode.com/users", 
				method: "GET"
			});

			request.done(function( arrayJson ) { // Success
				console.log(arrayJson);

				var tableau = "<table border=1><tr>" ;
				$.each(arrayJson[0], function(index, value){
					if(index == "name" ||index == "username" || index == "email" || index == "phone" || index == "company"){
						tableau += "<th>";
						tableau += index;
						tableau += "</th>";
					}
				});
				tableau += "</tr>";
				for (var i = 0; i < arrayJson.length; i++) {
					$.each(arrayJson[i], function(index, value){
						tableau += "<td>";
						if(index == "company"){
							tableau += value.name;
						}else{
							tableau += value;
						}
						tableau += "</td>";
					});
					tableau += "</tr>";
				};
				$("#table").html(tableau);
			})

		request.fail(function( data, textStatus ) {
				alert( "Request failed: " + textStatus ); // En cas d'erreur de communication avec le serveur ou de code erreur
			});
	})

</script>

<div id="table"></div>


</body>

</html>
