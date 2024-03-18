# Adrian Putra Ramadhan - 220302074

# CodeIgniter 4 Projek Basic

## Apa itu CodeIgniter?
![image](https://github.com/adrianramadhan/task1_ci_example/assets/59206760/f5a02b1a-693e-432c-b183-ccf6d42da4fb)

CodeIgniter merupakan aplikasi FullStack sumber terbuka yang yang ringan, cepat, fleksibel, dan aman. Codeigniter juga merupakan kerangka kerja PHP dengan model MVC (Model, View, Controller) untuk membangun situs web dinamis dengan menggunakan PHP. CodeIgniter memudahkan pengembang web untuk membuat aplikasi web dengan cepat dan mudah dibandingkan dengan membuatnya dari awal

## Persyaratan

- PHP ver 8.1.10+
- Composer ver 2.5.5+
- PostgreSQL ver 16.2+

## Menjalankan project
Untuk menjalankan project, buka direktori project pada terminal dan jalankan perintah berikut ini. Aplikasi akan secara default berjalan pada port 8080

```shell
php spark serve
```

Untuk menentukan port yang digunakan aplikasi, tambahkan argument `--port`

```shell
php spark serve --port 80
```

## Arsitektur MVC(Model View Controller)

### Pengertian MVC
![image](https://github.com/adrianramadhan/task1_ci_example/assets/59206760/2abf2c80-7b1f-41c0-b167-1c7cb605753c)

Model View Controller atau yang dapat disingkat MVC adalah sebuah pola arsitektur dalam membuat sebuah aplikasi dengan cara memisahkan kode menjadi tiga bagian yang terdiri dari:

Model ->
Bagian yang bertugas untuk menyiapkan, mengatur, memanipulasi, dan mengorganisasikan data yang ada di database.

View ->
Bagian yang bertugas untuk menampilkan informasi dalam bentuk Graphical User Interface (GUI).

Controller ->
Bagian yang bertugas untuk menghubungkan serta mengatur model dan view agar dapat saling terhubung.

### Alur Model View Controller
Setelah kamu mengetahui penjelasan dan komponen dari MVC, sekarang kita akan membahas alur proses dari MVC. Berikut ini adalah alur prosesnya.

Proses pertama adalah view akan meminta data untuk ditampilkan dalam bentuk grafis kepada pengguna.
Permintaan tersebut diterima oleh controller dan diteruskan ke model untuk diproses.
Model akan mencari dan mengolah data yang diminta di dalam database
Setelah data ditemukan dan diolah, model akan mengirimkan data tersebut kepada controller untuk ditampilkan di view.
Controller akan mengambil data hasil pengolahan model dan mengaturnya di bagian view untuk ditampilkan kepada pengguna.

## Menentukan Base URL
Base URL akan digunakan pada saat sistem melakukan pengalihan.
```
app.baseURL = 'http://localhost:8080/'
```

## Konfigurasi database
Lakukan konfigurasi database untuk menghubungkan aplikasi dengan database
Berikut contoh konfigurasi Database Local saya

```
database.default.hostname = localhost
database.default.database = books
database.default.username = postgres
database.default.password = 
database.default.DBDriver = Postgre
database.default.port = 5432
```

## Konfigurasi Environment

### Development Environment
```
CI_ENVIRONMENT = development
```

### Testing Environment
```
CI_ENVIRONMENT = testing
```

### Production Environment
```
CI_ENVIRONMENT = production
```
Setelah mengatur nilai CI_ENVIRONMENT, CodeIgniter akan menggunakan konfigurasi yang sesuai untuk lingkungan yang ditentukan. Anda dapat menggunakan nilai ini untuk mengonfigurasi setelan aplikasi lainnya, seperti koneksi database, URL, dll.

## ROUTES
Untuk melakukan Routes pada Framework CodeIgniter$ bisa dilakukan di folder `App/Config/Routes.php`, berikut Route yang saya gunakan di Projek Aplikasi Basic saya

### Get Method
GET Method digunakan untuk membaca atau mengambil data, berikut beberapa GET Method yang digunakan di Route Aplikasi saya:
```
$routes->get('books', [Books::class, 'index']);
$routes->get('books/new', [Books::class, 'new']);
$routes->get('books/(:segment)', [Books::class, 'show']);
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
```

### Post Method
POST Method digunakan untuk mengirim atau mengirimkan data yang akan diolah atau disimpan di server, berikut beberapa POST Method yang saya gunakan di Route Aplikasi saya:
```
$routes->post('books', [Books::class, 'create']);

```
