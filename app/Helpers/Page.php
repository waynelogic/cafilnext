<?php

namespace App\Helpers;

class Page
{

    public function __construct(
        public string  $siteName = 'ФиЛнекст | Коллекторское Агентство',
        public ?string $title = 'ФиЛнекст | Коллекторское Агентство',
        public ?string $description = null,
        public ?string $keywords = null,
        public ?string $cover = null,
    ){}
    public function __toString() {
        return json_encode([
            'siteName' => $this->siteName,
            'title' => $this->title,
            'description' => $this->description,
            'keywords' => $this->keywords,
            'cover' => $this->cover,
            ]);
    }

    public function title($title): void {
        $this->title = $title;
    }

    public function description($description) {
        $this->description = $description;
    }

    public function keywords($keywords) {
        $this->keywords = $keywords;
    }

    public function cover($cover) {
        $this->cover = $cover;
    }
}
