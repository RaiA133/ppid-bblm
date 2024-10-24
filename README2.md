1. ```npm install```
2. ```composer install```
3. configure .env
4. ```npx tailwindcss -i ./public/src/input.css -o ./public/src/output.css --watch```
5. to run type ```php spark serve``` or put this project to your htdocs and start xampp server




database
- untuk membuat nama table menggunkan snake case
- pembuatan id harus id_(nama table)

PHP Version > 8.x.x

Change Tabesize in VsCode / textEditor to 2 space indent
VsCode = setting > search 'tabsize' > change to 2




List Seeder Command (run all) : 

```php spark db:seed RegulasiSeeder```
```php spark db:seed ProfilSeeder```
```php spark db:seed "App\Database\Seeds\InformasiPublik\InformasiBerkalaSeeder"```
```php spark db:seed "App\Database\Seeds\InformasiPublik\InformasiBerkalaJudulSeeder"```
```php spark db:seed "App\Database\Seeds\InformasiPublik\InformasiSetiapSaatSeeder"```
```php spark db:seed "App\Database\Seeds\InformasiPublik\InformasiSetiapSaatJudulSeeder"```
```php spark db:seed "App\Database\Seeds\StandarLayanan\MaklumatPelayananSeeder"```