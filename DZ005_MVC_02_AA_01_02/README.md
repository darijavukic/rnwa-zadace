# Laravel RNWA Application

## Setup

    git clone https://github.com/darijavukic/RNWA.git
    cd RNWA
    composer update && composer install
    npm update && npm install
    cp .env.example .env
    
    // Create a database and change the .env file to match the access information

    php artisan migrate --seed
    php artisan key:generate
    php artisan serve
    npm run dev / npm run watch / npm run prod
    
