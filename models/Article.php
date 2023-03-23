<?php

namespace app\models;

use app\traits\SoftDelete;
use Yii;

/**
 * This is the model class for table "edobavki.art_article".
 *
 * @property int $id Идентификатор статьи
 * @property string $spec Название статьи
 * @property string $announcement Анонс статьи
 * @property string|null $content Контент статьи
 * @property string $thumb_name
 * @property int|null $updater_id Идентификатор изменившего запись
 * @property string|null $update_time Дата изменения записи
 * @property int $creator_id Идентификатор создателя записи
 * @property string $create_time Дата создания записи
 */
class Article extends \yii\db\ActiveRecord
{
    use SoftDelete;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edobavki.art_article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['spec', 'announcement', 'thumb_name', 'creator_id', 'create_time'], 'required'],
            [['announcement', 'content'], 'string'],
            [['updater_id', 'creator_id'], 'integer'],
            [['update_time', 'create_time'], 'safe'],
            [['spec'], 'string', 'max' => 128],
            [['thumb_name'], 'string', 'max' => 32],
            [['updater_id'], 'exist', 'skipOnError' => true, 'targetAttribute' => ['updater_id' => 'id']],
            [['creator_id'], 'exist', 'skipOnError' => true, 'targetAttribute' => ['creator_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'spec' => 'Название',
            'announcement' => 'Анонс',
            'content' => 'Контент',
            'thumb_name' => 'Превью',
            'updater_id' => 'Редактор',
            'update_time' => 'Дата изменения',
            'creator_id' => 'Создатель',
            'create_time' => 'Дата создания',
        ];
    }

    public function createArticle(): array
    {
        return Yii::$app->backendApi->createArticle([
            'spec' => $this->spec,
            'announcement' => $this->announcement,
            'content' => $this->content,
            'thumb_name' => $this->thumb_name
        ]);
    }

    public function updateArticle(): array
    {
        return Yii::$app->backendApi->updateArticle([
            'id' => $this->id,
            'spec' => $this->spec,
            'announcement' => $this->announcement,
            'content' => $this->content,
            'thumb_name' => $this->thumb_name
        ]);
    }

    public function deleteArticle(): array
    {
        return Yii::$app->backendApi->deleteArticle([
            'id' => (int)$this->id,
        ]);
    }
}
