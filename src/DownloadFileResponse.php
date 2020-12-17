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
 * Indicates the success or failure of transferring the report information to the seller's application.
 **/
class DownloadFileResponse extends EbatNsFileTransfer_Response
{
    const TAG = 'DownloadFileResponse';
    const NAME = 'DownloadFileResponse';
    const XMLNS = 'http://www.ebay.com/marketplace/services';

    /**
     * @var FileAttachment|null
     */
    protected $fileAttachment = null;


    /**
     * @return FileAttachment|null|mixed Depending on the assigned data converter: mixed
     */
    public function getFileAttachment()
    {
        return $this->_dc($this->fileAttachment, 'fileAttachment');
    }

    /**
     * @param FileAttachment|null $value
     * @return void
     */
    public function setFileAttachment($value)
    {
        $this->fileAttachment = $value;
    }
    
    /**
     * Register child elements and attributes
     */
    public static function _register()
    {
        self::assignElements(['fileAttachment' => ['type' => 'FileAttachment', 'xmlns' => self::XMLNS]], parent::NAME);
        self::assignAttributes([]);
    }

}

DownloadFileResponse::_register();
