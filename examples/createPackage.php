<?php

class createPackage
{
    public function __construct(){}

    public function createPackage()
    {
        $integration = new \Cargo\Test\CargoIntegration();
        $integration->setServiceUrl('test.url');
        $integration->setConfig(['username' => 'test', 'password' => 'test']);
        $integration->setIntegrationCode('123456');
        $integration->setCustomerCode('123456');
        $integration->createPackage();
    }
}