<div class="container">
    <div class="row">
        <h3>Courses</h3>
    </div>
    <div class="row">
        <form action="?controller=Course&action=show" method="post">
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
                <th>Expiration Date</th>
                <th>ShortDescription</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $today = date("Y-m-d");

            foreach ($courses as $course) {
                if ($today < $course->getExpirationDate()) {
                    if ($search == "" || (strpos(strtolower($course->getName()), strtolower($search)) !== false)) {
                        echo '<tr>';
                        echo '<td><a href="?controller=Course&action=read&id=' . $course->getId() . '">' . $course->getName() . '</a></td>';
                        echo '<td>' . $course->getExpirationDate() . '</td>';
                        echo '<td>' . $course->getShortDescription() . '</td>';
                        echo '</tr>';
                    }
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>