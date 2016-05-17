<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ComposicionQuimica]].
 *
 * @see ComposicionQuimica
 */
class ComposicionQuimicaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ComposicionQuimica[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ComposicionQuimica|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
