<?php

namespace App\Service;

use App\Entity\Podcast;
use iTunesPodcastFeed\Channel;
use iTunesPodcastFeed\FeedGenerator;
use iTunesPodcastFeed\Item;

class ApplePodcastFeedBuilder
{
    public function buildPodcastsFeed(Podcast $podcast): string
    {

        $channel = new Channel(
            $podcast->getName(),
            $podcast->getUrl(),
            $podcast->getAuthor(),
            $podcast->getEmail(),
            $podcast->getImage(),
            $podcast->isExplicit(),
            $podcast->getCategories(),
            $podcast->getDescription(),
            $podcast->getLanguage(),
            $podcast->getCopyright(),
            $podcast->getTtl()
        );

        $items = [];
        foreach ($podcast->getEpisodes() as $episode) {
            $items[] = new Item(
                $episode->getName(),
                $episode->getFileUrl(),
                $episode->getDuration(),
                $episode->getName(),
                $episode->getDate()->getTimestamp(),
                $episode->getSize(),
                $episode->getMimeType()
            );
        }

        return (new FeedGenerator($channel, ...$items))->getXml();
    }
}