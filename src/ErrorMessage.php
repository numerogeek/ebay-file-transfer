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
 * ErrorMessage to indicate any Error/Warning that occurred as part of the service
 * call. Runtime errors will not be reported here, but will be reported as SOAP errors.
 **/
class ErrorMessage extends EbatNsFileTransfer_ComplexType
{
    const TAG = 'ErrorMessage';
    const NAME = 'ErrorMessage';
    const XMLNS = 'http://www.ebay.com/marketplace/services';

    /**
     * @var ErrorData[]|null
     */
    protected $error = [];


    /**
     * @return ErrorData[]|ErrorData|null|mixed Depending on the assigned data converter: mixed
     * @param int|null $index (optional)
     */
    public function getError($index = null)
    {
        return $this->_dc($index === null
            ? $this->error
            : (count($this->error) > $index
                ? $this->error[$index]
                : null), 'error');
    }

    /**
     * @param ErrorData|null|ErrorData[] $value
     * @param int|null $index (optional)
     * @return void
     */
    public function setError($value, $index = null)
    {
        if ($index === null) {
            $this->error = $value;
        } else {
            $this->error[$index] = [];
            
            foreach ($value as $item) {
                $this->addError($item);
            }
        }
    }

    /**
     * @param ErrorData|null $value
     * @return void
     */
    public function addError($value)
    {
        $this->error[] = $value;
    }
    
    /**
     * Register child elements and attributes
     */
    public static function _register()
    {
        self::assignElements(['error' => ['type' => 'ErrorData', 'xmlns' => self::XMLNS, 'cardinality' => '0..*']], parent::NAME);
        self::assignAttributes([]);
    }

}

ErrorMessage::_register();
