# CodeIgniter 4 Projek Basic

## Apa itu CodeIgniter?

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
