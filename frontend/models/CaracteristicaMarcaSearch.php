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

        //print_r($query);die;

        $query->joinWith(['idMarca' => function($query){
                $query->joinWith('idSubtipoMetal');
                $query->joinWith('composicionQuimicas');
            },

            'idCampo',
        ]);


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

        $query->groupBy(['marcas_aceros_fundiciones.id']);

        if(isset($_REQUEST['TipoMetales'])){
            $condIn = array();
            foreach ($_REQUEST['TipoMetales'] as $tipo) {
                foreach ($tipo as $subtipos) {
                    foreach ($subtipos as $value) {
                        $condIn[] =  $value;
                    }
                }
            }
            $query->andWhere('subtipo_metales.id IN ('.implode(',', $condIn).')');
        }


       if(isset($_REQUEST['TratamientoTermico'])){
            $query->andWhere('caracteristica_marca.id_estado_material='.EstadoMaterial::LAMINADO_EN_CALIENTE);
            //print_r($_REQUEST['TratamientoTermico']);die;
            foreach ($_REQUEST['TratamientoTermico'] as $id_campo => $intervalo) {
                $intervalo['min'] = empty($intervalo['min'])?0:$intervalo['min'];
                $intervalo['min'] = empty($intervalo['max'])?0:$intervalo['max'];
                $query->orWhere('id_campo = '.$id_campo." AND valor1 >= ".$intervalo['min'].' AND valor2 <= '.$intervalo['max']);
            }
        }


        if(isset($_REQUEST['ComposicionQuimica'])){
            foreach ($_REQUEST['ComposicionQuimica'] as $id_campo => $intervalo) {
                $intervalo['min'] = empty($intervalo['min'])?0:$intervalo['min'];
                $intervalo['min'] = empty($intervalo['max'])?0:$intervalo['max'];
                $query->orWhere('composicion_quimica.id_campo_composicion = '.$id_campo." AND composicion_quimica.min >= ".$intervalo['min'].' AND composicion_quimica.max <= '.$intervalo['max']);
            }
        }


        if(isset($_REQUEST['EstadoMaterial'])){
            foreach ($_REQUEST['EstadoMaterial'] as $estadoMaterialArray) {
                foreach ($estadoMaterialArray as $id) {
                    $query->orWhere('caracteristica_marca.id_estado_material='.$id);
                }
            }
        }

        
        // grid filtering conditions
        $query->andFilterWhere([
            'caracteristica_marca.id' => $this->id,
            'caracteristica_marca.id_marca' => $this->id_marca,
            'caracteristica_marca.id_campo' => $this->id_campo,
            'caracteristica_marca.id_estado_material' => $this->id_estado_material,
            'caracteristica_marca.valor1' => $this->valor1,
            'caracteristica_marca.valor2' => $this->valor2,
        ]);


        return $dataProvider;
    }
}


