<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <h3>Course --><?php //echo $course->getName(); ?><!--</h3>-->
<!--    </div>-->
<!--    <div class="row">-->
<!--        <h6>ID</h6>-->
<!--        --><?php //echo $course->getId(); ?><!--</br></br></br></br>-->
<!--        <h6>Description</h6>-->
<!--        --><?php //echo $course->getDescription(); ?><!--</br></br></br></br>-->
<!--        <h6>Expiration Date</h6>-->
<!--        --><?php //echo $course->getExpirationDate(); ?><!--</br></br></br></br>-->
<!--        <h6>University</h6>-->
<!--        --><?php //echo $university->getName(); ?><!--</br></br></br></br>-->
<!--        <h6>Email</h6>-->
<!--        --><?php //echo $university->getEmail(); ?>
<!--    </div>-->
<!--</div>-->

<html>
<head>

    <title> show course</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
</head>
<body>
<div id="container">
    <div id="header">

        <div id="headerText">
            <h3>Course <?php echo $course->getName(); ?></h3>
        </div>

    </div>
    <div id="content">
        <div id="nav">
            <ul>
                <h5><b>Expiration Date: </b><?php echo $course->getExpirationDate(); ?></br><hr></h5>

                <h5><b>Email:</b> <?php echo $university->getEmail(); ?></h5>
            </ul>
        </div>
        <div id="main">
            <h5><b>ID:</b> <?php echo $course->getId(); ?></br><hr></h5>

            <h5><b>Description</b></h5>
            <?php echo $course->getDescription(); ?></br></br></br></br>
        </div>
    </div>
    <div id="newsletter">
        <div id="newsletterText">
            <h4 class="newsl">Submit an course today or call 0800 800 800 for free to talk with our staff</h4>
        </div>
        <div id="newsletterButton">
            <button type="button">Submit Now</button>
        </div>
    </div>
</div>
<div><br/><br/><br/></div>
</body>
</html>

