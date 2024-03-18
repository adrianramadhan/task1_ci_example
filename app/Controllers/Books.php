<?php

namespace App\Controllers;
use App\Models\NewsModel;
use App\Models\BooksModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Books extends BaseController
{
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

    public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Create a books item'])
            . view('books/create')
            . view('templates/footer');
    }

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
}
