# SmartShop Mini

A mini e-commerce application built with Laravel, featuring AI-powered product recommendations and a modern user interface using Livewire and Tailwind CSS.

## Features

- **User Authentication**: Secure login and registration system
- **Product Management**: Browse and manage products with detailed information
- **Shopping Cart**: Add products to cart and manage quantities
- **AI Recommendations**: Intelligent product suggestions using AI agents
- **Dashboard**: User dashboard for profile management and order history
- **Responsive Design**: Mobile-friendly interface built with Tailwind CSS
- **Real-time Updates**: Livewire components for dynamic interactions

## Tech Stack

- **Backend**: Laravel 11
- **Frontend**: Livewire, Tailwind CSS, Vite
- **Database**: MySQL/PostgreSQL (configurable)
- **AI Integration**: Custom AI agents for recommendations
- **Testing**: PHPUnit for unit and feature tests

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/your-username/smartshop-mini.git
   cd smartshop-mini
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**:
   ```bash
   npm install
   ```

4. **Environment Setup**:
   - Copy `.env.example` to `.env`
   - Configure your database settings in `.env`
   - Generate application key:
     ```bash
     php artisan key:generate
     ```

5. **Database Setup**:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Build Assets**:
   ```bash
   npm run build
   ```

7. **Start the Development Server**:
   ```bash
   php artisan serve
   ```

   For asset compilation during development:
   ```bash
   npm run dev
   ```

## Testing

Run the test suite:
```bash
php artisan test
```

## Project Structure

```
app/
├── Ai/                    # AI agents and services
├── Http/Controllers/      # HTTP controllers
├── Livewire/             # Livewire components
├── Models/               # Eloquent models
└── Services/             # Business logic services

resources/
├── css/                  # Stylesheets
├── js/                   # JavaScript files
└── views/                # Blade templates

database/
├── factories/            # Model factories
├── migrations/           # Database migrations
└── seeders/              # Database seeders

tests/                    # Test files
```

## Auth Credential
#### Email: user@example.com
#### Password: password

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
