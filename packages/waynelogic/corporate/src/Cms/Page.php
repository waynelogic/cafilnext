<?php

namespace Waynelogic\Corporate\Cms;

class Page
{
    public function __construct(
        public ?string  $siteName = null,
        public ?string  $title = null,
        public ?string  $description = null,
        public ?string  $keywords = null,
        public ?string $cover = null,
        public ?array $breadcrumbs = null,
        public string $ogType = 'website',
        public array|object|null $data = null,
    ) {
        $this->defaults();
    }

    public static function make(): Page {
        return new Page();
    }
    public function title(string $title): Page {
        $this->title = $title . ' | ' . $this->siteName;
        return $this;
    }

    public function description(string $description): Page {
        $this->description = $description;
        return $this;
    }

    public function keywords(string $keywords): Page {
        $this->keywords = $keywords;
        return $this;
    }

    public function cover(string $cover): Page {
        $this->cover = $cover;
        return $this;
    }
    public function breadcrumbs(array $breadcrumbs): Page {
        $this->breadcrumbs = $breadcrumbs;
        return $this;
    }
    public function ogType(string $ogType): Page {
        $this->ogType = $ogType;
        return $this;
    }

    public function additionalData(array|object $additionalData): Page {
        $this->data = $additionalData;
        return $this;
    }

    private function defaults(): void
    {
        $this->siteName = env('SITE_NAME')??null;
        $this->description = env('SITE_DESCRIPTION')??null;
        $this->title = $this->siteName;
    }
}
