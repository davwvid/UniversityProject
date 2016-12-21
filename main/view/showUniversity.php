<div class="container">
    <div class="row">
        <h3>Universities</h3>
    </div>
    <div class="row">
        <form action="?controller=University&action=show" method="post">
            <div class="col-md-4" style="padding: 0;">
                <input class="form-control" type="text" name="search"
                       value="<?php echo $search != "" ? $search : ''; ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </form>
    </div>
    <div class="row" style="margin-top: 10px;">

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Link</th>
                <th>Description</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($universities as $university) {
                if ($university->getName() != "admin") {
                    if ($search == "" || (strpos(strtolower($university->getName()), strtolower($search)) !== false)) {
                        echo '<tr>';
                        echo '<td><a href="?controller=University&action=read&id=' . $university->getId() . '">' . $university->getName() . '</a></td>';
                        echo '<td><a href="http://' . $university->getLink() . '">' . $university->getLink() . '</a></td>';
                        echo '<td>' . $university->getDescription() . '</td>';
                        echo '<td><a href="mailto:' . $university->getEmail() . '">' . $university->getEmail() . '</a></td>';
                        echo '</tr>';
                    }
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>