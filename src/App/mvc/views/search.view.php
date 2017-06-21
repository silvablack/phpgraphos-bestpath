<div class="row">
    <h3>Search Best Path</h3>
    <div class="col-md-6">
        <form action="?action=bestPath" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="from">From</label>
                <select name="from">
                    <?php foreach ($model as $item) : ?>
                        <option value="<?= $item['x']->getId() ?>"><?= $item['x']->getProperty('name') ?></option>
                    <?php  endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="to">To</label>
                <select name="to">
                    <?php foreach ($model as $item) : ?>
                    <option value="<?= $item['x']->getId() ?>"><?= $item['x']->getProperty('name') ?></option>
                    <?php  endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Search Best Path">
            </div>
        </form>
    </div>
</div>
