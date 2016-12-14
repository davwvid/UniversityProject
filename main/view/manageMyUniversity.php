<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Update my university</h3>
        </div>

        <form class="form-horizontal"
              action="?controller=University&action=updateMine&id=<?php echo $university->getId() ?>"
              method="post">
            <?php include_once("formMyUniversity.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>

</div>