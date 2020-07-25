<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GesprekSoort;

/**
 * GesprekSoortSearch represents the model behind the search form of `app\models\GesprekSoort`.
 */
class GesprekSoortSearch extends GesprekSoort
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kerntaak_nr', 'gesprek_nr'], 'integer'],
            [['kerntaak_naam', 'gesprek_naam'], 'safe'],
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
        // $query = GesprekSoort::find()->orderBy(['kerntaak_nr' => SORT_ASC, 'gesprek_nr' => SORT_ASC]);
        $query = GesprekSoort::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [ 'attributes' => ['kerntaak_nr', 'gesprek_naam','gesprek_nr','kerntaak_naam'],
                        'defaultOrder' => ['kerntaak_nr' => SORT_ASC, 'gesprek_nr' => SORT_ASC]
            ],
        ]);
        // $dataProvider->sort = ['defaultOrder' =>['kerntaak_nr' => SORT_ASC, 'gesprek_nr' => SORT_ASC]];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'kerntaak_nr' => $this->kerntaak_nr,
            'gesprek_nr' => $this->gesprek_nr,
        ]);

        $query->andFilterWhere(['like', 'kerntaak_naam', $this->kerntaak_naam])
              ->andFilterWhere(['like', 'gesprek_naam', $this->gesprek_naam]);

        return $dataProvider;
    }
}
