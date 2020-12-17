<?php

namespace InTradeSys\eBay\fileTransfer;


class EbatNsFileTransfer_Response extends BaseServiceResponse
{
    /**
     * @param bool $onlyErrors
     * @return bool
     */
    public function isGood($onlyErrors = true)
    {
        $ack = $this->getAck();
        $success = AckValue::CodeType_Success;
        $warning = AckValue::CodeType_Warning;
        $goodCodes = $onlyErrors
            ? [$success, $warning]
            : [$success];

        return $ack && in_array($ack->getTypeValue(), $goodCodes);
    }

    /**
    * @return ErrorData[]
    */
    public function listErrors()
    {
        $message = $this->getErrorMessage();
        return $message ? $message->getError() : [];
    }

    /**
     * @param string $msg
     * @param int $errorId
     * @param string $severity
     * @param string $errorCategory
     */
    public function raiseError(
        $msg,
        $errorId = 0,
        $severity = ErrorSeverity::CodeType_Error,
        $errorCategory = ErrorCategory::CodeType_System
    ) {
        $error = new ErrorData();
        $error->setErrorId(intval($errorId));
        $error->setSeverity($severity);
        $error->setMessage(htmlentities($msg));
        $error->setCategory($errorCategory);
        $this->setAck(AckValue::CodeType_Failure);

        $errorMessage = $this->getErrorMessage();
        $errorMessage = $errorMessage ? $errorMessage : new ErrorMessage();
        $errorMessage->addError($error);
        $this->setErrorMessage($errorMessage);
    }

    public static function parseError($xml, $parser)
    {
        $errorTag = 'errorMessage';
        $errorType = 'ErrorMessage';

        $responseError = new EbatNsFileTransfer_ResponseError();
        $errorMessage = $parser->parse($xml, $errorTag, $errorType, false /* disable parsing error on fail */);

        if ($errorMessage) {
            $responseError->setAck(AckValue::CodeType_Failure);
            $responseError->setErrorMessage($errorMessage);
        } else {
            $responseError->raiseError($xml);
        }

        return $responseError;
    }

    /**
     * @param bool $asHtml
     * @return string
     */
    public function stringifyErrors($asHtml = false)
    {
        $message = '';
        foreach ($this->listErrors() as $error) {
            $msg = $error->getMessage();
            $message .= '#' . $error->getErrorId() . ' : ' .
                ($asHtml ? htmlentities($msg) . '<br>' : $msg . "\n");
        }

        return $message;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $errors = $this->stringifyErrors();

        return "Ack: " . $this->getAck() .
            ($errors ? "\nErrors:\n$errors" : '') .
            "\nResponse:\n" . $this->toXml();
    }

    /**
     * Register child elements and attributes
     */
    public static function _register()
    {
        self::assignElements([], parent::NAME);
        self::assignAttributes([]);
    }
}

EbatNsFileTransfer_Response::_register();
