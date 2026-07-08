<?php

namespace Controllers;

class LanguageController {

    public function changeLanguage() {

        $language = $_GET['lang'] ?? 'fr';

        $availableLanguages = [
            'fr',
            'en',
            'es',
            'zh',
            'it',
        ];

        if (in_array($language, $availableLanguages)) {
            $_SESSION['language'] = $language;
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}