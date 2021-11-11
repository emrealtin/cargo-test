<?php

namespace Cargo\Test;

interface CargoInterface
{
    public function setCustomerCode($customerCode): string;

    public function getCustomerCode(): string;

    public function setTypeCode($typeCode): string;

    public function getTypeCode(): string;

    public function setStatusCode($statusCode): string;

    public function getStatusCode(): string;

    public function setInvoiceKey($invoiceKey): string;

    public function getInvoiceKey(): string;

    public function setOrgReceiverCustId($orgReceiverCustId): string;

    public function getOrgReceiverCustId(): string;
}