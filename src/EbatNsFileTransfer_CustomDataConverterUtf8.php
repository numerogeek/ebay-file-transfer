<?php

namespace InTradeSys\eBay\fileTransfer;


/**
 * Utf8 dtaconverter for EbatNs
 *
 * @author michael
 * @copyright Copyright (c) 2008
 */
class EbatNsFileTransfer_CustomDataConverterUtf8 extends EbatNsFileTransfer_DataConverter
{
    /**
     * Decode the api data
     *
     * @param string $data data to decode
     * @param string $type type of the data
     * @return mixed decoded data
     */
    public function decodeData($data, $type = 'string')
    {
        switch ($type) {
            case 'dateTime':
                $dPieces = explode('T', $data);
                $tPieces = explode("\.", $dPieces[1]);
                $data = $dPieces[0] . ' ' . $tPieces[0];
                return $data;

            break;
            case 'boolean':
                if ($data === 'true') {
                    return true;
                } else {
                    return null;
                }

            break;
            default:
                return $data;
        }
    }

    /**
     * Encode the data for the api
     *
     * @param string $data data to encode
     * @param string $type type of the data
     * @param string $elementName name of the element
     * @return string encoded data
     */
    public function encodeData($data, $type = 'string', $elementName = null)
    {
        echo gettype($data) . ", $type, $elementName\n";
        switch ($type) {
            case 'dateTime':
                $time = strtotime($data);
                $data = date("Y-m-d\\TH:i:s.000\\Z", $time);
            break;
        }

        return $data;
    }
}
