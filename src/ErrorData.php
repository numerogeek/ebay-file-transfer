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
 * Error details.
 **/
class ErrorData extends EbatNsFileTransfer_ComplexType
{
    const TAG = 'ErrorData';
    const NAME = 'ErrorData';
    const XMLNS = 'http://www.ebay.com/marketplace/services';

    /**
     * @var int|null
     */
    protected $errorId = null;

    /**
     * @var string|null
     */
    protected $domain = null;

    /**
     * @var ErrorSeverity|null
     */
    protected $severity = null;

    /**
     * @var ErrorCategory|null
     */
    protected $category = null;

    /**
     * @var string|null
     */
    protected $message = null;

    /**
     * @var string|null
     */
    protected $subdomain = null;

    /**
     * @var string|null
     */
    protected $exceptionId = null;

    /**
     * @var ErrorParameter[]|null
     */
    protected $parameter = [];


    /**
     * @return int|null|mixed Depending on the assigned data converter: mixed
     */
    public function getErrorId()
    {
        return $this->_dc($this->errorId, 'errorId');
    }

    /**
     * @param int|null $value
     * @return void
     */
    public function setErrorId($value)
    {
        $this->errorId = self::_int($value);
    }

    /**
     * @return string|null|mixed Depending on the assigned data converter: mixed
     */
    public function getDomain()
    {
        return $this->_dc($this->domain, 'domain');
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setDomain($value)
    {
        $this->domain = self::_string($value);
    }

    /**
     * @return ErrorSeverity|null|mixed Depending on the assigned data converter: mixed
     */
    public function getSeverity()
    {
        return $this->_dc($this->severity);
    }

    /**
     * @param ErrorSeverity|null $value
     * @return void
     */
    public function setSeverity($value)
    {
        $this->severity = $this->_enum($value, ErrorSeverity::class);
    }

    /**
     * @return ErrorCategory|null|mixed Depending on the assigned data converter: mixed
     */
    public function getCategory()
    {
        return $this->_dc($this->category);
    }

    /**
     * @param ErrorCategory|null $value
     * @return void
     */
    public function setCategory($value)
    {
        $this->category = $this->_enum($value, ErrorCategory::class);
    }

    /**
     * @return string|null|mixed Depending on the assigned data converter: mixed
     */
    public function getMessage()
    {
        return $this->_dc($this->message, 'message');
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setMessage($value)
    {
        $this->message = self::_string($value);
    }

    /**
     * @return string|null|mixed Depending on the assigned data converter: mixed
     */
    public function getSubdomain()
    {
        return $this->_dc($this->subdomain, 'subdomain');
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setSubdomain($value)
    {
        $this->subdomain = self::_string($value);
    }

    /**
     * @return string|null|mixed Depending on the assigned data converter: mixed
     */
    public function getExceptionId()
    {
        return $this->_dc($this->exceptionId, 'exceptionId');
    }

    /**
     * @param string|null $value
     * @return void
     */
    public function setExceptionId($value)
    {
        $this->exceptionId = self::_string($value);
    }

    /**
     * @return ErrorParameter[]|ErrorParameter|null|mixed Depending on the assigned data converter: mixed
     * @param int|null $index (optional)
     */
    public function getParameter($index = null)
    {
        return $this->_dc($index === null
            ? $this->parameter
            : (count($this->parameter) > $index
                ? $this->parameter[$index]
                : null), 'parameter');
    }

    /**
     * @param ErrorParameter|null|ErrorParameter[] $value
     * @param int|null $index (optional)
     * @return void
     */
    public function setParameter($value, $index = null)
    {
        if ($index === null) {
            $this->parameter = $value;
        } else {
            $this->parameter[$index] = [];
            
            foreach ($value as $item) {
                $this->addParameter($item);
            }
        }
    }

    /**
     * @param ErrorParameter|null $value
     * @return void
     */
    public function addParameter($value)
    {
        $this->parameter[] = $value;
    }
    
    /**
     * Register child elements and attributes
     */
    public static function _register()
    {
        self::assignElements([
            'errorId' => ['type' => 'int'],
            'domain' => [],
            'severity' => ['type' => 'ErrorSeverity', 'enum' => true, 'xmlns' => self::XMLNS],
            'category' => ['type' => 'ErrorCategory', 'enum' => true, 'xmlns' => self::XMLNS],
            'message' => [],
            'subdomain' => [],
            'exceptionId' => [],
            'parameter' => ['type' => 'ErrorParameter', 'xmlns' => self::XMLNS, 'cardinality' => '0..*']
        ], parent::NAME);

        self::assignAttributes([]);
    }

}

ErrorData::_register();
