<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\DeployScriptService;
use App\Service\PayloadValidatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class DeployController extends AbstractController
{
    public function __construct(
        private PayloadValidatorService $payloadValidatorService,
        private DeployScriptService $deployScriptService,
    ) {
    }

    public function deploy(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        if ($data === null || !\is_array($data)) {
            return new JsonResponse(['error' => 'Invalid or missing JSON payload'], Response::HTTP_BAD_REQUEST);
        }

        if (!$this->payloadValidatorService->validatePayload($data)) {
            return new JsonResponse(['error' => 'Invalid payload'], Response::HTTP_BAD_REQUEST);
        }

        // to-do: Do deploy logic here based on repo_name from payload, e.g. git pull if commit_hash not already deployed

        $output = $this->deployScriptService->callDeployScript();

        return new JsonResponse(
            [
                'exec_output' => $output,
            ],
        );
    }
}
