<?php
namespace Cargo\Test;

interface CargoInterface
{
    public function setCustomerCode($customerCode) :string;
    public function getCustomerCode() :string;

    public function setIntegrationCode($integrationCode) :string;
    public function getIntegrationCode() :string;

    public function setTrackingNumber($trackingNumber) :string;
    public function getTrackingNumber() :string;

    public function setSender($sender) :string;
    public function getSender() :string;

    public function setTrackingUrl($trackingUrl) :string;
    public function getTrackingUrl() :string;

    public function setPrice($price) :string;
    public function getPrice() :string;

    public function setTypeCode($typeCode) :string;
    public function getTypeCode() :string;

    public function setStatusCode($statusCode) :string;
    public function getStatusCode() :string;

    public function setReason($reason) :string;
    public function getReason() :string;
}