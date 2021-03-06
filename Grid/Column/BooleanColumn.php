<?php

    /*
 * This file is part of the DataGridBundle.
 *
 * (c) Abhoryo <abhoryo@free.fr>
 * (c) Stanislav Turza
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace APY\DataGridBundle\Grid\Column;

class BooleanColumn extends Column
{
    public function __initialize(array $params)
    {
        $params['filter'] = 'select';
        $params['selectFrom'] = 'values';
        $params['operators'] = array(self::OPERATOR_EQ);
        $params['defaultOperator'] = self::OPERATOR_EQ;
        $params['operatorsVisible'] = false;
        $params['selectMulti'] = false;

        parent::__initialize($params);

        $this->setAlign($this->getParam('align', 'center'));
        $this->setSize($this->getParam('size', '30'));
        $this->setValues($this->getParam('values', array(1 => 'true', 0 => 'false')));
    }

    public function isQueryValid($query)
    {
        if ($query === true || $query === false || $query == 1 || $query == 0) {
            return true;
        }

        return false;
    }

    public function getType()
    {
        return 'boolean';
    }
}
