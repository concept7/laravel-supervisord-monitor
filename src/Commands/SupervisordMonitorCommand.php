<?php

namespace Concept7\SupervisordMonitor\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SupervisordMonitorCommand extends Command
{
    public $signature = 'supervisord-monitor:restart';

    protected $description = 'Restarts given Supervisor daemon at the LinQhost server';

    public function handle()
    {
        $username = config('supervisord-monitor.basic_auth.username');
        $password = config('supervisord-monitor.basic_auth.password');
        $protocol = config('supervisord-monitor.protocol');
        $host = config('supervisord-monitor.host');
        $path = config('supervisord-monitor.path');
        $daemonNames = config('supervisord-monitor.daemon_names');

        $baseUrl = $protocol.'://'.$host;
        $supervisorUrl = $path;

        $client = Http::baseUrl($baseUrl);
        if ($username && $password) {
            $client = $client->withBasicAuth($username, $password);
        }

        /** @var \Illuminate\Http\Client\Response */
        $response = $client->post($supervisorUrl);

        if ($response->successful()) {
            foreach (explode(',', $daemonNames) as $daemonName) {
                $daemonName = trim($daemonName);

                /** @var \Illuminate\Http\Client\Response */
                $stopResponse = $client->retry(3, 100)->post($supervisorUrl.'/control/stop/localhost/'.$daemonName);

                if ($stopResponse->successful()) {
                    $this->info('Daemon ['.$daemonName.'] stopped');

                    /** @var \Illuminate\Http\Client\Response */
                    $startResponse = $client->retry(3, 100)->post($supervisorUrl.'/control/start/localhost/'.$daemonName);

                    if ($startResponse->successful()) {
                        $this->info('Daemon ['.$daemonName.'] started');

                        return Command::SUCCESS;
                    } else {
                        $this->error('Daemon start failed');

                        return Command::FAILURE;
                    }
                } else {
                    $this->error('Daemon stop failed');

                    return Command::FAILURE;
                }
            }
        }
    }
}
