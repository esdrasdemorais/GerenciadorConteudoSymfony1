<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfWidgetFormI18nSelectCountry represents a country HTML select tag.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormI18nSelectCountry.class.php 11700 2008-09-21 10:53:44Z fabien $
 */
class sfWidgetFormI18nSelectCountry extends sfWidgetFormSelect
{
  /**
   * Constructor.
   *
   * Available options:
   *
   *  * culture:   The culture to use for internationalized strings (required)
   *  * countries: An array of country codes to use (ISO 3166)
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetFormSelect
   */
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);

    $this->addRequiredOption('culture');
    $this->addOption('countries');

    // populate choices with all countries
    $culture = isset($options['culture']) ? $options['culture'] : 'en';

    $countries = sfCultureInfo::getInstance($culture)->getCountries();

    // restrict countries to a sub-set
    if (isset($options['countries']))
    {
      if ($problems = array_diff($options['countries'], array_keys($countries)))
      {
        throw new InvalidArgumentException(sprintf('The following countries do not exist: %s.', implode(', ', $problems)));
      }

      $countries = array_intersect_key($countries, array_flip($options['countries']));
    }

    asort($countries);

    $this->setOption('choices', $countries);
  }
}
