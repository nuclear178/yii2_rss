<?php
/**
 * Created by PhpStorm.
 * User: autodesk
 * Date: 22.12.2017
 * Time: 0:17
 */

namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class ArticleForm extends Model
{
    public $title;
    public $text;
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

    public function rules()
    {
        return [
            [['text', 'title', 'image_file'], 'required']
        ];
    }


}