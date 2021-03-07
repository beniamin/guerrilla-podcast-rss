<?php

namespace App\Entity;

class Podcast
{
    private const DEFAULT_EMAIL = 'statmajor@guerrillaradio.ro';
    private const DEFAULT_CATEGORIES = ['Culture', 'Music'];
    private const DEFAULT_TTL = 43200;
    private const DEFAULT_LANG = 'ro';

    private string $url;
    private string $name;
    private string $image;
    private string $author;
    private string $description;
    private array $episodes;
    private string $email;
    private array $categories = [];
    private bool $explicit;
    private string $language;
    private string $copyright;
    private int $ttl;

    public function __construct(
        string $name,
        string $url,
        string $image,
        string $author,
        string $description,
        string $email = self::DEFAULT_EMAIL,
        array $categories = self::DEFAULT_CATEGORIES,
        bool $explicit = false,
        string $language = self::DEFAULT_LANG,
        string $copyright = '',
        int $ttl = self::DEFAULT_TTL
    )
    {
        $this->url = $url;
        $this->name = $name;
        $this->image = $image;
        $this->author = $author;
        $this->description = $description;
        $this->email = $email;
        $this->categories = $categories;
        $this->explicit = $explicit;
        $this->language = $language;
        $this->copyright = $copyright;
        $this->ttl = $ttl;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function isExplicit(): bool
    {
        return $this->explicit;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getCopyright(): string
    {
        return $this->copyright;
    }

    public function getTtl(): int
    {
        return $this->ttl;
    }

    public function addEpisode(Episode $episode): self
    {
        $this->episodes[] = $episode;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getEpisodes(): array
    {
        return $this->episodes;
    }
}