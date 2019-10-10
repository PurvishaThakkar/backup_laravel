<?php $__env->startSection('content'); ?>


<div class="container">

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
            <div class="panel-heading" style="padding:10px 15px;font-size:20px;text-transform: uppercase;">
                <?php if(Auth::user()->name=="purva"): ?>

                <?php endif; ?>
                </div>
               
                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                            

                        


                       
                    <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Add/remove input fields</title>
  
</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
<!-- <script  type="text/javascript" src="file:///var/www/html/survey_report/public/js/script.js"></script> -->
</head>
<body>
  <!--End of a-players--><footer>
  <!-- <script src='tournament.js'></script> 
  </footer>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
  <html>
<body>





<select class="form-control" name="type_name" style="width:40%;display:inline-block;margin:0px 20px" id="choice">

                                <?php foreach($listing as $item){ ?>
                                
                                    <option value="<?php echo e($item->type_name); ?>"><?php echo e($item->type_name); ?></option>
                              
                                <?php } ?>

                            </select>
                            <button class="btn btn-info btn-lg" style="width:20%;display:inline-block;" onclick="myFunction()">Add Question</button>

<p id="demo"></p>




<div id='a-players'>
    <form name='myForm' id='randomTeams'>
      
    <div id="block"><br></div>
    <p id="demo1"></p>
    <input type='button' id='add' value='Add'>
    <input type='button' id='remove' value='Remove'>
    </form>
  </div>

</body>
</html>
</body>
</html>
<!-- partial -->
 <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->






             </div>   

            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>