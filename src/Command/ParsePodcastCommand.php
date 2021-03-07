<?php

namespace App\Command;

use App\Service\PodcastPageParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ParsePodcastCommand extends Command
{
    protected static $defaultName = 'app:parse-podcast';
    protected static $defaultDescription = 'Add a short description for your command';


    private array $podcastsUrls;
    private PodcastPageParser $parser;

    public function __construct(PodcastPageParser $parser, array $podcastsUrls = [], string $name = NULL)
    {
        parent::__construct($name);
        $this->podcastsUrls = $podcastsUrls;
        $this->parser = $parser;
    }

    protected function configure()
    {
        $this
            ->setDescription(self::$defaultDescription)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Start parsing podcasts pages");
        foreach ($this->podcastsUrls as $podcastUrl) {
            $output->writeln(sprintf("Podcast: %s", $podcastUrl));

            $podcast = $this->parser->parse($podcastUrl);
        }

        return Command::SUCCESS;
    }
}
