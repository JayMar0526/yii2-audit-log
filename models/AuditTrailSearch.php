<?php

namespace ramyaj\auditlogs\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ramyaj\auditlogs\models\AuditTrail;

/**
 * AuditTrailSearch represents the model behind the search form about `ramyaj\auditlogs\models\AuditTrail`.
 */
class AuditTrailSearch extends AuditTrail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activity_id', 'user_id'], 'integer'],
            [['datetime', 'module', 'controller', 'action', 'route', 'params'], 'safe'],
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
        $query = AuditTrail::find();

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
            'activity_id' => $this->activity_id,
            'user_id' => $this->user_id,
            'datetime' => $this->datetime,
        ]);

        $query->andFilterWhere(['like', 'module', $this->module])
            ->andFilterWhere(['like', 'controller', $this->controller])
            ->andFilterWhere(['like', 'action', $this->action])
            ->andFilterWhere(['like', 'route', $this->route])
            ->andFilterWhere(['like', 'params', $this->params]);

        return $dataProvider;
    }
}
