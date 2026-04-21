<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AspirasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Aspirasi::latest();
        if ($request->status) {
            $query->where('status', $request->status);
        }
        $aspirasi = $query->paginate(15);
        return view('admin.aspirasi.index', compact('aspirasi'));
    }

    public function export()
    {
        $aspirasi = Aspirasi::latest()->get();
        $filename = "Rekap_Aspirasi_BEM_" . date('d_M_Y') . ".xlsx";
        $filepath = storage_path("app/temp/{$filename}");

        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Rekapitulasi Aspirasi');

        // ── Merge & Judul Utama ───────────────────────────────────────────────
        $sheet->mergeCells('A1:I1');
        $sheet->setCellValue('A1', 'REKAPITULASI ASPIRASI MAHASISWA');
        $sheet->getStyle('A1')->applyFromArray([
            'font'      => ['bold' => true, 'size' => 14, 'name' => 'Times New Roman',
                            'color' => ['rgb' => '1F3864']],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER],
        ]);
        $sheet->getRowDimension(1)->setRowHeight(28);

        $sheet->mergeCells('A2:I2');
        $sheet->setCellValue('A2', 'Badan Eksekutif Mahasiswa – Universitas Sugeng Hartono');
        $sheet->getStyle('A2')->applyFromArray([
            'font'      => ['size' => 11, 'name' => 'Times New Roman', 'italic' => true,
                            'color' => ['rgb' => '1F3864']],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        ]);

        $sheet->mergeCells('A3:I3');
        $sheet->setCellValue('A3', 'Tanggal Ekspor: ' . \Carbon\Carbon::now()->translatedFormat('d F Y, H:i') . ' WIB');
        $sheet->getStyle('A3')->applyFromArray([
            'font'      => ['size' => 10, 'name' => 'Times New Roman',
                            'color' => ['rgb' => '595959']],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        ]);

        $sheet->getRowDimension(4)->setRowHeight(6); // Spacer

        // ── Header Kolom ──────────────────────────────────────────────────────
        $headers = ['No', 'Nama Pengirim', 'Email', 'Kategori', 'Subjek',
                    'Pesan Aspirasi', 'Status', 'Tanggal Masuk', 'Catatan Admin'];

        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue("{$col}5", $header);
            $col++;
        }

        $sheet->getStyle('A5:I5')->applyFromArray([
            'font'      => ['bold' => true, 'size' => 11, 'name' => 'Times New Roman',
                            'color' => ['rgb' => 'FFFFFF']],
            'fill'      => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => ['rgb' => '1F3864']],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'wrapText'   => true],
            'borders'   => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                             'color' => ['rgb' => 'D9D9D9']]],
        ]);
        $sheet->getRowDimension(5)->setRowHeight(22);

        // ── Status: warna badge ───────────────────────────────────────────────
        $statusConfig = [
            'baru'      => ['fill' => 'DBEAFE', 'font' => '1E40AF', 'label' => 'Baru'],
            'dibaca'    => ['fill' => 'FEF3C7', 'font' => '92400E', 'label' => 'Dibaca'],
            'diproses'  => ['fill' => 'EDE9FE', 'font' => '5B21B6', 'label' => 'Diproses'],
            'selesai'   => ['fill' => 'DCFCE7', 'font' => '166534', 'label' => 'Selesai'],
        ];

        // ── Data Rows ─────────────────────────────────────────────────────────
        foreach ($aspirasi as $index => $item) {
            $row = $index + 6;
            $isEven = ($index % 2 === 0);
            $rowBg  = $isEven ? 'F7F9FC' : 'FFFFFF';

            $sheet->setCellValue("A{$row}", $index + 1);
            $sheet->setCellValue("B{$row}", $item->nama ?? 'Anonim');
            $sheet->setCellValue("C{$row}", $item->email);
            $sheet->setCellValue("D{$row}", $item->kategori);
            $sheet->setCellValue("E{$row}", $item->subjek);
            $sheet->setCellValue("F{$row}", $item->pesan);
            $sheet->setCellValue("G{$row}", $statusConfig[$item->status]['label'] ?? ucfirst($item->status));
            $sheet->setCellValue("H{$row}", $item->created_at->format('d/m/Y H:i'));
            $sheet->setCellValue("I{$row}", $item->catatan_admin ?? '-');

            // Base row style
            $sheet->getStyle("A{$row}:I{$row}")->applyFromArray([
                'font'      => ['size' => 10, 'name' => 'Times New Roman'],
                'fill'      => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                'startColor' => ['rgb' => $rowBg]],
                'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'wrapText' => true],
                'borders'   => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                                 'color' => ['rgb' => 'D9D9D9']]],
            ]);

            // Kolom No: center
            $sheet->getStyle("A{$row}")->getAlignment()
                  ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            // Kolom Status: berwarna
            $cfg = $statusConfig[$item->status] ?? null;
            if ($cfg) {
                $sheet->getStyle("G{$row}")->applyFromArray([
                    'font' => ['bold' => true, 'color' => ['rgb' => $cfg['font']]],
                    'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                               'startColor' => ['rgb' => $cfg['fill']]],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                ]);
            }

            // Kolom Tanggal: center
            $sheet->getStyle("H{$row}")->getAlignment()
                  ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $sheet->getRowDimension($row)->setRowHeight(42);
        }

        // ── Footer jumlah total ───────────────────────────────────────────────
        $lastDataRow = 5 + $aspirasi->count();
        $footerRow   = $lastDataRow + 1;
        $sheet->mergeCells("A{$footerRow}:E{$footerRow}");
        $sheet->setCellValue("A{$footerRow}", 'Total Aspirasi Masuk');
        $sheet->setCellValue("F{$footerRow}", "=COUNTA(B6:B{$lastDataRow})");
        $sheet->getStyle("A{$footerRow}:I{$footerRow}")->applyFromArray([
            'font'      => ['bold' => true, 'size' => 10, 'name' => 'Times New Roman',
                            'color' => ['rgb' => '1F3864']],
            'fill'      => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => ['rgb' => 'D6E4F7']],
            'borders'   => ['outline' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                                          'color' => ['rgb' => '1F3864']]],
        ]);

        // ── Lebar Kolom ───────────────────────────────────────────────────────
        $colWidths = ['A' => 5, 'B' => 22, 'C' => 28, 'D' => 16,
                      'E' => 26, 'F' => 46, 'G' => 14, 'H' => 16, 'I' => 30];
        foreach ($colWidths as $col => $width) {
            $sheet->getColumnDimension($col)->setWidth($width);
        }

        // ── Freeze pane & Print Setup ─────────────────────────────────────────
        $sheet->freezePane('A6');
        $sheet->getPageSetup()
              ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE)
              ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4)
              ->setFitToPage(true)
              ->setFitToWidth(1)
              ->setFitToHeight(0);
        $sheet->getPageMargins()->setTop(0.75)->setBottom(0.75)->setLeft(0.7)->setRight(0.7);
        $sheet->getHeaderFooter()
              ->setOddHeader('&C&"Times New Roman,Bold"&12Rekapitulasi Aspirasi Mahasiswa – BEM USH')
              ->setOddFooter('&LDicetak: ' . date('d/m/Y H:i') . '&RHalaman &P dari &N');

        // ── Outer border seluruh tabel ────────────────────────────────────────
        $sheet->getStyle("A5:I{$lastDataRow}")->applyFromArray([
            'borders' => ['outline' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                                        'color' => ['rgb' => '1F3864']]],
        ]);

        // ── Simpan & kirim ────────────────────────────────────────────────────
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save($filepath);

        return response()->download($filepath, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }

    public function show(Aspirasi $aspirasi)
    {
        return view('admin.aspirasi.show', compact('aspirasi'));
    }

    public function updateStatus(Request $request, Aspirasi $aspirasi)
    {
        $request->validate([
            'status' => 'required|in:baru,dibaca,diproses,selesai',
            'catatan_admin' => 'nullable|string',
        ]);

        $aspirasi->update([
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin,
        ]);

        return back()->with('success', 'Status aspirasi berhasil diperbarui.');
    }

    public function destroy(Aspirasi $aspirasi)
    {
        Gate::authorize('delete', $aspirasi);
        $aspirasi->delete();

        return redirect()->route('admin.aspirasi.index')->with('success', 'Aspirasi berhasil dihapus.');
    }
}
