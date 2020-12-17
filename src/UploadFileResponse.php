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
 * Indicates the success or failure of transferring the data file to one of eBay's
 * servers.
 **/
class UploadFileResponse extends EbatNsFileTransfer_Response
{
    const TAG = 'UploadFileResponse';
    const NAME = 'UploadFileResponse';
    const XMLNS = 'http://www.ebay.com/marketplace/services';

    
    /**
     * Register child elements and attributes
     */
    public static function _register()
    {
        self::assignElements([], parent::NAME);
        self::assignAttributes([]);
    }

}

UploadFileResponse::_register();
