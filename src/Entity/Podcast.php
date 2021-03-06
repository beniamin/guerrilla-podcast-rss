<?php

namespace App\Entity;

class Podcast
{
    /**
     * @var string
     */
    private $url;
    /**
     * @var string
     */
    private $name;

    /** @var Episode[] */
    private array $episodes = [];

    public function __construct(string $name, string $url) {

        $this->url = $url;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function addEpisodes(Episode $episode)
    {
        $this->episodes[] = $episode;
    }
}