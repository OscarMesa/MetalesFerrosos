<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MarcasGestionDocumental]].
 *
 * @see MarcasGestionDocumental
 */
class MarcasGestionDocumentalQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MarcasGestionDocumental[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MarcasGestionDocumental|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
