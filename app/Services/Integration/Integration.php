<?php

namespace App\Services\Integration;

abstract class Integration implements IntegrationInterface
{
    public IntegrationAdapterInterface $integrationAdapter;

    public function __construct(IntegrationAdapterInterface $provider)
    {
        $this->setAdapter($provider);
    }

    /**
     * @inheritDoc
     */
    public function setAdapter(IntegrationAdapterInterface $integrationAdapter): void
    {
        $this->integrationAdapter = $integrationAdapter;
    }

    /**
     * @inheritDoc
     */
    public function getAdapter(): IntegrationAdapterInterface
    {
        return $this->integrationAdapter;
    }
}
