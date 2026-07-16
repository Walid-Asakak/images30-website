<?php

namespace Controllers;

use Repositories\DocumentaryRepository;

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

        $language = $_SESSION['language'] ?? 'fr';

        $documentary = $documentaryRepository->getDocumentaryById($id, $language);

        if (!$documentary) {
            header('Location: index.php?page=documentaries');
            exit;
        }

        $this->render('views/documentaries/detailDocumentaryView.php', [
            'documentary' => $documentary,
        ]);
    }
}