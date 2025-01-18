<?php

namespace App\Livewire\Pages\Prompt;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\HuggingFaceService;
use Illuminate\Support\Facades\Log;

use Livewire\Attributes\Layout;
use Smalot\PdfParser\Parser;

#[Layout('layouts.guest')]

class Chat extends Component
{
    use WithFileUploads;

    public $file;
    public $output;
    public $error;

    protected $rules = [
        'file' => 'required|mimes:pdf|max:2048', // Validation for PDF files, max 2MB
    ];

    public function processFile(HuggingFaceService $huggingFaceService)
    {
        $this->validate();

        try {
            // Store the uploaded file temporarily
            $filePath = $this->file->store('uploads');

            // Parse the PDF content
            $parser = new Parser();
            $pdf = $parser->parseFile(storage_path('app/' . $filePath));
            $text = $pdf->getText();

            if (empty(trim($text))) {
                $this->error = 'The PDF file contains no readable text.';
                return;
            }

            // Use HuggingFaceService to process the text
            $model = 'your-model-name'; // Replace with the desired Hugging Face model name
            $this->output = $huggingFaceService->getModelOutput($model, $text);

            // Clean up
            unlink(storage_path('app/' . $filePath));
        } catch (\Exception $e) {
            Log::error('Error processing document: ' . $e->getMessage());
            $this->error = 'Failed to process the document. Please try again.';
        }
    }

    public function render()
    {
        return view('livewire.pages.prompt.chat', [
            'output' => $this->output,
            'error' => $this->error,
        ]);
    }
}
