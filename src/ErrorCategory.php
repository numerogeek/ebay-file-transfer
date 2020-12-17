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
 * There are three categories of error: request errors, application errors,
 * and system errors. Request and application errors are caused primarily by
 * invalid data passed in the request. System errors are caused by
 * application failures and cannot be corrected by changing request values.
 **/
class ErrorCategory extends EbatNsFileTransfer_EnumType
{
    const TAG = 'ErrorCategory';
    const NAME = 'ErrorCategory';
    const XMLNS = 'http://www.ebay.com/marketplace/services';

    /**
     * Indicates that an error has occurred on the eBay system side, such as a
     * database or server outage. An application can retry the request a
     * reasonable number of times (eBay recommends twice). If the error
     * persists, contact Developer Technical Support. Once the problem has been
     * resolved, the request may be resent in its original form.
     **/
    const CodeType_System = 'System';

    /**
     * An error occurred due to a problem with the request, such as missing or
     * invalid fields. The problem must be corrected before the request can be
     * made again. If the problem is due to something in the application (such
     * as a missing required field), the application must be changed. Once the
     * problem in the application or data is resolved, resend the corrected
     * request to eBay.
     **/
    const CodeType_Application = 'Application';

    /**
     * An error occurred due to a problem with the request, such as invalid or
     * missing data. The problem must be corrected before the request can be
     * made again. If the problem is a result of end-user data, the application
     * must alert the end-user to the problem and provide the means for the
     * end-user to correct the data. Once the problem in the data is resolved,
     * resend the request to eBay with the corrected data.
     **/
    const CodeType_Request = 'Request';
    
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
     * @return ErrorCategory|null|mixed Depending on the assigned data converter: mixed
     */
    public function getTypeValue()
    {
        return $this->_dc($this->_value);
    }

    /**
     * @param ErrorCategory|null $value
     * @return void
     */
    public function setTypeValue($value)
    {
        $this->_value = $value === null ? null : constant('self::CodeType_' . $value);
    }

    /**
     * @return bool
     */
    public function isSystem()
    {
        return $this->_value === self::CodeType_System;
    }

    /**
     * @return bool
     */
    public function isApplication()
    {
        return $this->_value === self::CodeType_Application;
    }

    /**
     * @return bool
     */
    public function isRequest()
    {
        return $this->_value === self::CodeType_Request;
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

ErrorCategory::_register();
