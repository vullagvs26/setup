<?php
namespace App\Repositories ; 


use App\Models\Section;

class SectionRepository {
    public $section_model ;

    public function __construct(Section $section_model) {
        $this->section_model = $section_model; 
    }
    public function loadSections(){
        return $this->section_model->all();
    }
    public function storeSection($data) {
        return $this->section_model->create($data) ;
    }
    public function showSection($id) {
        return $this->section_model->where("id", $id)->get();
    }
    public function updateSection($id, $data) {
        return $this->section_model->where("id", $id)->update($data);
    }
    public function deleteSection($id) {
        return $this->section_model->where("id", $id)->delete();
    }
}