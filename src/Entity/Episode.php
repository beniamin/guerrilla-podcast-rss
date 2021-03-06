<?php
namespace App\Entity;

class Episode
{

    private string $image;
    private string $url;
    private string $name;

    public function __construct(string $image, string $url, string $name)
    {
        $this->image = $image;
        $this->url = $url;
        $this->name = $name;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getName(): string
    {
        return $this->name;
    }
}