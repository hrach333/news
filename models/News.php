<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $alias
 * @property string $title
 * @property string|null $description
 * @property string|null $text
 * @property string|null $date_create
 * @property string|null $date_update
 *
 * @property NewsRubric[] $newsRubrics
 * @property Rubric[] $rubrics
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['date_create', 'date_update'], 'safe'],
            [['alias', 'title', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'title' => 'Title',
            'description' => 'Description',
            'text' => 'Text',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
        ];
    }

    /**
     * Gets query for [[NewsRubrics]].
     *
     * @return \yii\db\ActiveQuery|NewsRubricQuery
     */
    public function getNewsRubrics()
    {
        return $this->hasMany(NewsRubric::class, ['news_id' => 'id']);
    }

    /**
     * Gets query for [[Rubrics]].
     *
     * @return \yii\db\ActiveQuery|RubricQuery
     */
    public function getRubrics()
    {
        return $this->hasMany(Rubric::class, ['id' => 'rubric_id'])->viaTable('news_rubric', ['news_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }
}
