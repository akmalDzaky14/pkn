<!doctype html>
<html>

<head>
    <title>From Postingan</title>
    <!-- menghubungkan file html dengan file ckeditor.js  -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/resources/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/resources/style.css">
</head>

<body>

    <div class="kotak">
		<h1>
            Masukan Judul proyek anda<br />
        </h1>
        <!-- memberikan name dan id -->
        <textarea class="" id="Judul"></textarea>
        <br />
        <h1>
            Masukan deskripsi proyek anda<br />
        </h1>
        <!-- memberikan name dan id -->
        <textarea class="ckeditor" id="ckedtor"></textarea>
        <br />
        <button class="tombol">Simpan</button>
		<div class="file-upload">
        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add
            Image</button>

        <div class="image-upload-wrap">
            <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
            <div class="drag-text">
                <h3>Drag and drop a file or select add Image</h3>
            </div>
        </div>
        <div class="file-upload-content">
            <img class="file-upload-image" src="#" alt="your image" />
            <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Remove</button>
				 <button><span class="image-title">Uploaded Image</span></button>
            </div>
        </div>
    </div>
    </div>
   

</body>

</html>