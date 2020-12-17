<?php

namespace InTradeSys\eBay\fileTransfer;


/**
 * This class is the basic interface to the eBay-Webserice for the user.
 * We generated the "proxy" externally as the SOAP-wsdl proxy generator does
 * not really did what we needed.
 */
class EbatNsFileTransfer_ServiceProxy extends EbatNsFileTransfer_Client
{
    /**
     * Setup the ServiceProxy
     *
     * @param mixed $sessionOrConfig Could be either a path to a config-file or a EbatNs_Session-object
     * @param string $converter Name of the converter class used, defaults to 'EbatNs_DataConverterIso' for convertion from uft8 to iso-8859-1
     */
    public function __construct($sessionOrConfig, $converter = 'InTradeSys\eBay\fileTransfer\EbatNsFileTransfer_DataConverterUtf8')
    {
        $session = $sessionOrConfig instanceof EbatNsFileTransfer_Session ? $sessionOrConfig : new EbatNsFileTransfer_Session($sessionOrConfig);
        parent::__construct($session, $converter);
    }

    /**
     * @param $response
     * @param bool $onlyErrors true (default) will ignore warnings, so we detect ONLY real failures ...
     * @return bool
     */
    public function isGood($response, $onlyErrors = true)
    {
        return $response->isGood($onlyErrors);
    }

    /**
     * Checks if the response had failures
     *
     * @param EbatNsFileTransfer_Response $response	A response returned by any of the eBay API calls
     * @return bool
     */
    public function isFailure($response)
    {
        return !!$response->getFailures();
    }

        /**
     * @param UploadFileRequest
     * @return UploadFileResponse|EbatNsFileTransfer_ResponseError|array
     **/
    function uploadFile($request)
    {
        $requestType = is_array($request) ? current($request) : $request;
        return $requestType === false ? [] : $this->call($requestType::REQUEST, $request);
    }

    /**
     * @param DownloadFileRequest
     * @return DownloadFileResponse|EbatNsFileTransfer_ResponseError|array
     **/
    function downloadFile($request)
    {
        $requestType = is_array($request) ? current($request) : $request;
        return $requestType === false ? [] : $this->call($requestType::REQUEST, $request);
    }
}
