<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Survey Reporting</title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
     <!-- include the BotDetect layout stylesheet --> 
   <link href="<?php echo e(captcha_layout_stylesheet_url()); ?>" type="text/css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 

</head>
<body style="background-image: url(<?php echo e(asset('images/background_image.png')); ?>)">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    Survey Reporting
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" style="font-weight: bold;">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('c_register')); ?>">Register</a></li>
                        <?php else: ?>
                        <li> <a href="<?php echo e(route('home')); ?>">About Us</a></li>
                        <li> <a href="<?php echo e(route('contact_detail')); ?>">Contact</a></li>
                        <!-- <li> <a href="<?php echo e(route('user_detail')); ?>">Admin</a></li> -->
                        <li> <a href="<?php echo e(route('company_detail')); ?>">Companies</a></li>
                        <li> <a href="<?php echo e(route('employee_detail')); ?>">Employees</a></li>
                        <li> <a href="<?php echo e(route('department_detail')); ?>">Departments</a></li>
                        <li> <a href="<?php echo e(route('survey_detail')); ?>">Surveys</a></li>
                        <li> <a href="<?php echo e(route('ques_type')); ?>">Questions</a></li>
                        <li> <a href="#">Answers</a></li>

                         
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                            
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>


<body>
   
<div class="container">
    <h2 align="center" style="color:#f5f8fa;">Add questions for preparing survey</h2> 
   
    <form action="<?php echo e(route('addmorePost')); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

        
   
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
   
        <?php if(Session::has('success')): ?>
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p><?php echo e(Session::get('success')); ?></p>
            </div>
        <?php endif; ?>
   
        <table class="table table-bordered" id="dynamicTable" style="background-color: #f5f8fa;">  
            <tr>
                <th>Question Type</th>
                <th>Question</th>
                <th>Subpart</th>
                <th>Action</th>
            </tr>
            <tr>  
                <td><select class="form-control" name="addmore[0][q_type]" style="width:87%;display:inline-block;margin:0px 20px">

                            <?php foreach($listing as $item){ ?>

                                <option value="<?php echo e($item->type_name); ?>" <?php if($item->type_name == 'open_ended'){ echo 'selected'; }?>><?php echo e($item->type_name); ?></option>

                            <?php } ?> 
                            </select> 
                </td>  
                <td><input type="text" name="addmore[0][ques]" placeholder="Enter your question" class="form-control" /></td>  
                <td><input type="text" name="addmore[0][subpart]" placeholder="Enter your subpart" class="form-control" /></td>  
                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
            </tr>  
        </table> 
      <div  class="col-md-8 col-md-offset-5">
        <button type="submit" class="btn btn-success" align="center">Save</button>
        <div>
    </form>
</div>
   
<script type="text/javascript">
   
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><select class="form-control" name="addmore['+i+'][q_type]" style="width:87%;display:inline-block;margin:0px 20px"><option value="<?php echo e('open_ended'); ?>" selected><?php echo e('open_ended'); ?></option><option value="<?php echo e('multiline_open_end'); ?>"><?php echo e('multiline_open_end'); ?></option><option value="<?php echo e('selection'); ?>"><?php echo e('selection'); ?></option><option value="<?php echo e('textarea'); ?>"><?php echo e('textarea'); ?></option><option value="<?php echo e('checkbox'); ?>"><?php echo e('checkbox'); ?></option></select></td><td><input type="text" name="addmore['+i+'][ques]" placeholder="Enter your question" class="form-control" /></td><td><input type="text" name="addmore['+i+'][subpart]" placeholder="Enter your subpart" class="form-control"/></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
        if(document.getElementByName('addmore['+i+'][q_type]').innerHTML == "open_ended"){
            document.getElementByName('addmore['+i+'][subpart]').innerHTML = "hiiiii";
            
        }
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  

    
   
</script>
  
</body>
</html>