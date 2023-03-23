<?php

namespace app\models;

use app\traits\SoftDelete;
use Yii;

/**
 * This is the model class for table "edobavki.adt_additive".
 *
 * @property int $id Идентификатор
 * @property string $code Код добавки
 * @property string $spec Наименование
 * @property string|null $functions Технологические функции
 * @property int $in_russia Разрешена ли в таможенном союзе?http://webportalsrv.gost.ru/portal/GostNews.nsf/acaf7051ec840948c22571290059c78f/9fe752e7e38cc18e44257bde0024e7d4/$FILE/TR_TS_029-2012_text.pdf
 * @property string|null $appearance Внешний вид добавки
 * @property int $in_eu Разрешена ли в Евросоюзе? https://www.food.gov.uk/science/additives/enumberlist
 * @property string|null $negative_effects Отрицательное
 * @property int|null $seq Число из кода добавки
 * @property int|null $order_number Число для сортировки если у добавки есть a b c d.. поддобавки
 * @property string $information Информация о добавке
 * @property string $employment Использование добавки
 * @property string $extracted_from Получают из..
 * @property int|null $updater_id Идентификатор изменившего запись
 * @property string|null $update_time Дата изменения записи
 * @property int $creator_id Идентификатор создателя записи
 * @property string $create_time Дата создания записи
 */
class Additive extends \yii\db\ActiveRecord
{
    use SoftDelete;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edobavki.adt_additive';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'spec', 'information', 'employment', 'extracted_from', 'creator_id', 'create_time'], 'required'],
            [['spec', 'functions', 'appearance', 'negative_effects', 'information', 'employment', 'extracted_from'], 'string'],
            [['in_russia', 'in_eu', 'seq', 'order_number', 'updater_id', 'creator_id'], 'integer'],
            [['update_time', 'create_time'], 'safe'],
            [['code'], 'string', 'max' => 16],
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
            'code' => 'Код',
            'spec' => 'Название',
            'functions' => 'Технологические функции',
            'in_russia' => 'Разрешена в РФ',
            'appearance' => 'Внешний вид',
            'in_eu' => 'Разрешена в ЕС',
            'negative_effects' => 'Негативные эффекты',
            'seq' => 'Seq',
            'order_number' => 'Order Number',
            'information' => 'Information',
            'employment' => 'Использование',
            'extracted_from' => 'Получают из',
            'updater_id' => 'Редактор',
            'update_time' => 'Дата обновления',
            'creator_id' => 'Создатель',
            'create_time' => 'Дата создания',
        ];
    }

    public function createAdditive(): array
    {
        return Yii::$app->backendApi->createAdditive([
            'code' => $this->code,
            'spec' => $this->spec,
            'seq' => (int)$this->seq,
            'functions' => $this->functions,
            'in_russia' => (bool)$this->in_russia,
            'appearance' => $this->appearance,
            'in_eu' => (bool)$this->in_eu,
            'negative_effects' => $this->negative_effects,
            'order_number' => (int)$this->order_number,
            'employment' => $this->employment,
            'extracted_from' => $this->extracted_from
        ]);
    }

    public function updateAdditive(): array
    {
        return Yii::$app->backendApi->updateAdditive([
            'code' => $this->code,
            'spec' => $this->spec,
            'seq' => (int)$this->seq,
            'functions' => $this->functions,
            'in_russia' => (bool)$this->in_russia,
            'appearance' => $this->appearance,
            'in_eu' => (bool)$this->in_eu,
            'negative_effects' => $this->negative_effects,
            'order_number' => (int)$this->order_number,
            'employment' => $this->employment,
            'extracted_from' => $this->extracted_from
        ]);
    }

    public function deleteAdditive(): array
    {
        return Yii::$app->backendApi->deleteAdditive([
            'code' => $this->code,
        ]);
    }
}
