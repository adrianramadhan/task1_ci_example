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
Lakukan Clone Project terlebih dahulu
```
https://github.com/adrianramadhan/task1_ci_example.git
```

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

## MODEL
Model merupakan salah satu komponen penting dalam pengembangan web menggunakan framework CodeIgniter. Secara sederhana, Model merupakan representasi objek dalam database yang memungkinkan kita untuk berinteraksi dengan data pada database secara mudah dan efisien, pada framework CodeIgniter sendiri Model terdapat di folder `App/Models`, berikut Models yang saya gunakan pada projek aplikasi basic saya
```
BooksModels.php

<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    protected $table = 'book';

    protected $allowedFields = ['title', 'slug', 'content'];

    public function getBooks($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}

```

## Controller
Controller adalah sebuah bagian dari sebuah framework aplikasi web yang bertugas mengatur dan mengelola permintaan (request) dan respon (response) antara pengguna dan aplikasi web, berikut Controller dan beberapa method yang ada di projek Aplikasi CI Basic saya

### Class Books
```
<?php

namespace App\Controllers;
use App\Models\BooksModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Books extends BaseController {
    #code untuk 4 method
}
```

### Method Index untuk Get Semua Buku
```
    public function index()
    {
        $model = model(BooksModel::class);

        $data = [
            'books'  => $model->getBooks(),
            'title' => 'Books archive',
        ];

        return view('templates/header', $data)
            . view('books/index')
            . view('templates/footer');
    }
```

### Method Show untuk Menampilkan buku sesuai dengan Slug
```  
    public function show($slug = null)
    {
        $model = model(BooksModel::class);

        $data['books'] = $model->getBooks($slug);

        if (empty($data['books'])) {
            throw new PageNotFoundException('Cannot find the books item: ' . $slug);
        }

        $data['title'] = $data['books']['title'];

        return view('templates/header', $data) . view('books/view') . view('templates/footer');
    }
```

### Method New untuk menampilkan halaman tambah buku 
```
    public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Create a books item'])
            . view('books/create')
            . view('templates/footer');
    }
```

### Method Create untuk menyimpan Buku Baru ke Database
```
    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['title', 'content']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
            'title' => 'required|min_length[3]|max_length[255]',
            'content' => 'required|min_length[10]|max_length[5000]',
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data
        $post = $this->validator->getValidated();

        $model = model(BooksModel::class);

        $model->save([
            'title' => $post['title'],
            'slug' => url_title($post['title'], '=', true),
            'content' => $post['content'],
        ]);

        return view('templates/header', ['title' => 'Create a Books item'])
            . view('books/success')
            . view('templates/footer');
    }
```

## VIEW

### Halaman View untuk menampilkan semua buku yang ada di Database
```
index.php

<h2><?= esc($title) ?></h2>

<?php if (! empty($books) && is_array($books)): ?>

    <?php foreach ($books as $books_item): ?>

        <h3><?= esc($books_item['title']) ?></h3>

        <div class="main">
            <?= esc($books_item['content']) ?>
        </div>
        <p><a href="/books/<?= esc($books_item['slug'], 'url') ?>">View article</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No Books</h3>

    <p>Unable to find any books for you.</p>

<?php endif ?>
```
![image](https://github.com/adrianramadhan/task1_ci_example/assets/59206760/79edaa57-1ab1-41df-ac91-93102e7a6b68)


### Halaman View untuk menampilkan detail buku yang kita pilih (berdasarkan slug)
```
view.php

<h2><?= esc($books['title']) ?></h2>
<p><?= esc($books['content']) ?></p>
```
![image](https://github.com/adrianramadhan/task1_ci_example/assets/59206760/2c7f726f-7d27-43d0-9401-4618230b12e8)


### Halaman View untuk menambahkan buku baru
```
create.php

<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/books" method="post">
    <?= csrf_field() ?>

    <label for="title">Books Title</label>
    <input type="input" name="title" value="<?= set_value('title') ?>">
    <br>

    <label for="content">Books Content</label>
    <textarea name="content" cols="45" rows="4"><?= set_value('content') ?></textarea>
    <br>

    <input type="submit" name="submit" value="Create books item">
</form>
```
![image](https://github.com/adrianramadhan/task1_ci_example/assets/59206760/ea2116fc-0e59-4f9f-8afe-3add9b9ee484)


### Halaman View untuk tampilan sukses tambah buku
```
success.php

<p>Books item created successfully.</p>

```
![image](https://github.com/adrianramadhan/task1_ci_example/assets/59206760/922050f7-13a4-41dd-a3e8-f93f11c9526a)
