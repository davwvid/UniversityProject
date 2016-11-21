<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php

require_once('header.php');

require_once('Route.php');
Route::call($controller, $action);

require_once('footer.php');
?>

</body>
</html>