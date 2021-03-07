# guerrilla-podcast-rss

This app parses [Radio Guerrilla](https://www.guerrillaradio.ro/podcast/) podcast pages and expose them as rss feeds to be imported in Apple Podcast app

## How to install
```shell
docker-compos up -d
```

The app is running on `http://127.0.0.1:8081`

## How to add a new podcast
Add a new entry in `services.yaml` file:
```shell
parameters:
  podcastsUrls:
    podcast-name: "<podcast-url>"
```

The new podcast will be available at: `http://<hostname>/rss/feed/<podcast-name>`

## Next steps
* [ ] extract duration, mime/type and size from the mp3 file
* [ ] parse podcasts pages async and save them into DB
* [ ] add admin for podcasts management, instead of loading from config file
* [ ] replace `read2me-online/itunes-podcast-feed-php` with a library that is maintained