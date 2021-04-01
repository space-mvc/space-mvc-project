<style type="text/css">
    .content {
        font-family:arial;
    }
    .form {
        width:400px;
        border:1px solid grey;
        border-radius: 10px;
    }
    .form-header {
        background-color:lightblue;
        padding:10px 10px 20px 10px;
        font-size:20px;
        border-bottom:1px solid grey;
    }
    .form-container {
        padding:10px;
    }
    .form-row {
        margin-bottom:10px;
    }
    .form-cell {
        width:50%;
        float:left;
    }
    .form-clear {
        clear:both;
    }
    .form-cell-right {
        text-align:right;
    }
</style>

<div class="content">
    <?php echo !empty($content) ? $content : null; ?>
</div>
