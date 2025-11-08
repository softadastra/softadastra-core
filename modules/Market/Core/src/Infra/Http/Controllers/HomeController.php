<?php

namespace Market\Core\Infra\Http\Controllers;

use App\Controllers\Controller;
use Ivi\Http\HtmlResponse;

final class HomeController extends Controller
{
    public function index(): HtmlResponse
    {
        // titre non-vide
        $title = (string) (cfg('market.title', 'Softadastra Market') ?: 'Softadastra Market');

        // pousse le titre dans le layout
        $this->setPageTitle($title);

        // passe-le aussi à la vue (pour le <h1>)
        return $this->view('market::home', ['title' => $title]);
    }
}
