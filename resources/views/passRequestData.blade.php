<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
  <h1>PASS REQUEST DATA PAGE</h1>
  <h3>HERE IS THE DATA: <?= $name ?></h3>

<!-- !!bit dangerous to pass the data as is.. we must use encapsulation to not allow js to be passed in.
eg: http://freshproject.test/passRequestData?name=<script>alert('HELLO');</script>  -->

<h3>HERE IS THE DATA: </h3>
<h2>{{ $name }}</h2> 
<!-- Normal php way is: <?= htmlspecialchars($name, ENT_QUOTES) ?> -->

  <script src="js/scripts.js"></script>
</body>
</html>