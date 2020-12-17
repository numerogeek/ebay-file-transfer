<?php

namespace InTradeSys\eBay\fileTransfer;


class EbatNsFileTransfer_DataConverter
{
    protected $options = [];

    public function decodeData($data, $type = 'string')
    {
        return $data;
    }

    public function encodeData($data, $type = 'string', $elementName = null)
    {
        return $data;
    }

    public function encryptData($data, $type = null)
    {
        return $data;
    }

    public function decryptData($data, $type = null)
    {
        return $data;
    }
}
