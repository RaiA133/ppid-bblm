```bash
npm install
```

```bash
composer install
```

configure .env

```bash
npx tailwindcss -i ./public/src/input.css -o ./public/src/output.css --watch
```

to run type ```php spark serve``` or put this project to your htdocs and start xampp server


<br><br>

database : 
- untuk membuat nama table menggunkan snake case
- pembuatan id harus id_(nama table)


PHP Version > 8.x.x

Change Tabesize in VsCode / textEditor to 2 space indent
VsCode = setting > search 'tabsize' > change to 2

<br><br>

<b>Migrations : </b>

```bash
php spark migrate -all
```

<b>List Seeder Command (run all in sequence) : </b>

```bash
php spark db:seed RegulasiSeeder
```
```bash
php spark db:seed ProfilSeeder
```
```bash
php spark db:seed "App\Database\Seeds\InformasiPublik\InformasiBerkalaSeeder"
```
```bash
php spark db:seed "App\Database\Seeds\InformasiPublik\InformasiBerkalaJudulSeeder"
```
```bash
php spark db:seed "App\Database\Seeds\InformasiPublik\InformasiSetiapSaatSeeder"
```
```bash
php spark db:seed "App\Database\Seeds\InformasiPublik\InformasiSetiapSaatJudulSeeder"
```

<br>

<b>Myth Auth Seeder : </b>

```bash
php spark db:seed "App\Database\Seeds\Myth\AuthGroups"
```
```bash
php spark db:seed "App\Database\Seeds\Myth\Users"
```
```bash
php spark db:seed "App\Database\Seeds\Myth\AuthPermissions"
```
```bash
php spark db:seed "App\Database\Seeds\Myth\AuthGroupsPermissions"
```
```bash
php spark db:seed "App\Database\Seeds\Myth\AuthGroupsUsers"
```


<br><br><br>
Link belajar Myth/Auth : https://www.youtube.com/watch?v=E5LC4v0_JVE



<br><br><br>
catatan sebelum go production : 
- ubah seeder user ke proper seeder dan seeder lainnya
