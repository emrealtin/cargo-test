<?php

namespace Cargo\Test;

use Cargo\Base\BaseAbstract;

class CargoIntegration extends BaseAbstract implements CargoInterface
{
    /**
     * @var string
     */
    public $customerCode;
    /**
     * @var string
     */
    public $typeCode;
    /**
     * @var string
     */
    public $statusCode;

    public function setCustomerCode($customerCode): string
    {
        $this->customerCode = $customerCode;
    }

    public function getCustomerCode(): string
    {
        return $this->customerCode;
    }

    public function setTypeCode($typeCode): string
    {
        $this->typeCode = $typeCode;
    }

    public function getTypeCode(): string
    {
        return $this->typeCode;
    }

    public function setStatusCode($statusCode): string
    {
        $this->statusCode = $statusCode;
    }

    public function getStatusCode(): string
    {
        return $this->statusCode;
    }

    public function createPackage()
    {
        $requestData = [
            'integrationCode' => $this->getIntegrationCode(),
            'customerCode' => $this->getCustomerCode()
        ];

        $requestData = $this->requestXml($requestData);
        $this->setRequest($requestData);

        return $this->doRequest($this->getServiceUrl(), $this->getRequest(), ['Content-Type: text/xml; charset=utf-8'], $this->config);
    }

    public function requestXml($request)
    {
        return '<?xml version="1.0" encoding="UTF-8"?>
              <ns1:integrationCode>'.$request['integrationCode'].'</ns1:integrationCode>
              <ns1:customerCode>'.$request['customerCode'].'</ns1:customerCode>
            </xml>';
    }
}