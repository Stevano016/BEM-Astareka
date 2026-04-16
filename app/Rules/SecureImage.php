<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;

class SecureImage implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$value instanceof UploadedFile) {
            return;
        }

        // 1. Check Magic Bytes
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $value->getPathname());
        finfo_close($finfo);

        $allowedMimes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
        if (!in_array($mime, $allowedMimes)) {
            $fail('File yang diunggah terdeteksi bukan merupakan gambar yang valid.');
            return;
        }

        // 2. Scan for PHP Patterns (Anti-XSS/Malware in file)
        $content = file_get_contents($value->getPathname());
        if (preg_match('/<\?php/i', $content) || preg_match('/<script/i', $content)) {
            $fail('File terdeteksi mengandung kode berbahaya (malware).');
        }
    }
}
