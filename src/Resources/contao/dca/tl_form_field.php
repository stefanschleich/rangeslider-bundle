<?php

    /**
     * RangeSlider palettes
     */
    $GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'rangeSliderType';
    $GLOBALS['TL_DCA']['tl_form_field']['palettes']['rangeSlider'] = '{type_legend},type,name,label;{rangeSlider_legend},rangeSliderType;{fconfig_legend},mandatory;{expert_legend:hide},class,value,accesskey,tabindex;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';
    $GLOBALS['TL_DCA']['tl_form_field']['palettes']['rangeSliderrsText'] = '{type_legend},type,name,label;{rangeSlider_legend},rangeSliderType,rangeSliderTextValues,rangeSliderGrid;{fconfig_legend},mandatory;{expert_legend:hide},class,value,accesskey,tabindex;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';
    $GLOBALS['TL_DCA']['tl_form_field']['palettes']['rangeSliderrsNumeric'] = '{type_legend},type,name,label;{rangeSlider_legend},rangeSliderType,rangeSliderNumericMin,rangeSliderNumericMax,rangeSliderNumericStep,rangeSliderGrid;{fconfig_legend},mandatory;{expert_legend:hide},class,value,accesskey,tabindex;{template_legend:hide},customTpl;{invisible_legend:hide},invisible';

    /**
     * RangeSlider type (textual or numeric)
     */
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['rangeSliderType'] = array
    (
        'label'         => &$GLOBALS['TL_LANG']['tl_form_field']['rangeSliderType'],
        'default'       => 'rsText',
        'exclude'       => true,
        'inputType'     => 'radio',
        'options'       => array('rsText', 'rsNumeric'),
        'reference'     => &$GLOBALS['TL_LANG']['tl_form_field'],
        'eval'          => array('submitOnChange'=>true),
        'sql'           => "varchar(32) NOT NULL default ''"
    );
    /**
     * RangeSlider textual
     */
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['rangeSliderTextValues'] = array
    (
        'label'         => &$GLOBALS['TL_LANG']['tl_form_field']['rangeSliderTextValues'],
        'exclude'       => true,
        'inputType'     => 'listWizard',
        'eval'          => array('mandatory'=>true, 'tl_class'=>'clr'),
        'sql'           => "blob NULL"
    );
    /**
     * RangeSlider numeric
     */
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['rangeSliderNumericMin'] = array
    (
        'label'         => &$GLOBALS['TL_LANG']['tl_form_field']['rangeSliderNumericMin'],
        'exclude'       => true,
        'search'        => true,
        'inputType'     => 'text',
        'eval'          => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
        'sql'           => "varchar(255) NOT NULL default ''"
    );
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['rangeSliderNumericMax'] = array
    (
        'label'         => &$GLOBALS['TL_LANG']['tl_form_field']['rangeSliderNumericMax'],
        'exclude'       => true,
        'search'        => true,
        'inputType'     => 'text',
        'eval'          => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
        'sql'           => "varchar(255) NOT NULL default ''"
    );
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['rangeSliderNumericStep'] = array
    (
        'label'         => &$GLOBALS['TL_LANG']['tl_form_field']['rangeSliderNumericStep'],
        'exclude'       => true,
        'search'        => true,
        'inputType'     => 'text',
        'eval'          => array('maxlength'=>255, 'tl_class'=>'w50'),
        'sql'           => "varchar(255) NOT NULL default ''"
    );
    /**
     * RangeSlider grid (data-grid)
     */
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['rangeSliderGrid'] = array
    (
        'label'         => &$GLOBALS['TL_LANG']['tl_form_field']['rangeSliderGrid'],
        'exclude'       => true,
        'inputType'     => 'checkbox',
        'eval'          => array('tl_class'=>'clr w50'),
        'sql'           => "char(1) NOT NULL default ''"
    );