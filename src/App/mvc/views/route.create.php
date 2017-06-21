<div class="row">
    <h3>ROUTE</h3>
    <div class="col-md-6">
        <form action="?action=createRel" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="node">From</label>
                <select name="node1">
                    <?php foreach($model as $row): ?>
                            <option value="<?= $row['x']->getId() ?>"><?= $row['x']->getProperty('name') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="node">To</label>
                <select name="node2">
                    <?php foreach($model as $row): ?>
                        <option value="<?= $row['x']->getId() ?>"><?= $row['x']->getProperty('name') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="node">Distance</label>
                <input type="text" name="Propriedades[km]" placeholder="Kilometers">
            </div>
            <div class="form-group">
                <label for="node">Peak-time speed</label>
                <input type="text" name="Property[rushHour]" placeholder="Speed">
            </div>
            <div class="form-group">
                <label for="node">Speed in normal hour</label>
                <input type="text" name="Property[normalHour]" placeholder="Speed">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Relationalship">
            </div>
        </form>
    </div>
</div>
