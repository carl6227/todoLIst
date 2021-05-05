<?php
require_once 'task.php';
$myTask = new tasks;// creating myTask object
$myTask->addTask();//calling addTask function
$myTask->deleteTask();//calling deleteTask function
$myTask->editTask();//calling editTask function
$myTask->deleteFormTrash();//calling deleteFromTrash
$myTask->retrieveTask();//calling retrieveTask

?>


<!-- p -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Todo-list</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"rel="stylesheet"crossorigin="anonymous"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"crossorigin="anonymous"
        ></script>
        <link href="/your-path-to-fontawesome/css/fontawesome.css"rel="stylesheet"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
    ion-icon {
  font-size: 20px;
  }
  
    </style>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Task Manager</a>
            <button
                class="btn btn-link btn-sm order-1 order-lg-0"
                id="sidebarToggle"
                href="#!"
            >
                <i class="fas fa-bars"></i>
            </button>
            <!-- Navbar Search-->
            <form
                class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"
            >
                <div class="input-group">
                    <input class="form-control"type="text"placeholder="Search for..."aria-label="Search"aria-describedby="basic-addon2"/>
                    <div class="input-group-append">
                        <button class="btn btn-info" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        id="userDropdown"
                        href="#!"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        ><i class="fas fa-user fa-fw"></i
                    ></a>
                </li>
                <div class="dropdown-menu dropdown-menu-right"aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#!">Settings</a>
                    <a class="dropdown-item" href="#!">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav
                    class="sb-sidenav accordion sb-sidenav-dark"
                    id="sidenavAccordion"
                >
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a id="taskNav"class="nav-link" href="#">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-list -alt"></i>
                                </div>
                                Task
                            </a>
                            <a  id="trash" class="nav-link" href="#">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-trash-alt"></i>
                                </div>
                                Trash
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">

              <div class="contanier">
                    <div class="container-fluid ">
                        <h1 class="indicator mt-4 text-secondary">Your To-Do List</h1>
                        <ol class="breadcrumb mb-4">

                        </ol>
                        <div class="row">
                            <!-- calling the displayData() function -->
                            <?php $myTask->displayData();?>
                            <!-- calling the displayTrask() function -->
                            <?php $myTask->displayTrash();?>

                        </div>
                    </div>
                    <button style="position:fixed; margin-top:180px; margin-left:1000px" type="button" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-info btn-sm rounded-circle shadow p-3 mb-5 bg-info rounded "><ion-icon size="large" name="add-outline"></ion-icon></button>

                   <!-- modal for adding a task -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add Tasks here</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post">
                                <div class="modal-body">
                                    <input type="text" name="task" class="form-control form-control-lg border-info"  placeholder="Enter Task here....">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" id="addTask" name="addTask"class="btn btn-info">submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="js/scripts.js"></script>
         <script>
     
        // strike trough task 
        $('.check').change(function(){
            if($(this).prop("checked") == true){
              $(this).parent().parent().parent().prev().children().css('text-decoration','line-through');
            }else{
              $(this).parent().parent().parent().prev().children().css('text-decoration','none');
            }
        });
      
        // show modal if updateBtn is click
        $('.updateBtn').click(function(){
            $(this).parent().next().modal('show');
            oldTask=$(this).prev().val();
        //    $(this).parent().next().children().children().children().first().next().children().first().val(oldTask);
        });


      // indicator if trash button is click, hides the undeletedTask and shows the deletedTask
        $("#trash").on('click',()=>{
            $('.indicator').text("Trash")
            $('.undeletedTask').hide();
            $('.deletedTask').show();
            $('.rounded-circle').hide();

        });
       // does the oppisite action above 
        $("#taskNav").on('click',()=>{
            $('.indicator').text("Your To-Do List")
            $('.undeletedTask').show();
            $('.deletedTask').hide();
            $('.rounded-circle').show();
        });
        
        //code for the sweet alerts.
         <?php
        if (isset($_POST['addTask']) && $_POST['task'] != "") {
         ?>
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your task has been added',
            showConfirmButton: false,
            timer: 1500
           
            })
    

          <?php }?>
          
          <?php
            if (isset($_POST['saveChanges']) && $_POST['newTask'] != "") {
         ?>
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your task has been edited',
            showConfirmButton: false,
            timer: 1500
          
            })

          
          <?php }?>


          <?php
             if (isset($_POST['retrieve'])) {
            ?>
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Task retrieve successfully',
            showConfirmButton: false,
            timer: 1500
           
            })

           
          <?php }?>

          <?php
            if (isset($_POST['delete'])) {
             ?>
            Swal.fire({ 
            position: 'center',
            icon: 'success',
            title: 'Task moved to Trash',
            showConfirmButton: false,
            timer: 1500
          
            
            })
         
          <?php }?>

      
          <?php
             if (isset($_POST['remove'])) {
            ?>
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Task remove successfully',
            showConfirmButton: false,
            timer: 1500
           
            })

         
          <?php }?>

        </script>
    </body>
</html>
