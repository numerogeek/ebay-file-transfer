<?php

namespace InTradeSys\eBay\fileTransfer;


class EbatNsFileTransfer_DataConverterIso extends EbatNsFileTransfer_DataConverter
{
    public function decodeData($data, $type = 'string')
    {
        switch ($type) {
            case 'string':
                return utf8_decode($data);
            case 'dateTime':
                $dPieces = explode('T', $data);
                $tPieces = explode("\.", $dPieces[1]);
                $data = $dPieces[0] . ' ' . $tPieces[0];
                return $data;
            case 'boolean':
                return $data === 'true';
            default:
                return $data;
        }
    }

    public function encodeData($data, $type = 'string', $elementName = null)
    {
        switch ($type) {
            case 'dateTime':
                $time = strtotime($data);
                $data = date("Y-m-d\\TH:i:s.000\\Z", $time);
                break;

            case 'boolean':
            case 'int':
            case (substr($type, 0, - 8) . 'CodeType'):
                break;

            default:
                if (is_string($data)) {
                    return utf8_encode($data);
                }
                break;
        }

        return $data;
    }
}
