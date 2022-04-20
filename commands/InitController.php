<?php

namespace app\commands;

use app\models\Catalog;
use app\models\Product;
use yii\console\Controller;

class InitController extends Controller
{
    public function actionFillModels()
    {
        for ($i = 0; $i < 5; $i++) {
            $catalog = new Catalog([
                'name' => 'Catalog #' . ($i + 1),
            ]);
            $catalog->save();
            for ($j = 0; $j < 5; $j++) {
                $n       = $i * 5 + $j;
                $product = new Product([
                    'name'       => 'Product #' . ($n + 1),
                    'catalog_id' => $catalog->id,
                    'count'      => $n % 3,
                ]);
                $product->save();
            }
        }
    }
}