<?php

namespace App\Http\Controllers;

use App\Models\Question; // Assurez-vous que le namespace est correct
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('chatbot');
    }

    public function process(Request $request)
    {
        try {
            $question = $request->input('question');

            // Cherche une correspondance exacte dans la base de données
            $answer = $this->findExactMatch($question);

            if (!$answer) {
                // Si pas de correspondance exacte, cherche une correspondance partielle
                $answer = $this->findPartialMatch($question);
            }

            if ($answer) {
                return response()->json(['answer' => $answer]);
            } else {
                // Si aucune correspondance, réponse par défaut
                return response()->json(['answer' => "Je n'ai pas la réponse exacte pour cette question. Veuillez reformuler ou consulter la documentation de Laravel."]);
            }
        } catch (\Exception $e) {
            // En cas d'erreur, envoyer une réponse JSON
            \Log::error("Chatbot Error: " . $e->getMessage());
            return response()->json(['answer' => 'Une erreur est survenue. Veuillez réessayer.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Recherche une correspondance exacte dans la base de données.
     *
     * @param string $question La question posée
     * @return string|null La réponse si trouvée, sinon null
     */
    private function findExactMatch($question)
    {
        try {
            $match = Question::where('question', $question)->first();
            return $match ? $match->answer : null;
        } catch (\Exception $e) {
            \Log::error("Error in findExactMatch: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Recherche une correspondance partielle en utilisant la similarité de texte.
     *
     * @param string $question La question posée
     * @return string|null La réponse si une correspondance partielle est trouvée, sinon null
     */
    private function findPartialMatch($question)
    {
        try {
            // Nettoyage de la question pour une meilleure comparaison
            $cleanQuestion = Str::lower(Str::replaceArray(' ', [''], Str::words($question, 3, '')));

            // Recherche d'une question similaire dans la base de données
            $match = Question::select('answer')
                ->whereRaw("LOWER(REPLACE(REPLACE(question, ' ', ''), '.', '')) LIKE ?", ['%' . $cleanQuestion . '%'])
                ->orderByRaw('LENGTH(question) - LENGTH(REPLACE(question, ?, \'\')) DESC', [$cleanQuestion])
                ->first();

            return $match ? $match->answer : null;
        } catch (\Exception $e) {
            \Log::error("Error in findPartialMatch: " . $e->getMessage());
            return null;
        }
    }
}
