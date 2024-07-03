### test app

1. **Requirements**: config .env (add DB params)
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
2. **Installation**:
   - composer install
   - yarn install
3. **Database Migration**:
   - php artisan migrate
   - php artisan csv:import privat/property-data.csv
4. **Additional Commands**:
   - Use Artisan commands to clear caches.
	- php artisan cache:clear
	- php artisan route:clear
5. **Running the Application**:
   - php artisan serve
   - yarn dev
