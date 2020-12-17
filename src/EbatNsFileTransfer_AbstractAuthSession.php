<?php

namespace InTradeSys\eBay\fileTransfer;


abstract class EbatNsFileTransfer_AbstractAuthSession extends EbatNsFileTransfer_AbstractBasicSession
{
    const AUTHTYPE_AUTHNAUTH = EbatNsFileTransfer_Defines::EBAY_AUTHTYPE_AUTHNAUTH;
    const AUTHTYPE_OAUTH = EbatNsFileTransfer_Defines::EBAY_AUTHTYPE_OAUTH;
    const OAUTH_TOKENMODE_ENABLED = EbatNsFileTransfer_Defines::EBAY_OAUTH_TOKENMODE_ENABLED;
    const OAUTH_TOKENMODE_DISABLED = EbatNsFileTransfer_Defines::EBAY_OAUTH_TOKENMODE_DISABLED;

    private $authType = self::AUTHTYPE_AUTHNAUTH;
    private $devId = null;
    private $certId = null;
    private $tokenMode = null;
    protected $keys = [
        'prod' => ['AppId' => null, 'DevId' => null, 'CertID' => null],
        'test' => ['AppId' => null, 'DevId' => null, 'CertID' => null]
    ];

    public function getXmlCredentialHeaders()
    {
        $devId = $this->getDevId();
        $certId = $this->getCertId();
        $requestToken = $this->getRequestToken();
        $tokenModeEnabled = $this->getTokenMode() === self::OAUTH_TOKENMODE_ENABLED;
        $isOAuth = $this->getAuthType() === self::AUTHTYPE_OAUTH;
        $headers = parent::getXmlCredentialHeaders();

        if ($devId) {
            $headers[] = 'X-EBAY-API-DEV-NAME: ' . $devId;
        }

        if ($certId) {
            $headers[] = 'X-EBAY-API-CERT-NAME: ' . $certId;
        }

        if ($tokenModeEnabled && $isOAuth) {
            $headers[] = 'X-EBAY-API-IAF-TOKEN: ' . $requestToken;
        }

        return $headers;
    }

    /**
     * Read accessor of TokenMode.
     *
     * @return self::TOKENMODE_* Value of the TokenMode property
     */
    public function getTokenMode()
    {
        return $this->tokenMode;
    }

    /**
     * Write accessor of TokenMode.
     *
     * @param self::TOKENMODE_* $value The new value for the TokenMode property
     */
    public function setTokenMode($value)
    {
        $this->tokenMode = intval($value);
    }

    /**
     * Read accessor of AuthType.
     *
     * @return self::AUTHTYPE* Value of the AuthType property
     */
    public function getAuthType()
    {
        return $this->authType;
    }

    /**
     * Write accessor of AuthType.
     *
     * @param self::AUTHTYPE* $value The new value for the AuthType property
     */
    public function setAuthType($value)
    {
        $this->authType = $value;
    }

    /**
     * Read accessor of DevId.
     * The value of this property is used as the developer ID in each XML request sent to the eBay API.
     *
     * @return string Value of the DevId property
     */
    public function getDevId()
    {
        return $this->devId ? $this->devId : $this->_keys[$this->getAppMode() ? 'test' : 'prod']['DevId'];
    }

    /**
     * Write accessor of DevId.
     * The value of this property is used as the developer ID in each XML request sent to the eBay API.
     *
     * @param string $value The new value for the DevId property
     */
    public function setDevId($value)
    {
        $this->devId = $value;
    }

    /**
     * Read accessor of CertId.
     * The value of this property is used as the security certificate in each XML request sent to the eBay API.
     *
     * @return string Value of the CertId property
     */
    public function getCertId()
    {
        return $this->certId ? $this->certId : $this->_keys[$this->getAppMode() ? 'test' : 'prod']['CertID'];
    }

    /**
     * Write accessor of CertId.
     * The value of this property is used as the security certificate in each XML request sent to the eBay API.
     *
     * @param string $value The new value for the CertId property
     */
    public function setCertId($value)
    {
        $this->certId = $value;
    }

    /**
     * Read accessor of RequestUser.
     * Specifies the user ID making the API call. This value is sent in the <RequestUserId> element.
     *
     * @return string Value of the RequestUser property
     */
    public function getRequestUser()
    {
        return $this->requestUser;
    }
    /**
     * Write accessor of RequestUser.
     * Specifies the user ID making the API call. This value is sent in the <RequestUserId> element.
     *
     * @param string $value The new value for the RequestUser property
     */
    public function setRequestUser($value)
    {
        $this->requestUser = $value;
    }

    /**
     * Read accessor of RequestPassword.
     * Specifies the password for the user making the API call. This value is sent in the <RequestPassword> element.
     *
     * @return string Value of the RequestPassword property
     */
    public function getRequestPassword()
    {
        return $this->requestPassword;
    }

    /**
     * Write accessor of RequestPassword.
     * Specifies the password for the user making the API call. This value is sent in the <RequestPassword> element.
     *
     * @param string $value The new value for the RequestPassword property
     */
    public function setRequestPassword($value)
    {
        $this->requestPassword = $value;
    }

    /**
    * @deprecated
    * @param string $configFile
    */
    public function InitFromConfig($configFile)
    {
        $cfg = is_array($configFile) ? $configFile : parse_ini_file($configFile);

        if (!$cfg) {
            $this->logMessage('config file not found', 0, E_ERROR);
        }

        parent::InitFromConfig($cfg);

        $this->keys['test'] = [
            'test' => [
                'AppId' => $cfg['app-key-test'],
                'DevId' => $cfg['dev-key-test'],
                'CertID' => $cfg['cert-id-test']
            ],
            'prod' => [
                'AppId' => $cfg['app-key-prod'],
                'DevId' => $cfg['dev-key-prod'],
                'CertID' => $cfg['cert-id-prod']
            ]
        ];

        if (isset($cfg['site-id'])) {
            $this->setSiteId($cfg['site-id']);
        }

        if (isset($cfg['user'])) {
            $this->setRequestUser($cfg['user']);
        }

        if (isset($cfg['password'])) {
            $this->setRequestPassword($cfg['password']);
        }

        if (isset($cfg['token-mode'])) {
            $this->setTokenMode($cfg['token-mode']);
        }
    }
}
