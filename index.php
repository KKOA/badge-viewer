<?php
  $url = 'https://www.codeschool.com/users/KKOA.json';
  $data = file_get_contents($url); // Get file contents
	//var_dump($data); // use display contents complex variables
	$json_data = json_decode($data,true);
  /*
  Takes a JSON encoded string and converts it into a PHP.
  array or object
  */
	$username = $json_data['user']['username'];
	$courses = $json_data['courses'];

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $username; ?>'s  Badge Viewer</title>
		<!-- Latest compiled and minified CSS -->
			<!-- Styles -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="stylesheets/style.css" >

			<!-- scripts-->
			<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</head>
  <body>
		<h1 class='text-center'> <?php echo $username; ?>'s code school badges </h1>
			<div class='container'>
				<div class='row'>
					<?php
						foreach($courses['completed'] as $course) // Loop through complete courses
						{
							$output = '<div class="col-sm-4 col-md-3 mybadge">';
							$output .= '<a href="'.$course['url'].'" target="_blank" title="Link to '.$course['title'].'">';
							$output .= '<img src="'.$course['badge'].'" class="img-responsive">';
							$output .= '<div class="text-center title">'.$course['title'].'</div></a>';
							$output .= '</div>';
							echo $output;
						}
					?>
		</div>
	</div>
  </body>
</html>
