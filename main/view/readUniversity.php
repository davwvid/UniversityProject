<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <h3>University --><?php //echo $university->getName(); ?><!--</h3>-->
<!--    </div>-->
<!--    <div class="row">-->
<!--        <h6>ID</h6>-->
<!--        --><?php //echo $university->getId(); ?><!--</br></br></br></br>-->
<!--        <h6>Link</h6>-->
<!--        --><?php //echo $university->getLink(); ?><!--</br></br></br></br>-->
<!--        <h6>Description</h6>-->
<!--        --><?php //echo $university->getDescription(); ?><!--</br></br></br></br>-->
<!--        <h6>Email</h6>-->
<!--        --><?php //echo $university->getEmail(); ?><!--</br></br></br></br>-->
<!--        <h6>Courses</h6>-->
<?php
//foreach ($courses as $course) {
//    echo '<a href="?controller=Course&action=read&id=' . $course->getId() . '">' . $course->getName() . '</a></br>';
//}
//?>
<!--    </div>-->
<!--</div>-->
<!---->

<html>
<head>

    <title> show University</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
</head>
<body>
<div id="container">

    <div id="header">

        <div id="headerText">
            <h3>University <?php echo $university->getName(); ?></h3>
        </div>

    </div>
    <div id="content">
        <div id="nav">
            <ul>


                <h5><b>Email:</b> <?php echo $university->getEmail(); ?></h5>

                <h5><b>Link:</b> <?php echo $university->getLink(); ?></br></h5>
            </ul>
        </div>
        <div id="main">
            <h5><b>ID:</b> <?php echo $university->getId(); ?></br><hr></h5>

            <h5><b>Description:</b> </h5>
            <?php echo $university->getDescription(); ?></br></br></br></br>
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

