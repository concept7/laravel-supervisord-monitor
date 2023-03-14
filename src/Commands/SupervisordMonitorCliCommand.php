<?php

namespace Concept7\SupervisordMonitorCli\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SupervisordMonitorCliCommand extends Command
{
    public $signature = 'supervisord-monitor-cli:restart';

    protected $description = 'Restarts given Supervisor daemon at the LinQhost server';

    public function handle()
    {
        $username = config('supervisord-monitor-cli.basic_auth.username');
        $password = config('supervisord-monitor-cli.basic_auth.password');
        $protocol = config('supervisord-monitor-cli.protocol');
        $host = config('supervisord-monitor-cli.host');
        $path = config('supervisord-monitor-cli.path');
        $daemonNames = config('supervisord-monitor-cli.daemon_names');

        $baseUrl = $protocol.'://'.$host;
        $supervisorUrl = $path;

        /** @var \Illuminate\Http\Client\Response */
        $response = Http::withBasicAuth($username, $password)->post($baseUrl.'/'.$supervisorUrl);

        if ($response->successful()) {
            foreach (explode(',', $daemonNames) as $daemonName) {
                $daemonName = trim($daemonName);

                /** @var \Illuminate\Http\Client\Response */
                $stopResponse = Http::withBasicAuth($username, $password)->retry(3, 100)->post($baseUrl.'/'.$supervisorUrl.'/control/stop/localhost/'.$daemonName);

                if ($stopResponse->successful()) {
                    $this->info('Daemon ['.$daemonName.'] stopped');

                    /** @var \Illuminate\Http\Client\Response */
                    $startResponse = Http::withBasicAuth($username, $password)->retry(3, 100)->post($baseUrl.'/'.$supervisorUrl.'/control/start/localhost/'.$daemonName);

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