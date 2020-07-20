<?php

namespace app\models;
use app\models\rolspeler;

use Yii;

/**
 * This is the model class for table "gesprek".
 *
 * @property int $id
 * @property string $student_naam
 * @property string $lokaal
 * @property int $rolspeler_id
 * @property int $gesprek_soort_id
 * @property int $status
 *
 * @property GesprekSoort $gesprekSoort
 * @property Rolspeler $rolspeler
 */
class gesprek extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gesprek';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_naam', 'lokaal', 'rolspeler_id', 'gesprek_soort_id', 'status'], 'required'],
            [['rolspeler_id', 'gesprek_soort_id', 'status', 'examen_id'], 'integer'],
            [['student_naam'], 'string', 'min' => 8, 'max' => 100],
            [['lokaal'], 'string', 'max' => 10],
            [['lokaal'], 'trim'],
            [['gesprek_soort_id'], 'exist', 'skipOnError' => true, 'targetClass' => GesprekSoort::className(), 'targetAttribute' => ['gesprek_soort_id' => 'id']],
            [['rolspeler_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rolspeler::className(), 'targetAttribute' => ['rolspeler_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_naam' => 'Student Naam',
            'lokaal' => 'Lokaal',
            'rolspeler_id' => 'Rolspeler ID',
            'gesprek_soort_id' => 'Gesprek Soort ID',
            'status' => 'Status',
            'examen_id' => 'examen ID',
        ];
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

    /**
     * Gets query for [[Rolspeler]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRolspeler()
    {
        return $this->hasOne(Rolspeler::className(), ['id' => 'rolspeler_id']);
    }

    public function getAllRolspelers()
    {
        // rolspeler::find()->all();
        return rolspeler::find()->where(['actief' => '1'])->all();;
    }

    public function getStatusNaam()
    {
        return $this->hasOne(GesprekStatus::className(), ['id' => 'status']);
    }

    public function getGespreksNaam()
    {
        return $this->hasOne(GesprekSoort::className(), ['id' => 'gesprek_soort_id']);
    }
}
