<?php

namespace InTradeSys\eBay\fileTransfer;


class EbatNsFileTransfer_ResponseError extends EbatNsFileTransfer_Response
{
    /**
    * @param string|null $msg
    * @param string|int|null $msg
    */
    public function __construct($msg = null, $code = null)
    {
        if ($msg !== null) {
            $this->raiseError($msg, $code);
        }
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

EbatNsFileTransfer_ResponseError::_register();
