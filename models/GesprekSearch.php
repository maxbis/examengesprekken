<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gesprek;

/**
 * GesprekSearch represents the model behind the search form of `app\models\Gesprek`.
 */
class GesprekSearch extends Gesprek
{
    /**
     * {@inheritdoc}
     */
    public $statusNaam;

    public function rules()
    {
        return [
            [['id', 'rolspeler_id', 'gesprek_soort_id', 'status', 'examen_id'], 'integer'],
            [['student_naam', 'lokaal', 'statusNaam'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Gesprek::find();

        $query->joinWith(['statusNaam']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['statusNaam'] = [  
            'asc' => ['gesprek_status.id' => SORT_ASC],
            'desc' => ['gesprek_status.id' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'rolspeler_id' => $this->rolspeler_id,
            'gesprek_soort_id' => $this->gesprek_soort_id,
            'status' => $this->status,
            'examen_id' => $this->examen_id,
        ]);

        $query->andFilterWhere(['like', 'student_naam', $this->student_naam])
            ->andFilterWhere(['like', 'lokaal', $this->lokaal])
            ->andFilterWhere(['like', 'gesprek_status.naam', $this->statusNaam]);

        return $dataProvider;
    }
}
