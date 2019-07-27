<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="demo.css" type="text/css" media="screen"/>
<script async src="https://cse.google.com/cse.js?cx=016032306067518336075:cvrv1c-fc88"></script>
<script type='text/javascript' src='jquery-1.9.1.js'></script>
	<script type='text/javascript' src='tinycolor.js'></script>
	<script type='text/javascript'>

		function colorChange(color) {
			var tiny = tinycolor(color);
	
			var allColors = [];
			for (var i in tinycolor.names) {
				allColors.push(i);
			}
			var mostReadable = tinycolor.mostReadable(color, allColors);

			$("#mostReadable").css("background-color",
			     mostReadable.toHexString()
			 );

			 var combines = $("#combine-output").toggleClass("invisible", !tiny.isValid());

			 function colorArrayToHTML(arr) {
			 	return $.map(arr, function(e) {
			     return '<span style="background:'+e.toHexString()+'"></span>'
			 	 }).join('');
			 }

			 var triad = tiny.triad();
			 combines.find(".triad").html(colorArrayToHTML(triad));
			 console.log(triad.map(function(f) {return f.toHexString();}));

			 var tetrad = tiny.tetrad();
			 combines.find(".tetrad").html(colorArrayToHTML(tetrad));

			 var mono = tiny.monochromatic();
			 combines.find(".mono").html(colorArrayToHTML(mono));

			 var analogous = tiny.analogous();
			 combines.find(".analogous").html(colorArrayToHTML(analogous));

			 var splitcomplement = tiny.splitcomplement();
			 combines.find(".sc").html(colorArrayToHTML(splitcomplement));
		}

		$(function() {
			$("#color").bind("keyup change", function() {
				colorChange($(this).val());
			});
			colorChange({r: 150, g: 0, b: 100});

			$("#inputter a").click(function() {
			     $("#color").val($(this).text()).trigger("change");
                return false;
			});
		});

	</script>
</head>
<body>
<h1> 
    <iframe src="https://ntmaker.gfto.ru/newneontexten/?image_height=300&image_width=1350&image_font_shadow_width=30&image_font_size=100&image_background_color=1F1F1F&image_text_color=D819FF&image_font_shadow_color=F723E9&image_url=&image_text=PrettyUp!&image_font_family=Nickainley&" frameborder='no' scrolling='no' width="1350" height="300"></iframe>
</h1>
	<div id="main-wrapper">
		<center><h2>Home Page</h2></center>
		<center><h3>Welcome <?php echo $_SESSION['username']; ?></h3></center>
	</div>
	<script src="jscolor.js"></script>
	<p>Choose room color here!:
			<input value="ffcc00" class="jscolor {width:243, height:150, position:'right',
				borderColor:'#FFF', insetColor:'#FFF', backgroundColor:'#666'}">
	<p>
		<p>
            Enter a color: <input type="text" placeholder="The color of your room" id='color' />
        </p>
	   <p>Here are some colours that will go well with your current color scheme:</p>
	<pre id='code-output'></pre>
	
	<div id='combine-output'>
	   <table>
	       <tr>
	           <th>Triad</th> <td><div class='triad'></div></td>
	       </tr>
	       <tr>
	           <th>Tetrad</th> <td><div class='tetrad'></div></td>
	       </tr>
	       <tr>
	           <th>Monochromatic</th> <td><div class='mono'></div></td>
	       </tr>
	       <tr>
	           <th>Analogous</th> <td><div class='analogous'></div></td>
	       </tr>
	       <tr>
	           <th>Split Complements</th> <td><div class='sc'></div></td>
	       </tr>
	   </table>
    </div>
	
	<div class="box">
    <div class="container-1">
        <span class="icon"><i class="fa fa-search"></i></span>
        <form action= "homepage.php"><input type="search" name="q" id="s01" placeholder="Search! Theme + Color + Item" style="width: 100%; background-color: darkslategray; height: 50px; color: rgb(255, 255, 255); font-size: 30px; font-family: 'Times New Roman', Times, serif;"/></form>
    </div>
    <div class="gcse-searchresults-only"></div>
</div>

<form action= "display.php" method="post">
<button type="submit">View Wishlist</button>
</form>
<form action="insert.php" method="post">
    <p>
        <label for="Item">Item:</label>
        <input type="text" name="Item" id="Item">
    </p>
    <p>
        <label for="Link">Link:</label>
        <input type="text" name="Link" id="Link">
    </p>
    <input type="submit" value="Submit">
</form>


		<form action="index.php" method="post">
			<div class="inner_container">
				<button class="logout_button" type="submit">Log Out</button>	
			</div>
		</form>
	</div>
</body>
</html>