<div class="container">
    <div class="row">
        <h3>Course <?php echo $course . getName(); ?></h3>
    </div>
    <div class="row">
        <h1>ID</h1></br>
        <?php $course->getId(); ?></br></br>
        <h1>Description</h1></br>
        <?php $course->getDescription(); ?></br></br>
        <h1>Expiration Date</h1></br>
        <?php $course->getExpirationDate(); ?></br></br>
        <h1>University</h1></br>
        <?php $course->getFkUniversity(); ?>
    </div>
</div>