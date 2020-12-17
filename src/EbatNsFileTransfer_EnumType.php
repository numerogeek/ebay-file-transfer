<?php

namespace InTradeSys\eBay\fileTransfer;


class EbatNsFileTransfer_EnumType extends EbatNsFileTransfer_SimpleType
{
    public function __toString()
    {
        return $this->getTypeValue();
    }
}
