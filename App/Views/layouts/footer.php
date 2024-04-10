</main>
<footer class="p-3 bg-success mt-5">
    <p class="text-center m-0 text-light"><b>Lê Thanh Mẩn manltpc05708@fpt.edu.vn</b></p>
</footer>
<script src="<?= $ROOT_URL ?? "" ?>/public/assets/js/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#note'), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>