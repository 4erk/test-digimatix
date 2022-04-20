<?php
/* @var $this yii\web\View */

/* @var $catalogs Catalog[] */

use app\models\Catalog;
use yii\web\JqueryAsset;

$this->registerJsFile('/js/catalog.js', ['depends' => [JqueryAsset::class]]);
?>
<ul class="list-group">
    <?php foreach ($catalogs as $catalog) {
        $products = $catalog->products;
        ?>
        <li class="list-group-item active"><?= $catalog->name ?></li>
        <?php foreach ($products as $product) { ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $product->name ?>
                <span>
                    <?php if ($product->count) { ?>
                        <button type="button" class="btn btn-sm btn-warning btn-buy" data-id="<?= $product->id ?>">
                            Buy
                        </button>
                    <?php } ?>
                    <span class="badge badge-pill badge-primary"><?= $product->count ?></span>
                </span>
            </li>
        <?php } ?>
    <?php } ?>

</ul>
