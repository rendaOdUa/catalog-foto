<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $imageUrl
 * @property string $avatarUrl
 * @property string $date
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'min' => 3, 'max' => 50],
            [['date'], 'safe'],
            [['autor'], 'string', 'min'=>3, 'max' => 50],
            [['description', 'imageUrl'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxSize' => 1024*1024*5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'imageUrl' => 'Image Url',
            'date' => 'Date',
        ];
    }
}
