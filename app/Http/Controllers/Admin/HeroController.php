<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Encoders\WebpEncoder;

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

            $img = Image::decode($image);
            $img->scale(width: 1920);

            Storage::disk('public')->put($path, $img->encode(new WebpEncoder(quality: 80))->toString());
            $data['gambar'] = $path;
        }

        $hero->fill($data);
        $hero->save();

        return back()->with('success', 'Banner Hero berhasil diperbarui.');
    }
}