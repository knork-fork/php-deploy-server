<?php
declare(strict_types=1);

namespace App\Service;

final class PayloadValidatorService
{
    public function __construct(
        private string $deployTokenSecret
    ) {
    }

    /**
     * @param array<mixed> $data
     */
    public function validatePayload($data): bool
    {
        if (!isset($data['payload']) || !\is_string($data['payload']) || $data['payload'] === '') {
            return false;
        }
        if (!isset($data['signature']) || !\is_string($data['signature']) || $data['signature'] === '') {
            return false;
        }

        $payload = $data['payload'];
        $receivedSignature = $data['signature'];

        $generatedSignature = hash_hmac('sha256', $payload, $this->deployTokenSecret);

        return hash_equals($receivedSignature, $generatedSignature);
    }
}
