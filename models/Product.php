<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property int      $id
 * @property string   $name
 * @property int      $count
 * @property int      $catalog_id
 *
 * @property Bucket[] $buckets
 * @property Catalog  $catalog
 */
class Product extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'catalog_id'], 'required'],
            [['count', 'catalog_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::className(), 'targetAttribute' => ['catalog_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'name'       => 'Name',
            'count'      => 'Count',
            'catalog_id' => 'Catalog ID',
        ];
    }

    /**
     * Gets query for [[Buckets]].
     *
     * @return ActiveQuery
     */
    public function getBuckets()
    {
        return $this->hasMany(Bucket::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Catalog]].
     *
     * @return ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'catalog_id']);
    }
}
