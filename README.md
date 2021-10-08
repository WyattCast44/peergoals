# PeerGoals

PeerGoals is a full stack web application I built for the first ever [LaraJam](https://larajam.dev/) Hackathon. It is built using the TALL 🦒 stack (a.k.a TailwindCSS, AlpineJS, Laravel, Livewire)

## Installation

#### Clone the repo

```bash
git clone https://github.com/WyattCast44/peergoals.git
```

#### Install PHP dependencies

```bash
composer install
```

#### Install frontend dependencies

```bash
yarn install
```

Optionally build fresh assets

```bash
yarn prod
```

#### Update `.env`

```text
DB_DATABASE=peergoals
DB_USERNAME=root
DB_PASSWORD=
```

You will also need to set a unique salt for the HashIds package (read more [here](https://hashids.org/))

```text
HASH_IDS_SALT="example-salt"
```

#### Migrate database

```bash
php artisan migrate:fresh
```
    
## Running Tests

To run the test suite, run the following command

```bash
php artisan test --parallel
```

## Acknowledgements

- Icons provided by Feather Icons and Heroicons

## License

See [license.md](/license.md)