<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "examen".
 *
 * @property int $id
 * @property string $naam
 * @property string $datum_van
 * @property string $datum_tot
 * @property int $actief
 *
 * @property ExamenGesprekSoort[] $examenGesprekSoorts
 */
class Examen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'examen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['naam', 'datum_van', 'datum_tot', 'actief'], 'required'],
            [['datum_van', 'datum_tot'], 'safe'],
            [['actief'], 'integer'],
            [['naam'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'naam' => 'examennaam',
            'datum_van' => 'van',
            'datum_tot' => 'tot',
            'actief' => 'actief',
        ];
    }

    /**
     * Gets query for [[ExamenGesprekSoorts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExamenGesprekSoort()
    {
        return $this->hasMany(ExamenGesprekSoort::className(), ['examen_id' => 'id']);
        // return $this->hasMany(GesprekSoort::className());
    }

    // TODO not yet in use, still usefull?
    public function getActiveExamen() {
        $examen = examen::find()->where(['actief' => '1'])->orderBy(['datum_van' => 'SORT_DESC'])->one();
        return $examen;
    }

}
