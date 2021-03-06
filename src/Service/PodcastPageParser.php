<?php


namespace App\Service;


use App\Entity\Episode;
use App\Entity\Podcast;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PodcastPageParser
{

    private const EPISODE_PATTERN = '/podcast-img">.+?<img.+?src="(\S+?(?>jpg|png))".+?<audio.+?src="(.+?)"><\/audio>.+?track_title"\>(.+?)\<\/div/sm';
    private const TITLE_PATTER = '/title\>(.+?)<\/title/';


    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {

        $this->client = $client;
    }

    public function parse(string $podcastUrl): Podcast
    {
        $response = $this->client->request("GET", $podcastUrl);

        $content = $response->getContent(true);

        $title = "";
        preg_match(self::TITLE_PATTER, $content, $titleMatch);

        $podcast = new Podcast($titleMatch[1] ?? "", $podcastUrl);

        $matches = [];
        preg_match_all(
            self::EPISODE_PATTERN,
            $content,
            $matches,
            PREG_SET_ORDER
        );

        foreach ($matches as $match) {
            $podcast->addEpisodes(
                new Episode($match[1], $match[2], $match[3])
            );
        }

        return $podcast;
    }

}