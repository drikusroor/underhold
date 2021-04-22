# Underhold

> "A leather hallway project." - Drikus Roor, 2021

<br>
<p align="center">
    <a href="https://github.com/drikusroor/underhold/actions/workflows/laravel.yml"><img src="https://github.com/drikusroor/underhold/actions/workflows/laravel.yml/badge.svg" alt="Build Status"></a>
</p>

## Setup

-   WSL2 + Ubuntu 20.04
-   Docker
-   Node 12.14 or higher

Be sure to install Node 12.14 on your Ubuntu VM. A useful tool for this is NVM (Node Version Manager). For installation instructions, see: [NVM Github](https://github.com/nvm-sh/nvm#installing-and-updating)

Then, install Node 12.14:

```sh
nvm i 12.14
```

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
