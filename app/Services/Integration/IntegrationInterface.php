<?php

namespace App\Services\Integration;

interface IntegrationInterface
{
    /**
     * @param \App\Services\Integration\IntegrationAdapterInterface $integrationAdapter
     * @return void
     */
    public function setAdapter(IntegrationAdapterInterface $integrationAdapter): void;

    /**
     * @return \App\Services\Integration\IntegrationAdapterInterface
     */
    public function getAdapter(): IntegrationAdapterInterface;

}
