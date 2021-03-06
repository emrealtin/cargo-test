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
    /**
     * @var string
     */
    public $invoiceKey;
    /**
     * @var string
     */
    public $orgReceiverCustId;

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
            'customerCode' => $this->getCustomerCode(),
            'receiverName' => $this->getReceiverName(),
            'receiverAddress' => $this->getReceiverAddress(),
            'receiverCity' => $this->getReceiverCity(),
            'receiverTown' => $this->getReceiverTown(),
            'receiverPhone' => $this->getReceiverPhone()
        ];

        $requestData = $this->createPackageRequestXml($requestData);
        $this->setRequest($requestData);

        $response = $this->doRequest($this->getServiceUrl(), $this->getRequest(), ['Content-Type: text/xml; charset=utf-8'], $this->config);

        $this->setCreatePackageResponse($response);

        return $this->getCreatePackageResponse();
    }

    public function cancelPackage()
    {
        parent::cancelPackage(); // TODO: Change the autogenerated stub
    }

    public function cargoTracking()
    {
        $requestData = [
            'integrationCode' => $this->getIntegrationCode(),
            'customerCode' => $this->getCustomerCode()
        ];

        $requestData = $this->getStatusRequestXml($requestData);
        $this->setRequest($requestData);

        $response = $this->doRequest($this->getServiceUrl(), $this->getRequest(), ['Content-Type: text/xml; charset=utf-8'], $this->config);

        $this->setCargoTrackingResponse($response);

        return $response;
    }

    public function getStatusRequestXml($request): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?>
              <ns1:integrationCode>' . $request['integrationCode'] . '</ns1:integrationCode>
              <ns1:customerCode>' . $request['customerCode'] . '</ns1:customerCode>
            </xml>';
    }

    public function createPackageRequestXml($request): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?>
              <ns1:integrationCode>' . $request['integrationCode'] . '</ns1:integrationCode>
              <ns1:customerCode>' . $request['customerCode'] . '</ns1:customerCode>
              <ns1:receiverName>' . $request['customerCode'] . '</ns1:receiverName>
              <ns1:receiverAddress>' . $request['customerCode'] . '</ns1:receiverAddress>
              <ns1:receiverCity>' . $request['customerCode'] . '</ns1:receiverCity>
              <ns1:receiverTown>' . $request['customerCode'] . '</ns1:receiverTown>
              <ns1:receiverPhone>' . $request['customerCode'] . '</ns1:receiverPhone>
            </xml>';
    }

    public function setInvoiceKey($invoiceKey): string
    {
        $this->invoiceKey = $invoiceKey;
    }

    public function getInvoiceKey(): string
    {
        return $this->invoiceKey;
    }

    public function setOrgReceiverCustId($orgReceiverCustId): string
    {
        $this->orgReceiverCustId = $orgReceiverCustId;
    }

    public function getOrgReceiverCustId(): string
    {
        return $this->orgReceiverCustId;
    }

    public function setCreatePackageResponse($response)
    {
        $this->createPackageResponse = simplexml_load_string($response);
        $this->setResultCode($response->Body->SetOrderResponse->SetOrderResult->OrderResultInfo->resultCode);
        $this->setResultMessage($response->Body->SetOrderResponse->SetOrderResult->OrderResultInfo->resultMessage);
        $this->setInvoiceKey($response->Body->SetOrderResponse->SetOrderResult->OrderResultInfo->InvoiceKey);
        $this->setOrgReceiverCustId($response->Body->SetOrderResponse->SetOrderResult->OrderResultInfo->OrgReceiverCustId);
    }
}