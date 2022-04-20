<?php

namespace app\controllers;

use app\models\Bucket;
use app\models\Product;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class BucketController extends Controller
{
    public function actionAdd($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $product                    = Product::findOne($id);
        if (!$product) {
            return false;
        }
        $bucket = new Bucket([
            'session_id' => Yii::$app->session->id,
            'product_id' => $product->id,
        ]);
        if (!$bucket->save()) {
            return false;
        }

        return Bucket::getCountBySessionId(Yii::$app->session->id);

    }
}
