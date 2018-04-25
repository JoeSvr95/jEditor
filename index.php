<?php
    $title = "jEditor - Edit your pics!";
    $css = "img-editor.css";
    include_once 'header.php';
?>
    <section>
    	<div class="container-fluid">
    		<div class="img-holder"><div id="upload_progress"></div></div>
    	</div>
        
        <form id="img-form" action="" method="POST" enctype="multipart/form-data" class="form-inline">
            <div class="form-group">
                <input id="img-input" type="file" name="file">
            </div>
            <button id="btn-upload" class="btn btn-default" type="submit" name="upload">Upload</button>
        </form>

        <div class="container">
            <div class="img-tools">
                <h3>Transformations</h3>
                <div class="btn-groups">
                    <button id="r-left" class="btn btn-default"><i class="fas fa-undo"></i> Rotate Left</button>
                    <button id="r-right" class="btn btn-default"><i class="fas fa-redo"></i> Rotate Right</button>
                    <button id="mirror" class="btn btn-default">Mirror</button>
                </div>
                <h3>Filters</h3>
                <div class="btn-groups">
                    <button id="gray" class="btn btn-default">Black & White</button>
                    
                </div>
            </div>
        </div>
    </section>

<?php
    include_once 'footer.php';
?>