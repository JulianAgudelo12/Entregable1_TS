<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Services\DeepseekService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RecommendationController extends Controller
{
    protected DeepseekService $deepseek;

    public function __construct(DeepseekService $deepseek)
    {
        $this->deepseek = $deepseek;
    }

    public function show()
    {
        return view('recommendation');
    }

    public function store(Request $request)
    {
        $question = $request->validate([
            'question' => 'required|string',
        ])['question'];

        $computers = Computer::all(['id', 'name', 'description']);

        $list = $computers->map(function ($pc) {
            return "{$pc->id}. {$pc->name}: {$pc->description}";
        })->implode("\n");

        $system = "Tienes esta lista de PCs numeradas con ID y descripción:\n{$list}";
        $user = "Según esto y la pregunta “{$question}”, dame solo el número de ID de la PC que mejor responde.";

        Log::info('Deepseek system prompt', ['system' => $system]);
        Log::info('Deepseek user prompt', ['user' => $user]);

        $resp = $this->deepseek->evaluate($system, $user);
        $content = $resp['choices'][0]['message']['content'] ?? '';

        if (! preg_match('/\b(\d+)\b/', $content, $m)) {
            return redirect()
                ->route('recommend.show')
                ->withErrors(['question' => 'No pude entender el ID devuelto: '.trim($content)]);
        }

        $id = (int) $m[1];
        $pc = $computers->firstWhere('id', $id);

        if (! $pc) {
            return redirect()
                ->route('recommend.show')
                ->withErrors(['question' => "ID inválido: {$id}"]);
        }

        return redirect()->route('computer.show', $pc);
    }
}
