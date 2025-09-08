<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\Sample;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Framework\Attributes\Test;

class SampleUploadTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_uploads_excel_and_inserts_records()
    {
        // Fake Excel & Storage
        Excel::fake();
        Storage::fake('public');

        $file = UploadedFile::fake()->create('test.xlsx');

        $response = $this->post('/upload', [
            'file' => $file,
        ]);

        $response->assertRedirect('/');

        // ✅ Assert the file was stored correctly
        Storage::disk('public')->assertExists('uploads/' . $file->hashName());

        // ✅ Assert Excel import was called with the same file
        Excel::assertImported('uploads/' . $file->hashName(), 'public');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_rejects_invalid_file_type()
    {
        $file = UploadedFile::fake()->create('badfile.txt', 10);

        $response = $this->post('/upload', [
            'file' => $file,
        ]);

        $response->assertSessionHasErrors(['file']);
    }
}

