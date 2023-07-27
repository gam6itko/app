<?php

declare(strict_types=1);

namespace App\Api\Cli\Command;

use App\Api\Job\Ping as PingJob;
use Spiral\Console\Command;
use Spiral\Queue\QueueManager;


final class PingCommand extends Command
{
    protected const NAME =  'ping';

    public function __invoke(QueueManager $manager): int
    {
        $manager->getConnection('sync')->push(PingJob::class);

        return self::SUCCESS;
    }
}
