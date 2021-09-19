<?php

namespace App\Services\Integration;

class IntegrationManager implements IntegrationManagerInterface
{
    public IntegrationInterface $integration;

    /**
     * @inheritDoc
     */
    public function loadIntegration(IntegrationInterface $integration): IntegrationInterface
    {
        return $this->integration = $integration;
    }
}
