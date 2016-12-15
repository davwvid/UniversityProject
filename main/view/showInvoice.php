<div class="container">
    <div class="row">
        <h3>Invoices</h3>
    </div>
    <div class="row">

        <?php if ($_SESSION['admin']) { ?>
            <p>
                <a href="?controller=Invouce&action=createSub" class="btn btn-success">Create Subscription Fee</a>
            </p>
        <?php } ?>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Date</th>
                <th>Price(SFR)</th>
                <th>Comment</th>
                <th>Payed</th>
                <?php if ($_SESSION['admin']) {
                    echo '<th>Actions</th>';
                } ?>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($invoices as $invoice) {
                echo '<tr>';
                echo '<td>' . $invoice->getDate() . '</td>';
                echo '<td>' . $invoice->getPrice() . '.-</td>';
                echo '<td>' . $invoice->getComment() . '</td>';
                if ($invoice->getPayed() == 0) {
                    echo '<td style="color: red">Not Payed</td>';
                } else {
                    echo '<td>Payed</td>';
                }
                if ($_SESSION['admin'] && $invoice->getPayed() == 0) {
                    echo '<td><a class="btn btn-danger" href="?controller=Invoice&action=pay&id=' . $invoice->getId() . '">Pay</a></td>';
                    echo '&nbsp;';
                    echo '<a class="btn btn-danger" href="?controller=Invoice&action=deleteAsk&id=' . $invoice->getId() . '">Delete</a>';
                }
                if ($_SESSION['admin']) {
                    echo '<td></td>';
                }
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>