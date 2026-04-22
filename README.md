
## Installation

Follow these steps to set up the project locally:

1. Clone the repository:
   ```bash
   git clone https://github.com/LaravelDaily/Laravel-Multi-Vendor-E-Commerce-Structure.git project
   cd project
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Copy the `.env` file and configure your environment variables:
   ```bash
   cp .env.example .env
   ```

4. Generate the application key:
   ```bash
   php artisan key:generate
   ```

5. Set up the database:
    - Update `.env` with your database credentials.
    - Run migrations and seed the database, repo includes fake tasks:
      ```bash
      php artisan migrate --seed
      ```



