<?php

namespace jaymar0526\auditlogs\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use jaymar0526\auditlogs\models\Log;

/**
 * LogSearch represents the model behind the search form about `jaymar0526\auditlogs\models\Log`.
 */
class LogSearch extends Log
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'change_id', 'user'], 'integer'],
            [['class', 'type', 'datetime', 'update_details', 'original_details'], 'safe'],
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
        $query = Log::find();

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
            'change_id' => $this->change_id,
            'user' => $this->user,
            'datetime' => $this->datetime,
        ]);

        $query->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'update_details', $this->update_details])
            ->andFilterWhere(['like', 'original_details', $this->original_details]);

        return $dataProvider;
    }
}
