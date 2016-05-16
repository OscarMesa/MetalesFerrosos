<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CaracteristicaMarca;

/**
 * CaracteristicaMarcaSearch represents the model behind the search form about `frontend\models                                                                                          \CaracteristicaMarca`.
 */
class CaracteristicaMarcaSearch extends CaracteristicaMarca
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_marca', 'id_campo', 'id_estado_material'], 'integer'],
            [['valor1', 'valor2'], 'number'],
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
        $query = CaracteristicaMarca::find();

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
            'id_marca' => $this->id_marca,
            'id_campo' => $this->id_campo,
            'id_estado_material' => $this->id_estado_material,
            'valor1' => $this->valor1,
            'valor2' => $this->valor2,
        ]);

        return $dataProvider;
    }
}
