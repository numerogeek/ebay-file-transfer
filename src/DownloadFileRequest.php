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
 * Downloads a file (typically a report) from eBay.
 * </p>
 * <h3>Using downloadFile with the Bulk Data Exchange API</h3>
 * <p>If you are using Large Merchant Services, the most
 * common uses of this call are to download responses to large-volume
 * requests and to download reports.</p>
 * <p>After you have uploaded a data file that includes requests
 * (such as multiple AddFixedPriceItem requests),
 * you need to use the BDX getStatus call to determine when a response
 * file is ready to download. After the BDX upload processing is complete,
 * you call downloadFile to retrieve the response.
 * 
 * To get a report, you begin by using the Bulk Data Exchange API's
 * startDownloadJob call, and then use startDownloadJob to start the
 * report processing.
 * 
 * The Bulk Data Exchange API assigns a jobId for your report and
 * you need to use the BDX getStatus call to determine when the report is ready to download.
 * After the BDX download processing is complete, your application can call
 * downloadFile to download the report.</p>
 * <h3>Using downloadFile for Custom Item Specifics</h3>
 * <p>You can also use downloadFile to download recommendations
 * for custom Item Specifics. This is a very large data set that
 * can't be retrieved through a more traditional synchronous call.
 * 
 * You do not use the Bulk Data Exchange API at all for this use case.
 * (You also do not use uploadFile.)
 * Instead, you call GetCategorySpecifics in the Trading API to obtain
 * the necessary file and task reference IDs, and then pass them in
 * the downloadFile call to retrieve the recommendations file.
 * See
 * <a
 * href="http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/GetCategorySpecifics.html#downloadFile">GetCategorySpecifics</a>
 * for details.</p>
 **/
class DownloadFileRequest extends BaseServiceRequest
{
    const TAG = 'DownloadFileRequest';
    const NAME = 'DownloadFileRequest';
    const XMLNS = 'http://www.ebay.com/marketplace/services';
    const REQUEST = 'downloadFile';

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
     * @return DownloadFileResponse|EbatNsFileTransfer_ResponseError
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
            'fileReferenceId' => ['required' => true, 'cardinality' => '1..1']
        ], parent::NAME);

        self::assignAttributes([]);
    }

}

DownloadFileRequest::_register();
