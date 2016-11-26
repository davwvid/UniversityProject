<div class="container">
    <div class="row">
        <h3>Course <?php echo $course->getName(); ?></h3>
    </div>
    <div class="row">
        <h6>ID</h6></br>
        <?php echo $course->getId(); ?></br></br>
        <h6>Description</h6></br>
        <?php echo $course->getDescription(); ?></br></br>
        <h6>Expiration Date</h6></br>
        <?php echo $course->getExpirationDate(); ?></br></br>
        <h6>University</h6></br>
        <?php echo $university->getName(); ?>
        <h6>University Email</h6></br>
        <?php echo $university->getEmail(); ?>
    </div>
</div>