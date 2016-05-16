<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MarcasAcerosFundiciones;

/**
 * MarcasAcerosFundicionesSearch represents the model behind the search form about `app\models\MarcasAcerosFundiciones`.
 */
class MarcasAcerosFundicionesSearch extends MarcasAcerosFundiciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_subtipo_metal'], 'integer'],
            [['marcas_aceros_fundiciones'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = MarcasAcerosFundiciones::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_subtipo_metal' => $this->id_subtipo_metal,
        ]);

        $query->andFilterWhere(['like', 'marcas_aceros_fundiciones', $this->marcas_aceros_fundiciones]);

        return $dataProvider;
    }
}
