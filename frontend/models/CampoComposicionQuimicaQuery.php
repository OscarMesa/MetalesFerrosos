<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CampoComposicionQuimica]].
 *
 * @see CampoComposicionQuimica
 */
class CampoComposicionQuimicaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CampoComposicionQuimica[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CampoComposicionQuimica|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
