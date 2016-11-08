<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "blog_post".
 *
 * @property integer $id
 * @property integer $catalog_id
 * @property string $title
 * @property string $brief
 * @property string $content
 * @property string $tags
 * @property string $surname
 * @property string $banner
 * @property integer $click
 * @property integer $user_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property BlogComment[] $blogComments
 * @property BlogCatalog $catalog
 * @property User $user
 */
class BlogPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catalog_id', 'title', 'content', 'tags', 'surname', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['catalog_id', 'click', 'user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['brief', 'content'], 'string'],
            [['title', 'tags', 'banner'], 'string', 'max' => 255],
            [['surname'], 'string', 'max' => 128],
            //[['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlogCatalog::className(), 'targetAttribute' => ['catalog_id' => 'id']],
            //[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catalog_id' => 'Catalog ID',
            'title' => 'Title',
            'brief' => 'Brief',
            'content' => 'Content',
            'tags' => 'Tags',
            'surname' => 'Surname',
            'banner' => 'Banner',
            'click' => 'Click',
            'user_id' => 'User ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogComments()
    {
        return $this->hasMany(BlogComment::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(BlogCatalog::className(), ['id' => 'catalog_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
