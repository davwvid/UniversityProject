<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Update a Course</h3>
        </div>

        <form class="form-horizontal" action="?controller=Course&action=update&id=<?php echo $course->getId() ?>"
              method="post">
            <?php include_once("formCourse.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="?controller=Course&action=update">Back</a>
            </div>
        </form>
    </div>

</div>