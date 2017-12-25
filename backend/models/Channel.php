<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "channels".
 *
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property string $description
 *
 * @property Article[] $articles
 */
class Channel extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'channels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link'], 'string', 'max' => 255],
            [['link'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'link' => 'RSS URL',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['source' => 'id']);
    }
}
