# LuxSecure_P

A modern Laravel-based web application for property management and secure user authentication. This project provides a comprehensive platform for managing properties with user registration, login, profile management, and property listings.

## Features

- **User Authentication**: Complete authentication system including registration, login, password reset, and email verification
- **Property Management**: Dedicated properties page for browsing and managing property listings
- **User Profiles**: Secure profile management for authenticated users
- **Contact System**: Contact page for user inquiries
- **Responsive Design**: Modern, mobile-friendly user interface
- **API Ready**: Built with Laravel Sanctum for API authentication support

## Tech Stack

- **Backend**: Laravel 10.x
- **Frontend**: Blade Templates, Vite
- **Database**: MySQL/PostgreSQL (configurable)
- **Authentication**: Laravel Sanctum
- **Styling**: Custom CSS with responsive design
- **Build Tool**: Vite for asset compilation

## Requirements

- PHP 8.1 or higher
- Composer
- Node.js & NPM
- MySQL or PostgreSQL database

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd LuxSecure_P
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment Configuration**
   ```bash
   cp .env.example .env
   ```

   Update the `.env` file with your database credentials and other configuration settings:
   ```env
   APP_NAME=LuxSecure_P
   APP_ENV=local
   APP_KEY=
   APP_DEBUG=true
   APP_URL=http://localhost

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Run Database Migrations**
   ```bash
   php artisan migrate
   ```

7. **Build Assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

8. **Start the Development Server**
   ```bash
   php artisan serve
   ```

   Visit `http://localhost:8000` in your browser.

## Usage

### Authentication
- Register a new account at `/register`
- Login at `/login`
- Reset password via `/forgot-password`
- Access protected profile at `/profile` (requires authentication)

### Navigation
- **Home**: Main landing page
- **Properties**: Browse property listings
- **Contact**: Contact form and information
- **Profile**: User profile management (authenticated users only)

## Development

### Running in Development Mode
```bash
# Start Laravel development server
php artisan serve

# Start Vite development server for asset hot reloading
npm run dev
```

### Testing
```bash
# Run PHP tests
php artisan test

# Run with coverage
php artisan test --coverage
```

### Code Quality
```bash
# Run Laravel Pint for code formatting
./vendor/bin/pint

# Run PHPStan for static analysis (if configured)
# php artisan code:analyse
```

## Project Structure

```
LuxSecure_P/
├── app/                    # Application logic
│   ├── Console/           # Artisan commands
│   ├── Exceptions/        # Exception handlers
│   ├── Http/             # HTTP layer
│   │   ├── Controllers/  # Controllers
│   │   ├── Middleware/   # Middleware
│   └── Models/           # Eloquent models
├── bootstrap/             # Application bootstrap
├── config/                # Configuration files
├── database/              # Database migrations and seeders
├── public/                # Public assets
├── resources/             # Views and uncompiled assets
│   ├── css/              # Stylesheets
│   ├── js/               # JavaScript files
│   └── views/            # Blade templates
├── routes/                # Route definitions
├── storage/               # File storage
├── tests/                 # Test files
└── vendor/                # Composer dependencies
```

## API Endpoints

The application includes API support via Laravel Sanctum:

- `POST /api/login` - User login
- `POST /api/register` - User registration
- `POST /api/logout` - User logout
- `GET /api/user` - Get authenticated user (protected)

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## Security

This application implements several security best practices:
- CSRF protection on all forms
- Secure password hashing
- Session management
- Input validation and sanitization
- SQL injection prevention via Eloquent ORM

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For support, email support@luxsecure.com or create an issue in this repository.

## Acknowledgments

- Laravel Framework
- Laravel Sanctum
- Laravel Breeze
- Vite
- All contributors and the Laravel community
