<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_rubric".
 *
 * @property int $news_id
 * @property int $rubric_id
 * @property string|null $created_at
 *
 * @property News $news
 * @property Rubric $rubric
 */
class NewsRubric extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_rubric';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_id', 'rubric_id'], 'required'],
            [['news_id', 'rubric_id'], 'integer'],
            [['created_at'], 'safe'],
            [['news_id', 'rubric_id'], 'unique', 'targetAttribute' => ['news_id', 'rubric_id']],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::class, 'targetAttribute' => ['news_id' => 'id']],
            [['rubric_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rubric::class, 'targetAttribute' => ['rubric_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'rubric_id' => 'Rubric ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::class, ['id' => 'news_id']);
    }

    /**
     * Gets query for [[Rubric]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRubric()
    {
        return $this->hasOne(Rubric::class, ['id' => 'rubric_id']);
    }
}
