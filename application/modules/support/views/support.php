<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>
        <style>
        .panel-primary>.panel-heading {
        padding: 10px;
        }

        .panel-body {
        background: #fff;
        }
        .submitBtn{
        margin: 5px;
        margin-left: 2rem;
        }
        </style>
        <section id="main-content">
        <section class="wrapper site-min-height">
        <section class="content">
        <div class="col-md-12">
        <div class="panel panel-success">
        <header class="panel-heading">
        Support
        </header>
        <div class="form-group col-md-12">
        <label class="control-label col-md-3"></label>
        <div class="col-md-9">
        </div>
        </div>
        <form role="form" role="form" class="clearfix" action="support/send" method="post"autocomplete="off">
        <div class="form-group col-md-12">
        <label class="control-label col-md-3">To</label>
        <div class="col-md-9">
        <input type="email" class="form-control" name="email" id="" value='' placeholder=''>
        </div>
        </div>
        <div class="form-group col-md-12">
        <label class="control-label col-md-3"></label>
        <div class="col-md-9">
        </div>
        </div>
        <div class="form-group col-md-12">
        <label class="control-label col-md-3">Enter your querries</label>
        <div class="col-md-9">
        <textarea class="ckeditor form-control" name="description" value="" rows="10"></textarea>
        </div>
        </div> 
        <br>
        <div class="form-group col-md-12">
        <label class="control-label col-md-3">Upload Image</label>
        <div class="col-md-9">
        <input type="file" class="form-control" name="support_image" id="" >
        </div>
        </div>

        <br>
        <button type="submit" name="submit" class="btn btn-info submitBtn" >Send</button>
        </form>
        </div>
        </div>
        </section>
        </section>
        </section>
        </section>

