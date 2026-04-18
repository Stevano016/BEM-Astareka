<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    public function index()
    {
        $struktur = StrukturOrganisasi::orderBy('urutan')->paginate(15);
        return view('admin.struktur.index', compact('struktur'));
    }

    public function create()
    {
        return view('admin.struktur.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'nullable|string|max:20',
            'jabatan' => 'required|string|max:100',
            'departemen' => 'nullable|string|max:100',
            'foto' => 'nullable|image|max:2048',
            'quote' => 'nullable|string',
            'urutan' => 'integer',
        ]);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.webp';
            $path = 'struktur/' . $filename;
            $this->compressToWebp($image, $path, 800, 80);
            $data['foto'] = $path;
        }

        StrukturOrganisasi::create($data);
        return redirect()->route('admin.struktur.index')->with('success', 'Anggota struktur berhasil ditambahkan.');
    }

    public function edit(StrukturOrganisasi $struktur)
    {
        return view('admin.struktur.edit', compact('struktur'));
    }

    public function update(Request $request, StrukturOrganisasi $struktur)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'nullable|string|max:20',
            'jabatan' => 'required|string|max:100',
            'departemen' => 'nullable|string|max:100',
            'foto' => 'nullable|image|max:2048',
            'quote' => 'nullable|string',
            'urutan' => 'integer',
        ]);

        if ($request->hasFile('foto')) {
            if ($struktur->foto) {
                Storage::disk('public')->delete($struktur->foto);
            }

            $image = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.webp';
            $path = 'struktur/' . $filename;
            $this->compressToWebp($image, $path, 800, 80);
            $data['foto'] = $path;
        }

        $struktur->update($data);
        return redirect()->route('admin.struktur.index')->with('success', 'Anggota struktur berhasil diperbarui.');
    }

    public function destroy(StrukturOrganisasi $struktur)
    {
        if ($struktur->foto) {
            Storage::disk('public')->delete($struktur->foto);
        }
        $struktur->delete();
        return back()->with('success', 'Anggota struktur berhasil dihapus.');
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

    // Fix orientasi berdasarkan EXIF (khusus JPEG)
    if ($mime === 'image/jpeg' && function_exists('exif_read_data')) {
        $exif = @exif_read_data($source);
        $orientation = $exif['Orientation'] ?? 1;

        $src = match($orientation) {
            3 => imagerotate($src, 180, 0),
            6 => imagerotate($src, -90, 0),
            8 => imagerotate($src, 90, 0),
            default => $src,
        };
    }

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