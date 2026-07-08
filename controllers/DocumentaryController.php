<?php

namespace Controllers;

use Repositories\DocumentaryRepository;
use Services\ProtectedSectionService;
use Repositories\ProtectedSectionRepository;

class DocumentaryController extends BaseController {

    // Method to display all documentaries
    public function showAllDocumentaries() {
        $documentaryRepository = new DocumentaryRepository();

        $documentaries = $documentaryRepository -> getAllDocumentaries();

        // To stock the documentaries by category
        $documentariesOrderedByCategory = [];

        foreach ($documentaries as $documentary) {

            $category = $documentary['category'];
    
            $documentariesOrderedByCategory[$category][] = $documentary;
        }
        
        $this->render('views/documentaries/documentariesView.php', [
            'documentariesOrderedByCategory' => $documentariesOrderedByCategory
        ]);
    }

    // Method to display the details for each documentary
    public function showDocumentaryDetail() {
        $id = (int) ($_GET['id'] ?? 0);

        if ($id <= 0) {
            header('Location: index.php?page=documentaries');
            exit;
        }

        $documentaryRepository = new DocumentaryRepository();
        $documentary = $documentaryRepository->getDocumentaryById($id);

        if (!$documentary) {
            header('Location: index.php?page=documentaries');
            exit;
        }

        // check if unlocked
        $isUnlocked = ProtectedSectionService::isDocumentaryUnlocked($documentary);

        // get section key for overlay link
        $sectionRepo = new ProtectedSectionRepository();
        $section = $sectionRepo->getProtectedSectionById($documentary['protected_section_id']);
        $sectionKey = $section['section_key'] ?? '';

        $this->render('views/documentaries/detailDocumentaryView.php', [
            'documentary' => $documentary,
            'isUnlocked' => $isUnlocked,
            'sectionKey' => $sectionKey
        ]);
    }
}