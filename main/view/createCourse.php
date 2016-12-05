<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Create a Course</h3>
        </div>

        <form class="form-horizontal" action="?controller=Course&action=create" method="post">
            <?php include_once("formCourse.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href=".?controller=Course&action=showMine">Back</a>
            </div>
        </form>
    </div>

</div>