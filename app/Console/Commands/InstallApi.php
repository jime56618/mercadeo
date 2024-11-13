<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs and configures API dependencies';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Aquí puedes incluir el código que deseas ejecutar
        // Por ejemplo, configurar dependencias o ejecutar migraciones específicas
        $this->info('API installation and configuration started...');
        
        // Agrega la lógica necesaria para tu instalación API
        $this->info('API installation and configuration completed successfully!');
    }
}
