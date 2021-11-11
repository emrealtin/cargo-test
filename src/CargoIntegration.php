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
    public $integrationCode;
    /**
     * @var string
     */
    public $trackingNumber;
    /**
     * @var string
     */
    public $sender;
    /**
     * @var string
     */
    public $trackingUrl;
    /**
     * @var float
     */
    public $price;
    /**
     * @var string
     */
    public $typeCode;
    /**
     * @var string
     */
    public $statusCode;
    /**
     * @var string
     */
    public $reason;

    public function setCustomerCode($customerCode): string
    {
        $this->customerCode = $customerCode;
    }

    public function getCustomerCode(): string
    {
        return $this->customerCode;
    }

    public function setIntegrationCode($integrationCode): string
    {
        $this->integrationCode = $integrationCode;
    }

    public function getIntegrationCode(): string
    {
        return $this->integrationCode;
    }

    public function setTrackingNumber($trackingNumber): string
    {
        $this->trackingNumber = $trackingNumber;
    }

    public function getTrackingNumber(): string
    {
        return $this->trackingNumber;
    }

    public function setSender($sender): string
    {
        $this->sender = $sender;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function setTrackingUrl($trackingUrl): string
    {
        $this->trackingUrl = $trackingUrl;
    }

    public function getTrackingUrl(): string
    {
        return $this->trackingUrl;
    }

    public function setPrice($price): string
    {
        $this->price = $price;
    }

    public function getPrice(): string
    {
       return $this->price;
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

    public function setReason($reason): string
    {
        $this->reason = $reason;
    }

    public function getReason(): string
    {
        return $this->reason;
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