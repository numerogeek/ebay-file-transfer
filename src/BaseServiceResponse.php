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
 * Base response container for all service operations. Contains error information
 * associated with the request.
 **/
class BaseServiceResponse extends EbatNsFileTransfer_ComplexType
{
    const TAG = 'BaseServiceResponse';
    const NAME = 'BaseServiceResponse';
    const XMLNS = 'http://www.ebay.com/marketplace/services';

    /**
     * @var AckValue|null
     */
    protected $ack = null;

    /**
     * @var ErrorMessage|null
     */
    protected $errorMessage = null;

    /**
     * @var string|null
     */
    protected $version = null;

    /**
     * @var string|null
     */
    protected $timestamp = null;


    /**
     * @return AckValue|null|mixed Depending on the assigned data converter: mixed
     */
    public function getAck()
    {
        return $this->_dc($this->ack);
    }

    /**
     * @param AckValue|null $value
     * @return void
     */
    public function setAck($value)
    {
        $this->ack = $this->_enum($value, AckValue::class);
    }

    /**
     * @return ErrorMessage|null|mixed Depending on the assigned data converter: mixed
     */
    public function getErrorMessage()
    {
        return $this->_dc($this->errorMessage, 'errorMessage');
    }

    /**
     * @param ErrorMessage|null $value
     * @return void
     */
    public function setErrorMessage($value)
    {
        $this->errorMessage = $value;
    }

    /**
     * @return string|null|mixed Depending on the assigned data converter: mixed
     */
    public function getVersion()
    {
        return $this->_dc($this->version, 'version');
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setVersion($value)
    {
        $this->version = self::_string($value);
    }

    /**
     * @return string|null|mixed Depending on the assigned data converter: mixed
     */
    public function getTimestamp()
    {
        return $this->_dc($this->timestamp, 'timestamp');
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setTimestamp($value)
    {
        $this->timestamp = self::_string($value);
    }
    
    /**
     * Register child elements and attributes
     */
    public static function _register()
    {
        self::assignElements([
            'ack' => ['type' => 'AckValue', 'enum' => true, 'xmlns' => self::XMLNS],
            'errorMessage' => ['type' => 'ErrorMessage', 'xmlns' => self::XMLNS],
            'version' => [],
            'timestamp' => []
        ], parent::NAME);

        self::assignAttributes([]);
    }

}

BaseServiceResponse::_register();
