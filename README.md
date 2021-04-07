# Underhold

> "A leather hallway project." - Drikus Roor, 2021

<br>
<p align="center">
    <a href="https://github.com/drikusroor/underhold/actions/workflows/laravel.yml"><img src="https://github.com/drikusroor/underhold/actions/workflows/laravel.yml/badge.svg" alt="Build Status"></a>
</p>

## Prequisites

-   WSL2 + Ubuntu 20.04
-   Docker
-   Node 12.14 or higher

## Start developing

Install dependencies

```sh
composer install
npm i
```

Start development server

```sh
./vendor/bin/sail up
```

Compile / watch assets

```sh
# Compile once
npm run dev

# Watch files and compile on change
npm run watch
```
