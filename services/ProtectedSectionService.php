<?php

namespace Services;

use Repositories\ProtectedSectionRepository;

class ProtectedSectionService {
    public static function isUnlocked(string $sectionKey): bool {
        if (empty($_SESSION['protected_sections']) || !is_array($_SESSION['protected_sections'])) {
            return false;
        }

        return isset($_SESSION['protected_sections'][$sectionKey]) && $_SESSION['protected_sections'][$sectionKey] === true;
    }

    public static function isDocumentaryUnlocked(array $documentary): bool {
        if (!isset($documentary['protected_section_id'])) {
            return false;
        }
    
        $sectionKey = self::getSectionKeyFromDocumentary($documentary);
    
        return $sectionKey && self::isUnlocked($sectionKey);
    }

    private static function getSectionKeyFromDocumentary(array $documentary): string {
        $repo = new ProtectedSectionRepository();
        $section = $repo -> getProtectedSectionById($documentary['protected_section_id']);

        return $section['section_key'] ?? '';
    }
}