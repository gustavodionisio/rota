<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario2;

/**
 * Usuario2Busca represents the model behind the search form about `app\models\Usuario2`.
 */
class Usuario2Busca extends Usuario2
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'admin', 'numero'], 'integer'],
            [['firstName', 'lastName', 'username', 'password', 'authKey', 'email', 'telefone', 'cpf', 'rg', 'dataNasc', 'estado', 'cidade', 'bairro', 'rua', 'referencia', 'nomeEmergencia', 'telefoneEmergencia', 'latitude', 'longitude'], 'safe'],
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
        $query = Usuario2::find();

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
            'admin' => $this->admin,
            'dataNasc' => $this->dataNasc,
            'numero' => $this->numero,
        ]);

        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'lastName', $this->lastName])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'authKey', $this->authKey])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'telefone', $this->telefone])
            ->andFilterWhere(['like', 'cpf', $this->cpf])
            ->andFilterWhere(['like', 'rg', $this->rg])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'cidade', $this->cidade])
            ->andFilterWhere(['like', 'bairro', $this->bairro])
            ->andFilterWhere(['like', 'rua', $this->rua])
            ->andFilterWhere(['like', 'referencia', $this->referencia])
            ->andFilterWhere(['like', 'nomeEmergencia', $this->nomeEmergencia])
            ->andFilterWhere(['like', 'telefoneEmergencia', $this->telefoneEmergencia])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longitude', $this->longitude]);

        return $dataProvider;
    }
}
