<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Encoders\WebpEncoder;
use App\Models\Berita;
use App\Models\StrukturOrganisasi;
use App\Models\Hero;

class CompressOldImages extends Command
{
    protected $signature = 'images:compress-old';
    protected $description = 'Kompres dan konversi foto lama ke WebP';

    public function handle()
    {
        $this->processModel(Berita::whereNotNull('gambar')->get(), 'gambar', 1200, 75);
        $this->processModel(StrukturOrganisasi::whereNotNull('foto')->get(), 'foto', 800, 80);
        $this->processHero();

        $this->info('Selesai!');
    }

    private function processModel($records, string $field, int $width, int $quality)
    {
        foreach ($records as $record) {
            $oldPath = $record->$field;

            // Skip yang sudah WebP
            if (str_ends_with($oldPath, '.webp')) {
                $this->line("Skip (sudah WebP): {$oldPath}");
                continue;
            }

            if (!Storage::disk('public')->exists($oldPath)) {
                $this->warn("File tidak ditemukan: {$oldPath}");
                continue;
            }

            try {
                $newPath = pathinfo($oldPath, PATHINFO_DIRNAME) . '/'
                         . pathinfo($oldPath, PATHINFO_FILENAME) . '.webp';

                $fileContent = Storage::disk('public')->get($oldPath);
                $img = Image::decode($fileContent);
                $img->scaleDown(width: $width);

                Storage::disk('public')->put($newPath, $img->encode(new WebpEncoder(quality: $quality))->toString());
                Storage::disk('public')->delete($oldPath);

                $record->$field = $newPath;
                $record->save();

                $this->info("Converted: {$oldPath} → {$newPath}");
            } catch (\Exception $e) {
                $this->error("Gagal: {$oldPath} — {$e->getMessage()}");
            }
        }
    }

    private function processHero()
    {
        $hero = Hero::whereNotNull('gambar')->first();
        if ($hero) {
            $this->processModel(collect([$hero]), 'gambar', 1920, 80);
        }
    }
}