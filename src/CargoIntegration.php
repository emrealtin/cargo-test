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

        return $this->doRequest($this->getServiceUrl(), $requestData, '', $this->config);
    }
}