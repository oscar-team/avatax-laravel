<?php

namespace OscarTeam\AvaTax;

use Avalara\AvaTaxClient;
use Avalara\TransactionBuilder;
use BadMethodCallException;

class AvaTax
{
    protected AvaTaxClient $client;

    public function __construct(
        AvaTaxClient $client
    ) {
        $this->client = $client;
    }

    public function newTransaction(string $companyCode, string $type, string $customerCode, ?string $dateTime = null): TransactionBuilder
    {
        return new TransactionBuilder($this->client, $companyCode, $type, $customerCode, $dateTime);
    }

    public function __call(string $method, array $arguments)
    {
        if (method_exists($this->client, $method)) {
            return call_user_func_array([$this->client, $method], $arguments);
        }

        throw new BadMethodCallException("Method {$method} does not exist.");
    }
}
