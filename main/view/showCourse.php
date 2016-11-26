<div class="container">
    <div class="row">
        <h3>Courses</h3>
    </div>
    <div class="row">

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>ShortDescription</th>
                <th>Expiration Date</th>
                <th>University</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($courses as $course) {
                echo '<tr>';
                echo '<td><a href="?controller=Course&action=read&id=' . $course->getId() . '">' . $course->getName() . '</a></td>';
                echo '<td>' . $course->getShortDescription() . '</td>';
                echo '<td>' . $course->getExpirationDate() . '</td>';
                echo '<td>' . $course->getFkUniversity() . '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>