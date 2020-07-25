<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gesprek_soort".
 *
 * @property int $id
 * @property int $kerntaak_nr
 * @property string $kerntaak_naam
 * @property int $gesprek_nr
 * @property string $gesprek_naam
 *
 * @property ExamenGesprekSoort[] $examenGesprekSoorts
 * @property Gesprek[] $gespreks
 */
class gesprekSoort extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gesprek_soort';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kerntaak_nr', 'kerntaak_naam', 'gesprek_nr', 'gesprek_naam'], 'required'],
            [['kerntaak_nr', 'gesprek_nr'], 'integer', 'min'=>1, 'max'=>10],
            [['kerntaak_naam', 'gesprek_naam'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kerntaak_nr' => 'KT Nr',
            'kerntaak_naam' => 'KT Naam',
            'gesprek_nr' => 'Gesprek Nr',
            'gesprek_naam' => 'Gesprek Naam',
        ];
    }

    /**
     * Gets query for [[ExamenGesprekSoorts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExamenGesprekSoorts()
    {
        return $this->hasMany(ExamenGesprekSoort::className(), ['gesprek_soort_id' => 'id']);
    }

    /**
     * Gets query for [[Gespreks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGespreks()
    {
        return $this->hasMany(Gesprek::className(), ['gesprek_soort_id' => 'id']);
    }
}
