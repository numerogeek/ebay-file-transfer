<?php

namespace InTradeSys\eBay\fileTransfer;


class EbatNsFileTransfer_Session extends EbatNsFileTransfer_AbstractAuthSession
{
    /**
    * @param string|null $configFile
    */
    public function __construct($configFile = null)
    {
        parent::__construct($configFile, [
            'https://storage.ebay.com/FileTransferService',
            'https://storage.sandbox.ebay.com/FileTransferService'
        ]);
    }

    public function getRequestHeaders()
    {
        return parent::getDefaultSoapRequestHeaders();
    }
}
