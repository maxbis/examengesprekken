<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gesprek_status".
 *
 * @property int $id
 * @property string $naam
 */
class GesprekStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gesprek_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'naam'], 'required'],
            [['id'], 'integer'],
            [['naam'], 'string', 'max' => 10],
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
        ];
    }
}
