<?php

namespace InTradeSys\eBay\fileTransfer;


class EbatNsFileTransfer_LoggerWire extends EbatNsFileTransfer_Logger
{
    protected $Request = '';
    protected $Response = '';
    protected $RequestUrl = '';

    public function __construct()
    {
        parent::__construct(false, '', false, true);
    }

    public function log($msg, $subject = null)
    {
        if ($subject == 'RequestUrl') {
            $this->RequestUrl = $msg;
        } elseif ($subject == 'Request') {
            $this->Request = $msg;
        } elseif ($subject == 'Response' || $subject == 'ResponseRaw') {
            $this->Response = $msg;
        }
    }

    public function getFullWireLog($beautifyRequest = true, $beautifyResponse = true)
    {
        if ($beautifyRequest) {
            $this->Request = EbatNsFileTransfer_Logger::beautfyXml($this->Request);
        }

        if ($beautifyResponse) {
            $this->Response = EbatNsFileTransfer_Logger::beautfyXml($this->Response);
        }

        return // $this->RequestUrl . ($this->debugHtml ? "<br>" : "\n") .
            ($this->debugHtml ? htmlentities($this->Request) :  $this->Request) .
            ($this->debugHtml ? '<br>' : "\n") .
            ($this->debugHtml ? htmlentities($this->Response) : $this->Response);
    }
}
