
## SETUP AWAL : 
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

Fungsi dari kode diatas adalah untuk melakukan generate tailwind yang dibuat dengan class menjadi css di file `output.css`

#### Untuk menjalankan ketik `php spark serve` atau pindahkan project ini ke htdocs Anda dan start server xampp mu.

<br>

## ATURAN & STEP DEVELOPING : 

- <b>PHP Version > 8.x.x</b>

- Change Tabesize in VsCode / textEditor to 2 space indent
VsCode = setting > search 'tabsize' > change to 2

- Nama Folder selalu SnakeCase

#### Role Auth : 
pada aplikasi ini sudah digunakan Library Myth Auth dalam system login dan register user. terdapat juga role diantaranya :

- <b>user</b>: role awal setelah user register, atau role yang ingin request menjadi admin, karena proses registrasi dilakukan biasanya untuk user yang ingin menjadi admin
- <b>admin</b> : orang yang bisa melakukan create, edit, delete data di website pada dashboard admin
- <b>superadmin</b> : seperti admin, namun punya kemampuan untuk ubah role serta username semua user lain.

<br>

#### ATURAN PEMBUATAN `ROUTES` :

- pembuatan route selalu menggunakan tanda strip (-) jika kata lebih dari 1 di satu segment.
- pembuatan route view admin selalu ditambahkan `/admin/...` diawal route.
- selain route untuk memanggil view ada juga route untuk melakukan proses query misalnya post / delete. nama route ditambahkan `/api/...` diawal, lalu jika dia untuk admin tambahkan menjadi `/api/admin/...`. dan untuk user `/api/user/...`
- jangan lupa gunakan filter untuk setiap role
- jika masih bingung, bisa lihat Routes yang sudah dibuat sebelumnya

#### ATURAN PEMBUATAN `CONTROLLER` :

- Controller hanya digunakan oleh satu halaman saja, buat kembali jika halaman di view berbeda.
- Pindahkan file controller sesuai dengan tempatnya, jika admin di admin, dan jika user di user
- Buat folder untuk controller sesuai posisi halaman, misal kita membuat subhalaman yang berisi tiga page berbeda di website, maka tempatkan 3 controller di folder
- jika masih bingung, bisa lihat controller yang sudah dibuat sebelumnya

#### ATURAN PEMBUATAN `MODEL` :

- Pembuatan model harus dengan menggunakan CLI `php spark make:model (NamaModel)` , NamaModel CamelCase dan setelahnya diberi kata Model. ex : `ProfileModel`
- untuk membuat nama table menggunkan snake case
- id harus id\_(nama_table)
- allowedFields wajib di isi dengan field mana saja yang berpotensi berubah-ubah
- useSoftDeletes selalu true (ALL DATABASE TABLE USE SOFT DELETE)
- useTimestamps selalu true
- Semua jenis query selalu dilakukan dimodel, tidak di controller (terkecuali untuk model dari myth, query dilakukan di controller)
- jika masih bingung, bisa lihat model yang sudah dibuat sebelumnya

#### ATURAN PEMBUATAN `MIGRATION` :

- pembuatan table selalu menggunakan migration
- Pembuatan migration harus dengan menggunakan CLI `php spark make:migration (NamaMigration)` , NamaMigration CamelCase
- untuk membuat nama table menggunkan snake case
- id harus id\_(nama_table)
- selalu tambahkan field created_at updated_at
- jika masih bingung, bisa lihat migration yang sudah dibuat sebelumnya

#### ATURAN PEMBUATAN `SEEDER` :

- Pembuatan seeder harus dengan menggunakan CLI `php spark make:seeder (NamaSeeder)` NamaSeeder CamelCase dan setelahnya diberi kata Seeder. ex : `ProfileSeeder`
- jika masih bingung, bisa lihat seeder yang sudah dibuat sebelumnya
- Jika sudah membuat seeder jangan lupa update readme ini, dengan menambahkan list command baru untuk seeder yang baru dan juga update DatabaseSeeder.php

<br><br>

## <b>Migrations & Seeder : </b>

```bash
php spark migrate -all
```

```bash
php spark db:seed DatabaseSeeder
```
Dua command diatas sudah menjalanakan migrasi dan semua seeder secara otomatis, <b>Sampai sini aplikasi sudah bisa dijalankan.</b>

<hr>
<br><br><br>

## LIST MANUAL EVERY INDIVIDUAL SEEDER 

### <b>List Seeder Command (run all in sequence) : </b>

```bash
php spark db:seed RegulasiSeeder
```

```bash
php spark db:seed ProfilSeeder
```

```bash
php spark db:seed HubungiKamiSeeder
```

```bash
php spark db:seed PagesViewSeeder
```

##### INFORMASI PUBLIK
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

```bash
php spark db:seed "App\Database\Seeds\InformasiPublik\InformasiSertaMertaSeeder"
```

##### STANDAR LAYANAN
```bash
php spark db:seed "App\Database\Seeds\StandarLayanan\TataCaraPermohonanInformasiSeeder"
```

```bash
php spark db:seed "App\Database\Seeds\StandarLayanan\MekanismeKeberatanSeeder"
```

```bash
php spark db:seed "App\Database\Seeds\StandarLayanan\MekanismePermohonanPenyelesaianSengketaSeeder"
```

```bash
php spark db:seed "App\Database\Seeds\StandarLayanan\MaklumatPelayananSeeder"
```

```bash
php spark db:seed "App\Database\Seeds\StandarLayanan\StandarBiayaPelayananSeeder"
```

```bash
php spark db:seed "App\Database\Seeds\StandarLayanan\WaktuPelayananSeeder"
```

```bash
php spark db:seed "App\Database\Seeds\LayananInformasi\PermohonanInformasiSeeder"
```

```bash
php spark db:seed "App\Database\Seeds\LayananInformasi\UnitPelayananPublikSeeder"
```

```bash
php spark db:seed "App\Database\Seeds\LayananInformasi\LaporanLayananInformasiSeeder"
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


<br><br>

### ADDTIONAL INFO :
<b>Link Belajar Codeigniter 4 </b> : https://youtube.com/playlist?list=PLFIM0718LjIUkkIq1Ub6B5dYNb6IlMvtc&si=dsI53b7EdRzBEOla <br>
<b>Link Belajar Myth/Auth </b> : https://www.youtube.com/watch?v=E5LC4v0_JVE

catatan sebelum go production :

- ubah seeder user ke proper seeder dan seeder lainnya




<br><br><br><br><br><br>
<hr>
<br><br>

# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
