<?php

namespace Plusx\RangeSliderBundle\ContaoManager;

use Plusx\RangeSliderBundle\RangeSliderBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;


/**
 * Plugin for the Contao Manager.
 *
 * @author Stefan Schleich <https://github.com/stefanschleich>
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(RangeSliderBundle::class)
                ->setLoadAfter(
                    [
                        'Contao\CoreBundle\ContaoCoreBundle',
                        'Contao\ManagerBundle\ContaoManagerBundle'
                    ]
                ),
        ];

    }

}

