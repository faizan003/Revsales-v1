# Railway Database Setup Guide

## Step 1: Update your .env file

Copy the contents from `demo-env-config.txt` to your `.env` file. The key database settings you need to change are:

```env
DB_CONNECTION=mysql
DB_HOST=turntable.proxy.rlwy.net
DB_PORT=31499
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=SyzakwUAGVRQfvuKDYrqgIotjGKimBrn
```

## Step 2: Generate Application Key

Run this command to generate your application key:

```bash
php artisan key:generate
```

## Step 3: Run Migrations

After updating your .env file, run the migrations to create the database tables:

```bash
php artisan migrate
```

## Step 4: Test Database Connection

You can test the connection using:

```bash
php artisan tinker
```

Then in tinker:
```php
DB::connection()->getPdo();
```

If it returns a PDO object, your connection is working!

## Alternative: Using DB_URL

If you prefer to use the full connection URL, you can also set:

```env
DB_URL=mysql://root:SyzakwUAGVRQfvuKDYrqgIotjGKimBrn@turntable.proxy.rlwy.net:31499/railway
```

And comment out the individual DB_* variables.

## Troubleshooting

1. **Connection Refused**: Make sure your Railway database is running and the credentials are correct
2. **Access Denied**: Verify the username and password are correct
3. **Port Issues**: Ensure port 31499 is accessible
4. **SSL Issues**: Railway typically requires SSL, but the connection should handle this automatically

## Railway CLI Commands

You can also use Railway CLI to connect:

```bash
# Install Railway CLI if you haven't
npm install -g @railway/cli

# Login to Railway
railway login

# Connect to your project
railway link

# Connect to MySQL database
railway connect MySQL
```

## Security Notes

- Keep your database credentials secure
- Never commit your .env file to version control
- Consider using Railway's environment variables feature for production
- The database is on a public network, so ensure your application has proper security measures

## Next Steps

After setting up the database:

1. Run migrations: `php artisan migrate`
2. Test the authentication pages
3. Create some test users
4. Deploy your application to Railway

Your authentication system should now work with the Railway database! 