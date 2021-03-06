<thead style="background-color: white">
<tr>
    <th class="sorter-false filter-false">#</th>
<?php if (!empty($data['hide_lines_column'])) { ?>
    <th class="sorter-false filter-false">hide
        <span data-toggle="tooltip" title="Hide the method from graphs" class="glyphicon glyphicon-question-sign"></span>
    </th>
<?php } ?>
    <th class="sorter-text">name</th>
<?php foreach ($data['fields'] as $param) { ?>
    <th class="text-right filter-false"><?= $param ?>
        <span data-toggle="tooltip" title="<?= $data['field_descriptions'][$param] ?? '' ?>" class="glyphicon glyphicon-question-sign"></span>
    </th>
<?php } ?>
</tr>
</thead>
<tbody>
<?php
/** @var \Badoo\LiveProfilerUI\Entity\MethodData $MethodData */
foreach ($data['data'] as $MethodData) {
?>
    <tr>
        <td>
            <a href="/profiler/method-usage.phtml?method=<?= $MethodData->getMethodNameAlt() ?>">
                <span class="glyphicon glyphicon-stats" data-toggle="tooltip" title="Goto method usage stats"></span>
            </a>
        </td>
    <?php if (!empty($data['hide_lines_column'])) { ?>
        <td>
            <input type="checkbox" class="method-selector" data-method="<?= $MethodData->getMethodName() ?>" checked="checked">
        </td>
    <?php } ?>
        <td>
            <a href="<?= $data['link_base'] ?>&method_id=<?= $MethodData->getMethodId() ?>&stat_interval=<?= $data['stat_interval'] ?? 0 ?>&date1=<?= $data['date1'] ?? '' ?>&date2=<?= $data['date2'] ?? '' ?>" title="<?= $MethodData->getMethodNameAlt() ?>">
                <?= $MethodData->getMethodName() ?>
            </a>
        </td>
    <?php foreach ($data['fields'] as $param) { ?>
        <td class="text-right"><?= $MethodData->getFormattedValue($param) ?></td>
    <?php } ?>
    </tr>
<?php } ?>
</tbody>
