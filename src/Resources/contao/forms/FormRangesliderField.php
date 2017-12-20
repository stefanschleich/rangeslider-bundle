<?php

    namespace Plusx\RangeSliderBundle;

    class FormRangeSliderField extends \Widget
    {

        /**
         * Submit user input
         *
         * @var boolean
         */
        protected $blnSubmitInput = true;

        /**
         * Add a for attribute
         *
         * @var boolean
         */
        protected $blnForAttribute = true;

        /**
         * Template
         *
         * @var string
         */
        protected $strTemplate = 'form_rangeslider';

        /**
         * The CSS class prefix
         *
         * @var string
         */
        protected $strPrefix = 'widget widget-rangeslider';

        /**
         * Initialize the object
         *
         * @param array $arrAttributes An optional attributes array
         */
        public function __construct($arrAttributes = null)
        {
            parent::__construct($arrAttributes);

            static::addRangeSliderAssets();
        }

        /**
         * Add rangeSlider assets and add init-call to body tag
        */
        public static function addRangeSliderAssets()
        {
            if (TL_MODE !== 'BE')
            {
                $GLOBALS['TL_CSS'][] = 'bundles/rangeslider/css/ion.rangeSlider.css';
                $GLOBALS['TL_CSS'][] = 'bundles/rangeslider/css/ion.rangeSlider.skinHTML5.css';
                $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/rangeslider/js/ion.rangeSlider' . ($GLOBALS['TL_CONFIG']['debugMode'] ? '' : '.min') . '.js';
                $GLOBALS['TL_BODY'][] = '<script>$(document).ready(function() { $("[data-rangeslider]").ionRangeSlider(); });</script>';
            }
        }

        /**
         * Add specific attributes
         *
         * @param string $strKey   The attribute key
         * @param mixed  $varValue The attribute value
         */
        public function __set($strKey, $varValue)
        {
            switch ($strKey)
            {
                case 'mandatory':
                    if ($varValue)
                    {
                        $this->arrAttributes['required'] = 'required';
                    }
                    else
                    {
                        unset($this->arrAttributes['required']);
                    }
                    parent::__set($strKey, $varValue);
                    break;

                default:
                    parent::__set($strKey, $varValue);
                    break;
            }
        }

        /**
         * Return a parameter
         *
         * @param string $strKey The parameter key
         *
         * @return mixed The parameter value
         */
        public function __get($strKey)
        {
            switch ($strKey)
            {
                case 'value':
                    return $this->varValue;
                    break;

                case 'type':
                    return 'text';
                    break;

                default:
                    return parent::__get($strKey);
                    break;
            }
        }

        public function parse($arrAttributes=null)
        {
            if($this->rangeSliderType == 'rsNumeric')
            {
                $this->addAttribute('data-rangeslider', 'true');
                $this->addAttribute('data-min', $this->rangeSliderNumericMin);
                $this->addAttribute('data-max', $this->rangeSliderNumericMax);
                if($this->rangeSliderNumericStep)
                {
                    $this->addAttribute('data-step', $this->rangeSliderNumericStep);
                }
            }
            elseif($this->rangeSliderType == 'rsText')
            {
                $this->addAttribute('data-rangeslider', 'true');
                $arrValues = \StringUtil::deserialize($this->rangeSliderTextValues);
                $arrValues = implode(',', $arrValues);
                $this->addAttribute('data-values', $arrValues);
            }

            if($this->rangeSliderGrid)
            {
                $this->addAttribute('data-grid', 'true');
            }

            return parent::parse($arrAttributes);
        }

        /**
         * Generate the widget and return it as string
         *
         * @return string The widget markup
         */
        public function generate()
        {

            return sprintf('<input type="%s" name="%s" id="ctrl_%s" class="text%s%s" value="%s"%s%s',
                            $this->type,
                            $this->strName,
                            $this->strId,
                            ($this->hideInput ? ' password' : ''),
                            (($this->strClass != '') ? ' ' . $this->strClass : ''),
                            \StringUtil::specialchars($this->value),
                            $this->getAttributes(),
                            $this->strTagEnding);
        }
    }