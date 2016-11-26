<div class="container">
    <div class="row">
        <h3>Course <?php echo $course->getName(); ?></h3>
    </div>
    <div class="row">
        <h6>ID</h6>
        <?php echo $course->getId(); ?></br></br></br></br>
        <h6>Description</h6>
        <?php echo $course->getDescription(); ?></br></br></br></br>
        <h6>Expiration Date</h6>
        <?php echo $course->getExpirationDate(); ?></br></br></br></br>
        <h6>University</h6>
        <?php echo $university->getName(); ?></br></br></br></br>
        <h6>Email</h6>
        <?php echo $university->getEmail(); ?>
    </div>
</div>