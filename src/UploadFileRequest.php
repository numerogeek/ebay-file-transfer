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
 * Transfers a data file to one of eBay's servers. After your
 * application makes this call, it needs to make the Bulk Data Exchange
 * 'StartUploadJob' call so the data can be processed.
 **/
class UploadFileRequest extends BaseServiceRequest
{
    const TAG = 'UploadFileRequest';
    const NAME = 'UploadFileRequest';
    const XMLNS = 'http://www.ebay.com/marketplace/services';
    const REQUEST = 'uploadFile';

    /**
     * @var string|null
     * @required
     */
    protected $taskReferenceId = null;

    /**
     * @var string|null
     * @required
     */
    protected $fileReferenceId = null;

    /**
     * @var string|null
     * @required
     */
    protected $fileFormat = null;

    /**
     * @var FileAttachment|null
     * @required
     */
    protected $fileAttachment = null;


    /**
     * @return string|null|mixed Depending on the assigned data converter: mixed
     */
    public function getTaskReferenceId()
    {
        return $this->_dc($this->taskReferenceId, 'taskReferenceId');
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setTaskReferenceId($value)
    {
        $this->taskReferenceId = self::_string($value);
    }

    /**
     * @return string|null|mixed Depending on the assigned data converter: mixed
     */
    public function getFileReferenceId()
    {
        return $this->_dc($this->fileReferenceId, 'fileReferenceId');
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setFileReferenceId($value)
    {
        $this->fileReferenceId = self::_string($value);
    }

    /**
     * @return string|null|mixed Depending on the assigned data converter: mixed
     */
    public function getFileFormat()
    {
        return $this->_dc($this->fileFormat, 'fileFormat');
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setFileFormat($value)
    {
        $this->fileFormat = self::_string($value);
    }

    /**
     * @return FileAttachment|null|mixed Depending on the assigned data converter: mixed
     */
    public function getFileAttachment()
    {
        return $this->_dc($this->fileAttachment, 'fileAttachment');
    }

    /**
     * @param FileAttachment|null $value
     * @return void
     */
    public function setFileAttachment($value)
    {
        $this->fileAttachment = $value;
    }

    /**
     * @return UploadFileResponse|EbatNsFileTransfer_ResponseError
     * @param EbatNsFileTransfer_Client
     **/
    function call($client)
    {
        return $client->call(self::REQUEST, $this);
    }
    
    /**
     * Register child elements and attributes
     */
    public static function _register()
    {
        self::assignElements([
            'taskReferenceId' => ['required' => true, 'cardinality' => '1..1'],
            'fileReferenceId' => ['required' => true, 'cardinality' => '1..1'],
            'fileFormat' => ['required' => true, 'cardinality' => '1..1'],
            'fileAttachment' => ['required' => true, 'type' => 'FileAttachment', 'xmlns' => self::XMLNS, 'cardinality' => '1..1']
        ], parent::NAME);

        self::assignAttributes([]);
    }

}

UploadFileRequest::_register();
