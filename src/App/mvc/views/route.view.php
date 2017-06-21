<div class="row">
    <div class="col-md-2">
        <a href="?action=viewCreate&params=ROUTE" class="btn btn-primary">New RELATIONALSHIP</a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <td>From</td>
                <td>To</td>
                <td>Distance</td>
                <td>Peak-time speed</td>
                <td>Speed in normal hour</td>
            </tr>
            <?php foreach($model as $row): ?>
                <tr>t
                    <td><?= $row['from']->getProperty('name') ?></td>
                    <td><?= $row['to']->getProperty('name') ?></td>
                    <td><?= $row['r']->getProperty('km') ?></td>
                    <td><?= $row['r']->getProperty('rushHour') ?></td>
                    <td><?= $row['r']->getProperty('normalHour') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
