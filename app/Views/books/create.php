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