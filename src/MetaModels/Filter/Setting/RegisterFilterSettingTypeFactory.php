<?php

/**
 * This file is part of MetaModels/filter_register.
 *
 * (c) 2012-2019 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels/filter_register
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Marc Reimann <reimann@mediendepot-ruhr.de>
 * @author     Sven Baumann <baumann.sv@gmail.com>
 * @copyright  2012-2019 The MetaModels team.
 * @license    https://github.com/MetaModels/filter_register/blob/master/LICENSE LGPL-3.0-or-later
 * @filesource
 */

namespace MetaModels\Filter\Setting;

/**
 * Attribute type factory for from-to filter settings.
 */
class RegisterFilterSettingTypeFactory extends AbstractFilterSettingTypeFactory
{
    /**
     * {@inheritDoc}
     */
    public function __construct()
    {
        parent::__construct();

        $this
            ->setTypeName('register')
            ->setTypeIcon('system/modules/metamodelsfilter_register/html/filter_register.png')
            ->setTypeClass(Register::class)
            ->allowAttributeTypes('tabletext', 'translatedtext', 'text');
    }
}