<?php

class createPackage
{
    public function __construct()
    {
    }

    public function createPackage()
    {
        $integration = new \Cargo\Test\CargoIntegration();
        $integration->setServiceUrl('test.url');
        $integration->setConfig(['username' => 'test', 'password' => 'test']);
        $integration->setIntegrationCode('123456');
        $integration->setReceiverName('Test');
        $integration->setReceiverAddress('Test Address');
        $integration->setReceiverCity('Test');
        $integration->setReceiverTown('Test');
        $integration->setReceiverPhone('123456789');
        $integration->setSenderName('Test');
        return $integration->createPackage();
    }
}