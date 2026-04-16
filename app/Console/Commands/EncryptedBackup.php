<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class EncryptedBackup extends Command
{
    protected $signature = 'app:backup';
    protected $description = 'Create an encrypted database backup.';

    public function handle()
    {
        $this->info('Starting database backup...');

        $database = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $host = config('database.connections.mysql.host');

        $filename = "backup-" . now()->format('Y-m-d-H-i-s') . ".sql";
        $path = storage_path("app/backups/");
        
        if (!is_dir($path)) mkdir($path, 0700, true);

        $command = "mysqldump --user={$username} --password='{$password}' --host={$host} {$database} > " . $path . $filename;
        
        exec($command);

        if (file_exists($path . $filename)) {
            $data = file_get_contents($path . $filename);
            $encryptedData = Crypt::encrypt($data);
            
            Storage::put("backups/{$filename}.enc", $encryptedData);
            unlink($path . $filename); // Hapus SQL mentah

            $this->info("Backup created and encrypted: backups/{$filename}.enc");
        } else {
            $this->error('Backup failed.');
        }
    }
}
