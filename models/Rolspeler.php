<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rolspeler".
 *
 * @property int $id
 * @property string $naam
 * @property int $actief
 *
 * @property Gesprek[] $gespreks
 */
class Rolspeler extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rolspeler';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['naam', 'actief'], 'required'],
            [['actief'], 'integer'],
            [['naam'], 'string', 'min' => 5, 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'naam' => 'Naam',
            'actief' => 'actief',
        ];
    }

    /**
     * Gets query for [[Gespreks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGespreks()
    {
        return $this->hasMany(Gesprek::className(), ['rolspeler_id' => 'id']);
    }
}
