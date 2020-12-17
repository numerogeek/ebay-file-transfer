<?php

namespace InTradeSys\eBay\fileTransfer;


class EbatNsFileTransfer_Client extends EbatNsFileTransfer_AbstractClient
{
    /**
     * @var string $method
     * @var BaseServiceRequest|BaseServiceRequest[] $request
     * @return EbatNsFileTransfer_ResponseError|BaseServiceResponse|array
     */
    public function call($method, $request)
    {
        $responses = [];

        foreach ($this->callEach($method, $request) as $response) {
            $files = $response->getFiles();
            $content = $response->getObject();
            if ($content === null && $files && $files[0]->isXml()) {
                $content = $files[0]->getContent();
            }

            $responses[] = $content;
        }

        return is_array($request) ? $responses : $responses[0];
    }

    /**
     * @param string $method
     * @param BaseServiceRequest $request
     * @return EbatNsFileTransfer_Curler
     */
    protected function prepareCall($method, $request)
    {
        $this->reportApiCall($method);

        $session = $this->getSession();
        $credentialHeaders = $session->getSoapCredentialHeaders();

        return $this->curlRequestType($request, $method)
            ->withSoaMethod($method)
            ->withSoaServiceName('FileTransferService')
            ->withHeaders($credentialHeaders)
            ->request();
    }
}
