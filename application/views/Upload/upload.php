<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Travelo</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/resources/js/upload3.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/uploadnya.css">
</head>

<body>
  <div class="file-upload">
    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

    <div class="image-upload-wrap">
      <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
      <div class="drag-text">
        <h3>Drag and drop a file or select add Image</h3>
      </div>
    </div>
    <div class="file-upload-content">
      <img class="file-upload-image" src="#" alt="your image" />
      <div class="image-title-wrap">
        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
      </div>
    </div>
  </div>
</body>