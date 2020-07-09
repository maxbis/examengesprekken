<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "examen_gesprek_soort".
 *
 * @property int $id
 * @property int $examen_id
 * @property int $gesprek_soort_id
 *
 * @property Examen $examen
 * @property GesprekSoort $gesprekSoort
 */
class ExamenGesprekSoort extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'examen_gesprek_soort';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['examen_id', 'gesprek_soort_id'], 'required'],
            [['examen_id', 'gesprek_soort_id'], 'integer'],
            [['examen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Examen::className(), 'targetAttribute' => ['examen_id' => 'id']],
            [['gesprek_soort_id'], 'exist', 'skipOnError' => true, 'targetClass' => GesprekSoort::className(), 'targetAttribute' => ['gesprek_soort_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'examen_id' => 'Examen ID',
            'gesprek_soort_id' => 'Gesprek Soort ID',
        ];
    }

    /**
     * Gets query for [[Examen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExamen()
    {
        return $this->hasOne(Examen::className(), ['id' => 'examen_id']);
    }

    /**
     * Gets query for [[GesprekSoort]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGesprekSoort()
    {
        return $this->hasOne(GesprekSoort::className(), ['id' => 'gesprek_soort_id']);
    }
}
