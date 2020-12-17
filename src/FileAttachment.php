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
 * The zipped report file that is encoded in Base64 Binary format and included in the
 * request according to the SOAP MTOM standard.
 **/
class FileAttachment extends EbatNsFileTransfer_ComplexType
{
    const TAG = 'FileAttachment';
    const NAME = 'FileAttachment';
    const XMLNS = 'http://www.ebay.com/marketplace/services';

    /**
     * @var int|null
     */
    protected $Size = null;

    /**
     * @var string|null
     */
    protected $Data = null;


    /**
     * @return int|null|mixed Depending on the assigned data converter: mixed
     */
    public function getSize()
    {
        return $this->_dc($this->Size, 'Size');
    }

    /**
     * @param int|null $value
     * @return void
     */
    public function setSize($value)
    {
        $this->Size = self::_int($value);
    }

    /**
     * @return string|null|mixed Depending on the assigned data converter: mixed
     */
    public function getData()
    {
        return $this->_dc($this->Data, 'Data');
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setData($value)
    {
        $this->Data = self::_string($value);
    }
    
    /**
     * Register child elements and attributes
     */
    public static function _register()
    {
        self::assignElements([
            'Size' => ['type' => 'int'],
            'Data' => []
        ], parent::NAME);

        self::assignAttributes([]);
    }

}

FileAttachment::_register();
