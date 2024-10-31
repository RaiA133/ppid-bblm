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

to run type `php spark serve` or put this project to your htdocs and start xampp server

<br><br>

<h4>STEP PENGEMBANGAN : </h4>

Nama Folder selalu SnakeCase

pada aplikasi ini sudah digunakan Library Myth Auth dalam system login dan register user. terdapat juga role diantaranya :

- <b>user</b>: role awal setelah user register, atau role yang ingin request menjadi admin, karena proses registrasi dilakukan biasanya untuk user yang ingin menjadi admin
- <b>admin</b> : orang yang bisa melakukan create, edit, delete data di website pada dashboard admin
- <b>superadmin</b> : seperti admin, namun punya kemampuan untuk ubah role serta username semua user lain.

<br>

Pembuatan Routes :

- pembuatan route selalu menggunakan tanda strip (-) jika kata lebih dari 1 di satu segment.
- pembuatan route view admin selalu ditambahkan `/admin/...` diawal route.
- selain route untuk memanggil view ada juga route untuk melakukan proses query misalnya post / delete. nama route ditambahkan `/api/...` diawal, lalu jika dia untuk admin tambahkan menjadi `/api/admin/...`. dan untuk user `/api/user/...`
- jangan lupa gunakan filter untuk setiap role
- jika masih bingung, bisa lihat Routes yang sudah dibuat sebelumnya

Pembuatan controller :

- Controller hanya digunakan oleh satu halaman saja, buat kembali jika halaman di view berbeda.
- Pindahkan file controller sesuai dengan tempatnya, jika admin di admin, dan jika user di user
- Buat folder untuk controller sesuai posisi halaman, misal kita membuat subhalaman yang berisi tiga page berbeda di website, maka tempatkan 3 controller di folder
- jika masih bingung, bisa lihat controller yang sudah dibuat sebelumnya

Pembuatan Model :

- Pembuatan model harus dengan menggunakan CLI `php spark make:model (NamaModel)` , NamaModel CamelCase
- untuk membuat nama table menggunkan snake case
- id harus id\_(nama_table)
- allowedFields wajib di isi dengan field mana saja yang berpotensi berubah-ubah
- useSoftDeletes selalu true (ALL DATABASE TABLE USE SOFT DELETE)
- useTimestamps selalu true
- Semua jenis query selalu dilakukan dimodel, tidak di conroller (terkecuali untuk model dari myth, query dilakukan di controller)
- jika masih bingung, bisa lihat model yang sudah dibuat sebelumnya

Pembuatan Migration :

- pembuatan table selalu menggunakan migration
- Pembuatan migration harus dengan menggunakan CLI `php spark make:migration (NamaMigration)` , NamaMigration CamelCase
- untuk membuat nama table menggunkan snake case
- id harus id\_(nama_table)
- selalu tambahkan field created_at updated_at
- jika masih bingung, bisa lihat migration yang sudah dibuat sebelumnya

Pembuatan Seeder :

- Pembuatan seeder harus dengan menggunakan CLI `php spark make:seeder (NamaSeeder)` NamaSeeder CamelCase dan setelahnya diberi kata Seeder. ex : `ProfileSeeder`
- jika masih bingung, bisa lihat seeder yang sudah dibuat sebelumnya

<br><br>
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
