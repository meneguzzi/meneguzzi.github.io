# meneguzzi.github.io

Staging mirror and deploy target for [meneguzzi.eu](https://www.meneguzzi.eu).

**This repository holds built output only.** The source lives in the private
`meneguzzi/meneguzzi.eu` repository. Do not edit files here by hand — they are
overwritten on every deploy.

## Why it exists

The production host is reached over rsync with an awkward login, so it is
deployed manually. This repository is a fast, scriptable staging target: push a
commit, and the built site is live within a minute at
<https://meneguzzi.github.io/felipe/>. It exists so the Jekyll migration can be
checked in a real browser at a real URL without touching production.

## GitHub's Jekyll is disabled

The `.nojekyll` file at the repository root switches off GitHub Pages' built-in
Jekyll build. Files are served exactly as committed. Jekyll runs locally in the
source repository; only its `_site/` output is published here.

## Path layout

The site is served from the domain root, so paths match production exactly:

| Staging | Production |
|---|---|
| `https://meneguzzi.github.io/felipe/` | `https://www.meneguzzi.eu/felipe/` |

## What is *not* tested here

GitHub Pages is not Apache. It ignores `.htaccess`, so the `.shtml` and `.html`
redirect rules must be verified on the production host. It also does not process
server-side includes.

## Deploying

From the source repository:

```zsh
./deploy-staging.sh felipe/_site
```
