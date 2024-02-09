<?php
declare(strict_types=1);

namespace App\Service;

final class DeployScriptService
{
    public function __construct(
        private string $hostUser,
        private string $hostFolder,
    ) {
    }

    public function callDeployScript(): string|false
    {
        // to-do: deploy logic for other repos, based on repo_name from payload

        $command = sprintf(
            'ssh -o StrictHostKeyChecking=no -i /application/.host_ssh_keys/id_rsa %s@host.docker.internal "git -C %s pull"',
            $this->hostUser,
            $this->hostFolder
        );

        exec($command, $output, $return_var);

        if ($return_var !== 0) {
            return false;
        }

        return implode('', $output);
    }
}
