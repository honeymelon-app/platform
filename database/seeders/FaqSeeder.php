<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Is Honeymelon free?',
                'answer' => 'Yes. Honeymelon is free and open source, with all features available at no cost.',
                'order' => 1,
            ],
            [
                'question' => 'What are the system requirements?',
                'answer' => 'Honeymelon requires macOS 13 (Ventura) or later and an Apple Silicon chip (M1 or newer). Intel-based Macs are not supported.',
                'order' => 2,
            ],
            [
                'question' => 'Does Honeymelon work offline?',
                'answer' => 'Yes. Honeymelon works fully offline with no activation or license checks.',
                'order' => 3,
            ],
            [
                'question' => 'What file formats are supported?',
                'answer' => 'Honeymelon supports MP4, MOV, MKV, WebM, and GIF for video; M4A, MP3, FLAC, WAV, and Opus for audio; and PNG, JPEG, and WebP for images. Powered by FFmpeg.',
                'order' => 4,
            ],
            [
                'question' => 'Do you collect my files or data?',
                'answer' => 'No. All conversions happen locally on your Mac. Your files never leave your device, and we collect zero telemetry or usage data.',
                'order' => 5,
            ],
            [
                'question' => 'How can I contribute?',
                'answer' => 'You can report issues, request features, or contribute code through the Honeymelon GitHub repository.',
                'order' => 6,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
