<?php

class getStatus
{
    public function __construct(){}

    public function getStatus()
    {
        $integration = new \Cargo\Test\CargoIntegration();
        $integration->setServiceUrl('test.url');
        $integration->setConfig(['username' => 'test', 'password' => 'test']);
    }

}