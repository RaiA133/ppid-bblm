
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
- Semua jenis query selalu dilakukan dimodel, tidak di conroller (terkecuali untuk model dari myth, query dilakukan di controller)
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

<br><br>

## <b>Migrations : </b>

```bash
php spark migrate -all
```

## <b>List Seeder Command (run all in sequence) : </b>

```bash
php spark db:seed RegulasiSeeder
```

```bash
php spark db:seed ProfilSeeder
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
Link belajar Myth/Auth : https://www.youtube.com/watch?v=E5LC4v0_JVE

catatan sebelum go production :

- ubah seeder user ke proper seeder dan seeder lainnya
