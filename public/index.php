<?php
declare(strict_types=1);

use App\Kernel;

if (!file_exists('/application/.host_ssh_keys/id_rsa')) {
    exit('Host SSH keys not found, run scripts/add_host_ssh_keys.sh');
}

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return static fn (array $context) => new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
