<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class myCommand extends Command
{
    protected $signature = 'serve:local';
    protected $description = 'Serve the application on the local network';

    public function handle()
    {
        $ip = $this->getLocalIpforWindow();
        $this->call('serve', ['--host' => $ip]);
    }

    private function getLocalIpforWindow()
    {
        $ipInfo = shell_exec("ipconfig");
        preg_match('/Wireless LAN adapter Wi-Fi.*?IPv4 Address[\. ]*: ([\d\.]+)/s', $ipInfo, $matches);
        return $matches[1];         
    }
}
