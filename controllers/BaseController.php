<?php

namespace Controllers;

class BaseController {

    protected function loadTranslations(): array {

        $language = $_SESSION['language'] ?? 'fr';

        $file = "languages/$language.php";

        if (file_exists($file)) {
            return require $file;
        }

        return require "languages/fr.php";
    }


    protected function render(string $view, array $data = []): void {

        $translations = $this->loadTranslations();

        extract($data);

        require 'views/layoutView.php';
    }
}