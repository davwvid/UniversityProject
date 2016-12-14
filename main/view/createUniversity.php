<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Create a University</h3>
        </div>

        <form class="form-horizontal" action="?controller=University&action=create" method="post">
            <?php include_once("formUniversity.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href=".?controller=University&action=showAll">Back</a>
            </div>
        </form>
    </div>

</div>