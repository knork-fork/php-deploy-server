#!/usr/bin/php -q
<?php
declare(strict_types=1);

if (\PHP_SAPI !== 'cli') {
    echo 'This script has to be run from the command line.\n';
    exit(1);
}

// Form the payload from commit hash and repository name
$deployTokenSecret = getenv('DEPLOY_TOKEN_SECRET');
if (!is_string($deployTokenSecret)) {
    throw new Exception('Invalid DEPLOY_TOKEN_SECRET');
}
$repoName = getenv('REPO_NAME');
if (!is_string($repoName)) {
    throw new Exception('Invalid REPO_NAME');
}
$commitHash = exec('git rev-parse HEAD');

// Sign the payload
$payload = json_encode([
    'repo_name' => $repoName,
    'commit_hash' => $commitHash,
]);
$signature = hash_hmac('sha256', $payload, $deployTokenSecret);
$signedPayload = [
    'payload' => $payload,
    'signature' => $signature,
];
$signedPayloadJson = json_encode($signedPayload);

echo $signedPayloadJson;
