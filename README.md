# newHireProject-Brent
Counties &amp; Cities by State - CastleBranch Mini Project


### To Run:
    
    From project directory (whatever\path\newHireProject-Brent>) run:
    
        > composer install
        > npm install
        > copy .env.example .env
        > php artisan key:generate
        
        --In .env file, set DB_ info (e.g. CONNECTION/DATABASE/USERNAME/PASSWORD) = to your local(empty) db's config
        
        > php artisan migrate
        > php artisan serve
        
        Laravel development server started: *http://127.0.0.1:8000* <- direct web browser to localhost