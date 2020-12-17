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
class AckValue extends EbatNsFileTransfer_EnumType
{
    const TAG = 'AckValue';
    const NAME = 'AckValue';
    const XMLNS = 'http://www.ebay.com/marketplace/services';

    /**
     * The request was processed successfully, but something occurred that may
     * affect your application or the user.
     **/
    const CodeType_Success = 'Success';

    /**
     * The request that triggered the error was not processed successfully.
     * When a serious application-level error occurs, the error is returned
     * instead of the business data.
     **/
    const CodeType_Failure = 'Failure';

    /**
     * The request that triggered the error was processed successfully but with some
     * warnings.
     **/
    const CodeType_Warning = 'Warning';

    /**
     * The request that triggered the error was processed successfully but there is
     * some error in the application or data.
     **/
    const CodeType_PartialFailure = 'PartialFailure';
    
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
     * @return AckValue|null|mixed Depending on the assigned data converter: mixed
     */
    public function getTypeValue()
    {
        return $this->_dc($this->_value);
    }

    /**
     * @param AckValue|null $value
     * @return void
     */
    public function setTypeValue($value)
    {
        $this->_value = $value === null ? null : constant('self::CodeType_' . $value);
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->_value === self::CodeType_Success;
    }

    /**
     * @return bool
     */
    public function isFailure()
    {
        return $this->_value === self::CodeType_Failure;
    }

    /**
     * @return bool
     */
    public function isWarning()
    {
        return $this->_value === self::CodeType_Warning;
    }

    /**
     * @return bool
     */
    public function isPartialFailure()
    {
        return $this->_value === self::CodeType_PartialFailure;
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

AckValue::_register();
