# CO2-checker
A Laravel app to fetch and display carbon intensity data and color for specific zones.

## Setup
Requirements: PHP >= 8.0, Composer, Laravel >= 8.x, API Key (set in .env as API_KEY_TOKEN)

### Installation
```
composer install
```

### Set API Key: In .env:
```
API_KEY_TOKEN=your_api_key
```

## Server Command
Here is how you can connect to the server:
```
php artisan serve
```

## Cache Clearing
```
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
```

## Testing

Run the tests:
```
php artisan test
```

### Example of tests filter
```
php artisan test --filter testErrorResponseWithInvalidZone
```

## Troubleshooting

- Broken Pipe Error: Try a different port, e.g., php artisan serve --port=8001, or restart the server.
- Cache Not Clearing: Run all cache commands and restart the server.