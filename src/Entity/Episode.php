<?php
namespace App\Entity;

use DateTime;
use JetBrains\PhpStorm\ArrayShape;

class Episode
{
    private const DEFAULT_DURATION = '30:00';
    private const DEFAULT_SIZE = 828387;
    private const DEFAULT_MIME_TYPE = 'audio/mpeg';

    private string $fileUrl;
    private string $name;
    private DateTime $date;
    private string $duration;
    private int $size;
    private string $mimeType;

    public function __construct(
        string $fileUrl,
        string $name,
        DateTime $date,
        string $duration = self::DEFAULT_DURATION,
        int $size = self::DEFAULT_SIZE,
        string $mimeType = self::DEFAULT_MIME_TYPE
    ) {
        $this->fileUrl = $fileUrl;
        $this->name = $name;
        $this->date = $date;
        $this->duration = $duration;
        $this->size = $size;
        $this->mimeType = $mimeType;
    }

    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    public function getFileUrl(): string
    {
        return $this->fileUrl;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getDuration(): string
    {
        return $this->duration;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}