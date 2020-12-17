<?php

namespace InTradeSys\eBay\fileTransfer;

/*
 * This class was generated from a WSDL file from November 27, 2020, 4:16 pm.
 * Executed by globalsync.
 * Provided and maintained by:
 *
 *  InTradeSys GmbH
 *  Dillenburger Str. 75
 *  D-51105 Cologne
 *  ---
 *  https://www.intradesys.com
 */

/**
 * Contextual information associated with an error.
 **/
class ErrorParameter extends EbatNsFileTransfer_SimpleType
{
    const TAG = 'ErrorParameter';
    const NAME = 'ErrorParameter';
    const XMLNS = 'http://www.ebay.com/marketplace/services';

    /**
     * @var string|null
     */
    protected $_value = null;


    /**
     * @param string|null $value
     */
    public function __construct($value = null)
    {
        $this->setTypeValue($value);
    }

    /**
     * @return string|null|mixed Depending on the assigned data converter: mixed
     */
    public function getTypeValue()
    {
        return $this->_dc($this->_value, '_value');
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setTypeValue($value)
    {
        $this->_value = self::_string($value);
    }
    
    /**
     * Register child elements and attributes
     */
    public static function _register()
    {
        self::assignElements([], parent::NAME);
        self::assignAttributes(['name' => ['type' => 'string']]);
    }

}

ErrorParameter::_register();
