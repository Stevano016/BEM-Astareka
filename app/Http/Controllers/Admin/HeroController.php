<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function edit()
    {
        $hero = Hero::first() ?? new Hero();
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tagline' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'judul_aksen' => 'nullable|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'cta_text_1' => 'required|string|max:50',
            'cta_text_2' => 'required|string|max:50',
        ]);

        $hero = Hero::first() ?? new Hero();
        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            if ($hero->gambar) {
                Storage::disk('public')->delete($hero->gambar);
            }

            $image = $request->file('gambar');
            $filename = time() . '.webp';
            $path = 'hero/' . $filename;
            $this->compressToWebp($image, $path, 1920, 80);
            $data['gambar'] = $path;
        }

        $hero->fill($data);
        $hero->save();

        return back()->with('success', 'Banner Hero berhasil diperbarui.');
    }

    private function compressToWebp($file, string $path, int $width, int $quality): void
    {
        $source = $file->getPathname();
        $mime = mime_content_type($source);

        $src = match($mime) {
            'image/jpeg' => imagecreatefromjpeg($source),
            'image/png'  => imagecreatefrompng($source),
            'image/webp' => imagecreatefromwebp($source),
            'image/gif'  => imagecreatefromgif($source),
            default      => throw new \Exception("Format tidak didukung: $mime"),
        };

        $origW = imagesx($src);
        $origH = imagesy($src);

        if ($origW > $width) {
            $height = (int) round($origH * $width / $origW);
            $resized = imagecreatetruecolor($width, $height);
            imagecopyresampled($resized, $src, 0, 0, 0, 0, $width, $height, $origW, $origH);
            imagedestroy($src);
            $src = $resized;
        }

        ob_start();
        imagewebp($src, null, $quality);
        $webpData = ob_get_clean();
        imagedestroy($src);

        Storage::disk('public')->put($path, $webpData);
    }
}