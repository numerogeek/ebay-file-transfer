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
 * Indicates whether the error is a severe error (causing the request to fail)
 * or an informational error (a warning) that should be communicated to the
 * user.
 **/
class ErrorSeverity extends EbatNsFileTransfer_EnumType
{
    const TAG = 'ErrorSeverity';
    const NAME = 'ErrorSeverity';
    const XMLNS = 'http://www.ebay.com/marketplace/services';

    /**
     * The request that triggered the error was not processed successfully.
     * When a serious application-level error occurs, the error is returned
     * instead of the business data.
     **/
    const CodeType_Error = 'Error';

    /**
     * The request was processed successfully, but something occurred that may
     * affect your application or the user. For example, eBay may have changed a
     * value the user sent in. In this case, eBay returns a normal, successful
     * response and also returns the warning.
     **/
    const CodeType_Warning = 'Warning';
    
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
     * @return ErrorSeverity|null|mixed Depending on the assigned data converter: mixed
     */
    public function getTypeValue()
    {
        return $this->_dc($this->_value);
    }

    /**
     * @param ErrorSeverity|null $value
     * @return void
     */
    public function setTypeValue($value)
    {
        $this->_value = $value === null ? null : constant('self::CodeType_' . $value);
    }

    /**
     * @return bool
     */
    public function isError()
    {
        return $this->_value === self::CodeType_Error;
    }

    /**
     * @return bool
     */
    public function isWarning()
    {
        return $this->_value === self::CodeType_Warning;
    }
    
    /**
     * Register child elements and attributes
     */
    public static function _register()
    {
        self::assignElements([], parent::NAME);
        self::assignAttributes([]);
    }

}

ErrorSeverity::_register();
