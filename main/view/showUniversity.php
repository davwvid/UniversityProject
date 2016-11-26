<div class="container">
    <div class="row">
        <h3>Universities</h3>
    </div>
    <div class="row">

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
                echo '<tr>';
                echo '<td><a href="?controller=University&action=read&id=' . $university->getId() . '">' . $university->getName() . '</a></td>';
                echo '<td><a href="http://' . $university->getLink() . '">' . $university->getLink() . '</a></td>';
                echo '<td>' . $university->getDescription() . '</td>';
                echo '<td><a href="mailto:' . $university->getEmail() . '">' . $university->getEmail() . '</a></td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>