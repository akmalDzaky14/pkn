<!-- https://id.000webhost.com/template/kecantikan/barber -->
<html>

<head>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

    <!--CSS============================================= -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/bootstrap_detail.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/resources/css/backrond_detail.css">
    <link rel="stylesheet"  href="<?php echo base_url(); ?>/resources/style.css">
</head>
<body>
<div class="section-top-border">
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <h3 class="mb-30">Form Element</h3>
            <form action="" method="post" class="mt-10" enctype="multipart/form-data">
                <div class="mt-10">
                    <input type="text" name="Luas_tanah" id="Luas_tanah" placeholder="Luas Tanah" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Luas Tanah'" required class="single-input">
                </div>
                <div class="mt-10">
                    <input type="text" name="Luas_bangunan" id="Luas_bangunan" placeholder="Luas Bangunan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Luas Bangunan'" required class="single-input">
                </div>
                <div class="mt-10">
                    <input type="text" name="Kamar_tidur" id="Kamar_tidur" placeholder="Kamar Tidur" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kamar Tidur'" required class="single-input">
                </div>
                <div class="mt-10">
                    <input type="text" name="Kamar_mandi" id="Kamar_mandi" placeholder="Kamar Mandi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kamar Mandi'" required class="single-input">
                </div>
                <div class="mt-10">
                    <input type="text" name="Daya_listrik" id="Daya_listrik" placeholder="Daya Listrik" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Daya Listrik'" required class="single-input">
                </div>
                <div class="mt-10">
                    <!-- <div class="icon" ><i class="fa fa-thumb-tack" aria-hidden="true"></i></div> -->
                    <input type="text" name="Address" id="Address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required class="single-input">
                </div>
                <div class="input-group-icon mt-10">
                    <!-- <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div> -->
                    <div class="form-select" id="default-select">
						<select>
    						<option value=" 1">City</option>
                            <option value="1">Malang</option>
                            <option value="1">Bogor</option>
                            <option value="1">Surabaya</option>
                            <option value="1">Jakarta</option>
                            <option value="1">Lainya </option>
                        </select>
                    </div>
                </div>
                <div class="input-group-icon mt-10">
                    <!-- <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div> -->
                    <div class="form-select" id="default-select">
                        <select>
                            <option value=" 1">Country</option>
                            <option value="1">indonesia</option>
                            <option value="1">Jepang</option>
                            <option value="1">Amerika</option>
                            <option value="1">Singapura</option>
                        </select>
                    </div>
                </div>

                <div class="mt-10">
                    <textarea class="single-textarea" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required></textarea>
                </div>
                <!-- For Gradient Border Use -->
                <!-- <div class="mt-10">
										<div class="primary-input">
											<input id="primary-input" type="text" name="first_name" placeholder="Primary color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'">
											<label for="primary-input"></label>
										</div>
									</div> -->
                <!-- <div class="mt-10">
                    <input type="text" name="first_name" placeholder="Primary color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'" required class="single-input-primary">
                </div>
                <div class="mt-10">
                    <input type="text" name="first_name" placeholder="Accent color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Accent color'" required class="single-input-accent">
                </div>
                <div class="mt-10">
                    <input type="text" name="first_name" placeholder="Secondary color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Secondary color'" required class="single-input-secondary">
                </div> -->
                <div class="image-upload-wrap">
                    <input type="file" class="file-upload-input" id="foto" name="foto">
                    <div class="drag-text">
                        <h3>Drag and drop a file or select add Image</h3>
                    </div>
                </div>
                <div class="mt-10" style="text-align: center;">
                    <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                </div>
            </form>
        </div>
        <!-- <div class="col-lg-3 col-md-4 mt-sm-30">
            <div class="single-element-widget">
                <h3 class="mb-30">Switches</h3>
                <div class="switch-wrap d-flex justify-content-between">
                    <p>01. Sample Switch</p>
                    <div class="primary-switch">
                        <input type="checkbox" id="default-switch">
                        <label for="default-switch"></label>
                    </div>
                </div>
                <div class="switch-wrap d-flex justify-content-between">
                    <p>02. Primary Color Switch</p>
                    <div class="primary-switch">
                        <input type="checkbox" id="primary-switch" checked>
                        <label for="primary-switch"></label>
                    </div>
                </div>
                <div class="switch-wrap d-flex justify-content-between">
                    <p>03. Confirm Color Switch</p>
                    <div class="confirm-switch">
                        <input type="checkbox" id="confirm-switch" checked>
                        <label for="confirm-switch"></label>
                    </div>
                </div>
            </div>
            <div class="single-element-widget mt-30">
                <h3 class="mb-30">Selectboxes</h3>
                <div class="default-select" id="default-select"">
										<select>
											<option value=" 1">English</option>
                    <option value="1">Spanish</option>
                    <option value="1">Arabic</option>
                    <option value="1">Portuguise</option>
                    <option value="1">Bengali</option>
                    </select>
                </div>
            </div>
            <div class="single-element-widget mt-30">
                <h3 class="mb-30">Checkboxes</h3>
                <div class="switch-wrap d-flex justify-content-between">
                    <p>01. Sample Checkbox</p>
                    <div class="primary-checkbox">
                        <input type="checkbox" id="default-checkbox">
                        <label for="default-checkbox"></label>
                    </div>
                </div>
                <div class="switch-wrap d-flex justify-content-between">
                    <p>02. Primary Color Checkbox</p>
                    <div class="primary-checkbox">
                        <input type="checkbox" id="primary-checkbox" checked>
                        <label for="primary-checkbox"></label>
                    </div>
                </div>
                <div class="switch-wrap d-flex justify-content-between">
                    <p>03. Confirm Color Checkbox</p>
                    <div class="confirm-checkbox">
                        <input type="checkbox" id="confirm-checkbox">
                        <label for="confirm-checkbox"></label>
                    </div>
                </div>
                <div class="switch-wrap d-flex justify-content-between">
                    <p>04. Disabled Checkbox</p>
                    <div class="disabled-checkbox">
                        <input type="checkbox" id="disabled-checkbox" disabled>
                        <label for="disabled-checkbox"></label>
                    </div>
                </div>
                <div class="switch-wrap d-flex justify-content-between">
                    <p>05. Disabled Checkbox active</p>
                    <div class="disabled-checkbox">
                        <input type="checkbox" id="disabled-checkbox-active" checked disabled>
                        <label for="disabled-checkbox-active"></label>
                    </div>
                </div>
            </div>
            <div class="single-element-widget mt-30">
                <h3 class="mb-30">Radios</h3>
                <div class="switch-wrap d-flex justify-content-between">
                    <p>01. Sample radio</p>
                    <div class="primary-radio">
                        <input type="checkbox" id="default-radio">
                        <label for="default-radio"></label>
                    </div>
                </div>
                <div class="switch-wrap d-flex justify-content-between">
                    <p>02. Primary Color radio</p>
                    <div class="primary-radio">
                        <input type="checkbox" id="primary-radio" checked>
                        <label for="primary-radio"></label>
                    </div>
                </div>
                <div class="switch-wrap d-flex justify-content-between">
                    <p>03. Confirm Color radio</p>
                    <div class="confirm-radio">
                        <input type="checkbox" id="confirm-radio" checked>
                        <label for="confirm-radio"></label>
                    </div>
                </div>
                <div class="switch-wrap d-flex justify-content-between">
                    <p>04. Disabled radio</p>
                    <div class="disabled-radio">
                        <input type="checkbox" id="disabled-radio" disabled>
                        <label for="disabled-radio"></label>
                    </div>
                </div>
                <div class="switch-wrap d-flex justify-content-between">
                    <p>05. Disabled radio active</p>
                    <div class="disabled-radio">
                        <input type="checkbox" id="disabled-radio-active" checked disabled>
                        <label for="disabled-radio-active"></label>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
</div>
</body>
<script src="<?php echo base_url(); ?>/resources/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
<script src="<?php echo base_url(); ?>/resources/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/resources/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>/resources/js/jquery.sticky.js"></script>
<script src="<?php echo base_url(); ?>/resources/js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url(); ?>/resources/js/parallax.min.js"></script>
<script src="<?php echo base_url(); ?>/resources/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>/resources/js/main.js"></script>
</div>

</html>