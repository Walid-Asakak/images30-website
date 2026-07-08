<?php

namespace Services;

class LanguageService {

    public static function getTranslations(): array {

        $language = $_SESSION['language'] ?? 'fr';

        $file = __DIR__ . '/../languages/' . $language . '.php';


        if (!file_exists($file)) {
            $file = __DIR__ . '/../languages/fr.php';
        }
        
        return require $file;
    }
}