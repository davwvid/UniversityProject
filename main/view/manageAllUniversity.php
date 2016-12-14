<div class="container">
    <div class="row">
        <h3>All Universities</h3>
    </div>
    <div class="row">

        <p>
            <a href="?controller=University&action=create" class="btn btn-success">Create</a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Link</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($universities as $university) {
                if ($university->getName() != "admin") {
                    echo '<tr>';
                    echo '<td><a href="?controller=University&action=read&id=' . $university->getId() . '">' . $university->getName() . '</a></td>';
                    echo '<td>' . $university->getLink() . '</td>';
                    echo '<td>' . $university->getEmail() . '</td>';
                    echo '<td width=350>';
                    echo '<a class="btn" href="?controller=University&action=read&id=' . $university->getId() . '">Read</a>';
                    echo '&nbsp;';
                    echo '<a class="btn" href="?controller=Invoice&action=read&id=' . $university->getId() . '">Invoices</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-success" href="?controller=University&action=update&id=' . $university->getId() . '">Update</a>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-danger" href="?controller=University&action=deleteAsk&id=' . $university->getId() . '">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>