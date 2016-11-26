<div class="container">
    <div class="row">
        <h3>University <?php echo $university->getName(); ?></h3>
    </div>
    <div class="row">
        <h6>ID</h6>
        <?php echo $university->getId(); ?></br></br></br></br>
        <h6>Link</h6>
        <?php echo $university->getLink(); ?></br></br></br></br>
        <h6>Description</h6>
        <?php echo $university->getDescription(); ?></br></br></br></br>
        <h6>Email</h6>
        <?php echo $university->getEmail(); ?></br></br></br></br>
        <h6>Courses</h6>
        <?php
        foreach ($courses as $course) {
            echo '<a href="?controller=Course&action=read&id=' . $course->getId() . '">' . $course->getName() . '</a></br>';
        }
        ?>
    </div>
</div>