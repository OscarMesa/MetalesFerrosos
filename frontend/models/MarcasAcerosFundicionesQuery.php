<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MarcasAcerosFundiciones]].
 *
 * @see MarcasAcerosFundiciones
 */
class MarcasAcerosFundicionesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MarcasAcerosFundiciones[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MarcasAcerosFundiciones|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
