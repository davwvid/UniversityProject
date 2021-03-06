<html>
<head>
    <title> show course</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
</head>
<body>
<div id="container">
    <div id="header">
        <h3><?php echo $course->getName(); ?></h3>
    </div>
    <div id="content">
        <div id="nav">
            <ul>
                <h5>
                    <b>Expiration Date: </b>
                    <?php echo $course->getExpirationDate(); ?>
                    </br>
                    <hr>
                </h5>
                <h5>
                    <b>Email:</b>
                    <?php echo '<a href="mailto:' . $university->getEmail() . '">' . $university->getEmail() . '</a>' ?>
                </h5>
            </ul>
        </div>
        <div id="main">
            <h5>
                <b>Description</b>
            </h5>
            <div>
                <?php echo $course->getDescription(); ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>

