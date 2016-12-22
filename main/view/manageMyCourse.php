<div class="container">
    <div class="row">
        <h3>My Courses</h3>
    </div>
    <div class="row">

        <p>
            <a href="?controller=Course&action=create" class="btn btn-success">Create</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>ShortDescription</th>
                <th>Expiration Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($courses as $course) {
                echo '<tr>';
                echo '<td><a href="?controller=Course&action=read&id=' . $course->getId() . '">' . $course->getName() . '</a></td>';
                echo '<td>' . $course->getShortDescription() . '</td>';
                echo '<td>' . $course->getExpirationDate() . '</td>';
                echo '<td width=250>';
                echo '<a class="btn" href="?controller=Course&action=read&id=' . $course->getId() . '">Read</a>';
                echo '&nbsp;';
                echo '<a class="btn btn-success" href="?controller=Course&action=update&id=' . $course->getId() . '">Update</a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="?controller=Course&action=deleteAsk&id=' . $course->getId() . '">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>