<?php

namespace culturePnPsu\book\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "book_type".
 *
 * @property integer $id
 * @property string $title
 * @property integer $kind
 *
 * @property Book[] $books
 */
class BookType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'kind'], 'required'],
            [['kind'], 'integer'],
            [['title'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('book', 'ID'),
            'title' => Yii::t('book', 'Title'),
            'kind' => Yii::t('book', 'Kind'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['book_type_id' => 'id']);
    }
    
    public static function getList(){
        return ArrayHelper::map(self::find()->all(),'id','title');
    }
}
