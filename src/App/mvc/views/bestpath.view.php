<div class="row">
    <div class="page-header">
        <h1>Best Path</h1>
    </div>
</div>
    <?php foreach ($model as $item): ?>
        <?php
        $totalSpeedNormal = '';
        $totalSpeedRush = '';
        $kmTotal = '';
        $totalOfNodes = '';
        ?>
        <div class="col-md-3">
        <?php $kmTotal = $item['totalKm']; ?>
        <?php foreach ($item['bestPath']->getNodes() as $nodes): ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge">ID: <?= $nodes->getId(); ?></span>
                    <?= $nodes->getProperty('name').' >'; ?>
                </li>
            </ul>
        <?php endforeach; ?>
        </div>

    <div class="col-md-7">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php foreach ($item['bestPath']->getRelationships() as $relationship): ?>
                <ul class="list-inline">
                    <li><?= $relationship->getProperty('km').' KM'; ?></li>
                    <li><?= 'NORMAL:'.$relationship->getProperty('normalHour').'Km/h'; ?></li>
                    <li><?= 'RUSH:'.$relationship->getProperty('rushHour').'Km/h'; ?></li>
                </ul>

                <?php $totalSpeedNormal += (int)$relationship->getProperty('normalHour'); ?>
                <?php $totalSpeedRush += (int)$relationship->getProperty('rushHour'); ?>
                <?php $totalOfNodes = count($item['bestPath']->getRelationships()) ?>
            <?php endforeach; ?>
            <h2><?= 'TOTAL: '.$item['totalKm'].' KM' ?></h2>
        </div>
        <div class="panel-footer">
            <ul class="list-group">
                <li class="list-group-item">Average Speed (Normal) <?= number_format($totalSpeedNormal/$totalOfNodes, 2, '.', '') ?> Km/H</li>
                <li class="list-group-item">Average Speed (Rush) <?= number_format($totalSpeedRush/$totalOfNodes, 2, '.', '') ?> Km/H</li>
                <li class="list-group-item">Time Normal: <?= number_format($kmTotal/($totalSpeedNormal/$totalOfNodes)*60, 2, '.', '')  ?> min</li>
                <li class="list-group-item">Time in Rush: <?= number_format($kmTotal/($totalSpeedRush/$totalOfNodes)*60, 2, '.', '')  ?> min</li>
            </ul>
        </div>
    </div>
    </div>
<?php endforeach; ?>
</div>
