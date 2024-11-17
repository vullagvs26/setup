<?php 

namespace App\Services;

use App\Repositories\SectionRepository ; 

class SectionService { 
    public $section_repository; 

    public function __construct(SectionRepository $section_repository) {
        $this->section_repository = $section_repository;
    }

    public function loadSections() {
        return $this->section_repository->loadSections();
    }
    public function storeSection($data) {
        return $this->section_repository->storeSection($data);
    }
    public function showSection($id) {
        return $this->section_repository->showSection($id);
    }
    public function updateSection($id, $data) {
        return $this->section_repository->updateSection($id, $data);
    }
    public function deletesection($id) {
        return $this->section_repository->deleteSection($id);
    }

}