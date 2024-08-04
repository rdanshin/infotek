<?php

namespace app\models;

use yii\db\ActiveRecord;

class Subscribers extends ActiveRecord
{
    /**
     * @var mixed|null
     */
    public static function tableName()
    {
        return 'subscribers';
    }

    public function rules()
    {
        return [
            [['phone', 'author_id'], 'required'],
            [['phone'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author',
            'name' => 'Name',
        ];
    }

    public function getAuthor() {
        return Authors::find()->where(['id' => 'author_id'])->one();
    }



}