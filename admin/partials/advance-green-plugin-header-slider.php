<div class="container-fluid">
<div class="wrap border rounded p-0">
  <div class="card-header bg-info text-light m-0">
    Upload Homepage Slider Images
  </div>
  <div class="card-body">
       <form action="javascript:void(0)" id="advanceGreenSliderForm">
        <table class="table table-bordered">
        <tbody>
            <tr>
            <th scope="row">Title</th>
            <td colspan="2">
            <input type="text" class="form form-control" id="hompageimagesliderText" name="hompageimagesliderText" placeholder="Click to enter"  required="">
            </td>
            

            </tr>
            <tr>
            <th scope="row">Upload</th>
            <td><button type="button" class="btn btn-default" id="btnUploadImage">Upload Image</button>
            </td>
            <td><button type="submit" class="btn btn-info">Submit</button> 
                    </td>
            
            </tr>
            <tr>
            <th scope="row"></th>
                <td colspan="2">
                    <span><img src=" " id="media-image" style="object-fit:contain; vertical-align:top; width:100%; height:30%; max-height:350px; object-position:left;" class="" alt=""></span>
                    <input type="hidden" class="form-control" id="hompageimagesliderUrl" name="hompageimagesliderUrl" >
                </td>  
            </tr>
        </tbody>
        </table>
        </form>

  </div>
</div>

<div class="wrap border rounded p-0 mt-5">
<div class="card-header bg-info text-light m-0">
   Currently Uploaded
</div>
<div class="card-body">
<table class="table table-bordered">
        <tbody>
            <tr>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            </tr>
            <tr>
            <td> 
            
            </td>
            <td>
            
            </td>
            </tr>
            
        </tbody>
        </table>
</div>
</div>
</div>
<?php wp_enqueue_media();?>