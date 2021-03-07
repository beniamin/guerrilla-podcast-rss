# guerrilla-podcast-rss

### How to add a new podcast
Add a new entry in `services.yaml` file:
```shell
parameters:
  podcastsUrls:
    podcast-name: "<podcast-url>"
```

The new podcast will be available at: `http://<hostname>/rss/feed/<podcast-name>`