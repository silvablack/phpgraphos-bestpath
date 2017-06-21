<div class="row">
    <div class="col-md-2">
        <a href="?action=viewCreate&params=Neighborhood" class="btn btn-primary">New Neighborhood</a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <td>ID</td>
                <td>Name</td>
            </tr>
            <?php foreach($model as $row): ?>
            <tr>
                <td><?= $row['x']->getId() ?></td>
                <td><?= $row['x']->getProperty('name') ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
