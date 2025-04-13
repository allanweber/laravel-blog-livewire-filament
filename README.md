# Blog with Livewire, TailwindCSS, AlpineJS, Jetstream and Filament

## Features

- [X] Login
- [X] Register
- [X] Forgot Password
- [X] Reset Password
- [X] Dashboard
- [X] Profile
- [X] Settings
- [X] Logout
- [ ] Posts
- [ ] Categories
- [ ] Comments
- [ ] Likes

## Commands executed

```bash
# Create a model with migration, controller and factory

php artisan make:model Post -m -c -f

php artisan make:model Category -m -f

php artisan make:migration create_category_post_table

php artisan migrate

php artisan db:seed

# Check data in database    

php artisan tinker

App\Models\Post::count();
```
