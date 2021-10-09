# PeerGoals

PeerGoals is a full stack web application I built for the first ever [LaraJam](https://larajam.dev/) Hackathon. It is built using the TALL 🦒 stack (a.k.a TailwindCSS, AlpineJS, Laravel, Livewire). 

The inspiration for this project came from listening to a couple of podcasts where the hosts ask someone to keep them accountable to some goal, this isn't a new idea by any means but this tool offer a nice UI to help create goals and ask your peers to help keep you accountable for specific goals.

Please keep in mind this application was built in less than 2.5 work days so some portions of the code/ui are janky, incomplete and untested.

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
php artisan migrate:fresh --seed
```

#### Create storage links

```bash
php artisan storage:link
```
    
## Running Tests

To run the test suite, run the following command (keep in mind this application was built in two and a half days so it is not fully tested)

```bash
php artisan test --parallel
```

## Application Demo

Because this is a semi-social application, if you do not seed the database with "peers" you will not get the full "experience". There is a demo command that will:

- wipe the database 
- ask you for your basic profile details to create your account
- seed a bunch of goals for you 
- seed a bunch of peers to help keep you accountable

Once this command has ran you can then login and test everything out 👍

```bash
php artisan demo
```

## Acknowledgements

- Icons provided by Feather Icons and Heroicons

## License

See [license.md](/license.md)