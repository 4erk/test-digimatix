<?php

namespace app\controllers;

use app\models\Catalog;
use yii\web\Controller;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        $catalogs = Catalog::find()->all();
        return $this->render('index', ['catalogs' => $catalogs]);
    }

}
