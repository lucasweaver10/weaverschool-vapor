<script src="https://cdn.tiny.cloud/1/xhz630fat8nl5lrd694n6oilkamsqat4i6ekpcrd5r405wf1/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        quickbars_insert_toolbar: false,
        image_class_list: [
            {title: 'img-responsive', value: 'img-responsive'},
            {title: 'rounded-lg', value: 'rounded-lg'},
            {title: 'my-4', value: 'my-4'},
        ],
        image_title: true,
        image_advtab: true,
        automatic_uploads: true,
        images_upload_url: '/image-uploads/store',
        images_reuse_filename: true,
        images_upload_credentials: true,
        link_default_target: '_blank',
        link_target_list: [
            { title: 'Same page', value: '_self' },
            { title: 'New page', value: '_blank' },
            { title: 'None', value: '' },
        ],
    });
</script>
