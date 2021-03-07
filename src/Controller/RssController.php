<?php

namespace App\Controller;

use App\Service\ApplePodcastFeedBuilder;
use App\Service\PodcastPageParser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rss")
 */
class RssController extends AbstractController
{
    /**
     * @var PodcastPageParser
     */
    private PodcastPageParser $parser;
    private array $podcastsUrls;
    /**
     * @var ApplePodcastFeedBuilder
     */
    private ApplePodcastFeedBuilder $feedBuilder;

    public function __construct(PodcastPageParser $parser, ApplePodcastFeedBuilder $feedBuilder, array $podcastsUrls)
    {
        $this->parser = $parser;
        $this->podcastsUrls = $podcastsUrls;
        $this->feedBuilder = $feedBuilder;
    }

    /**
     * @Route("/feed/{show}", name="rss_feed")
     * @param string $show
     *
     * @return Response
     */
    public function feed(string $show): Response
    {
        $podcast = $this->parser->parse($this->podcastsUrls[$show]);


        return new Response(
            $this->feedBuilder->buildPodcastsFeed($podcast),
            200,
            [
                'Content-Type' => 'application/xml; charset=utf-8'
            ]
        );
    }
}
