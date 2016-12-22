<html>
<head>
    <title> show University</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
</head>
<body>
<div id="container">
    <div id="header">
        <h3>
            <?php echo $university->getName(); ?>
        </h3>
    </div>
    <div id="content">
        <div id="nav">
            <ul>
                <h5>
                    <b>Email:</b>
                    <?php echo $university->getEmail(); ?>
                </h5>
                <h5>
                    <b>Link:</b>
                    <?php echo $university->getLink(); ?>
                    </br>
                </h5>
            </ul>
        </div>
        <div id="main">
            <h5>
                <b>Description:</b>
            </h5>
            <div>
                <?php echo $university->getDescription(); ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>

