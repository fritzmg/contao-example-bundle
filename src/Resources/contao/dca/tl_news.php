<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_news']['fields']['location'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_news']['location'],
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'maxlength' => 255],
    'sql' => [
        'type' => 'string',
        'length' => 255,
        'default' => '',
    ],
];

PaletteManipulator::create()
    ->addField('location', 'teaser')
    ->applyToPalette('default', 'tl_news')
;
