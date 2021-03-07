<?php


namespace App\Service;


use App\Entity\Episode;
use App\Entity\Podcast;
use ID3Parser\ID3Parser;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PodcastPageParser
{
    private HttpClientInterface $client;
    private ID3Parser $id3Engine;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function parse(string $podcastUrl): Podcast
    {
        $response = $this->client->request("GET", $podcastUrl);

        $content = $response->getContent(true);

        $crawler = new Crawler($content);

        $podcast = new Podcast(
            $crawler->filter('header .post-title')->text(),
            $podcastUrl,
            $crawler->filter('meta[property="og:image"]')->attr('content'),
            $crawler->filter('div.single-realizator-container a')->text(),
            $crawler->filter('head > meta[property="og:description"]')->last()->attr('content'),
        );

        $crawler->filter('div.podcast_list .podcast-sharer')->each(function(Crawler $node, $i) use ($podcast) {
            $title = $node->filter('.track_title')->text();
            preg_match('/(\d+\.\d+\.\d+)/', $title, $match);
            $podcast->addEpisode(
                new Episode(
                    $node->filter('audio source')->attr('src'),
                    $title,
                    new \DateTime($match[1])
                )
            );
        });

        return $podcast;
    }

}