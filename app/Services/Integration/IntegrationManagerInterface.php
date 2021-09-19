<?php

namespace App\Services\Integration;

interface IntegrationManagerInterface
{
    /**
     * @param \App\Services\Integration\IntegrationInterface $integration
     * @return \App\Services\Integration\IntegrationInterface
     */
    public function loadIntegration(IntegrationInterface $integration): IntegrationInterface;
}
