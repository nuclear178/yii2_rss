<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property string $publication_date
 * @property string $title
 * @property string $short_text
 * @property string $full_text
 * @property string $image_small
 * @property string $image_large
 * @property integer $source
 * @property string $hash
 *
 * @property Channel $source0
 */
class Article extends ActiveRecord
{

    /**
     * @var UploadedFile
     */
    public $image_file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @param $title
     * @return bool
     * @throws \yii\db\Exception
     */
    public static function alreadyExists($title)
    {
        $expectedHash = self::calculateHash($title);
        $query = Yii::$app->db
            ->createCommand('SELECT COUNT(*) FROM articles WHERE hash = :expectedHash')
            ->bindValue(':expectedHash', $expectedHash)
            ->queryScalar();
        return $query > 0;
    }

    public static function calculateHash($title)
    {
        return md5($title);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['publication_date'], 'safe'],
            [['title', 'short_text', 'full_text'], 'string'],
            [['source'], 'integer'],
            [['image_small', 'image_large'], 'string', 'max' => 255],
            [['hash'], 'string', 'max' => 32],
            [['source'], 'exist', 'skipOnError' => true, 'targetClass' => Channel::className(), 'targetAttribute' => ['source' => 'id']],
            [['image_file', 'title', 'full_text'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'image_file' => 'Изображение',
            'id' => 'ID',
            'publication_date' => 'Дата публикации',
            'title' => 'Заголовок',
            'short_text' => 'Short Text',
            'full_text' => 'Текст',
            'image_small' => 'Image Small',
            'image_large' => 'Image Large',
            'source' => 'Источник',
            'hash' => 'Hash',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource0()
    {
        return $this->hasOne(Channel::className(), ['id' => 'source']);
    }

    public function upload()
    {
        if ($this->validate()) {
            $path = Yii::getAlias('@app') . '/uploads/'
                . $this->image_file->baseName
                . '.'
                . $this->image_file->extension;
            $this->image_file->saveAs($path);

            $this->image_large = $path;
            $this->image_small = $path;

            return true;
        } else {
            return false;
        }
    }
}
