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
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2012-2019 The MetaModels team.
 * @license    https://github.com/MetaModels/filter_register/blob/master/LICENSE LGPL-3.0-or-later
 * @filesource
 */

namespace MetaModels\FilterRegisterBundle\Test;

use MetaModels\FilterRegisterBundle\FilterSetting\Register as RegisterSetting;
use MetaModels\FilterRegisterBundle\FilterSetting\RegisterFilterSettingTypeFactory;
use PHPUnit\Framework\TestCase;

/**
 * This class tests if the deprecated autoloader works.
 */
class DeprecatedAutoloaderTest extends TestCase
{
    /**
     * Selectes of old classes to the new one.
     *
     * @var array
     */
    private static $classes = [
        // FilterSetting
        'MetaModels\Filter\Setting\Register'                         => RegisterSetting::class,
        'MetaModels\Filter\Setting\RegisterFilterSettingTypeFactory' => RegisterFilterSettingTypeFactory::class,
    ];

    /**
     * Provide the alias class map.
     *
     * @return array
     */
    public function provideAliasClassMap()
    {
        $values = [];

        foreach (static::$classes as $select => $class) {
            $values[] = [
                $select,
                $class,
            ];
        }

        return $values;
    }

    /**
     * Test if the deprecated classes are aliased to the new one.
     *
     * @param string $oldClass Old class name.
     * @param string $newClass New class name.
     *
     * @dataProvider provideAliasClassMap
     */
    public function testDeprecatedClassesAreAliased($oldClass, $newClass)
    {
        $this->assertTrue(class_exists($oldClass), sprintf('Class select "%s" is not found.', $oldClass));

        $oldClassReflection = new \ReflectionClass($oldClass);
        $newClassReflection = new \ReflectionClass($newClass);

        $this->assertSame($newClassReflection->getFileName(), $oldClassReflection->getFileName());
    }
}
