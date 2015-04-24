<?php 
$view->extend('AcmeProjectManagerBundle::layout.html.php');
?>

<div class="coreBox">
    <table class="table table-hover">
        <?php
            
             echo "<tr><th>Name</th><th>Dependent on name</th><th>Dependent on status</th><th>Update status to</th></tr>";
             foreach ($dependencyList as $dependency){
                 echo "<tr>"
                    . "<td>" . $dependency["task_name"] . "</td>"
                    . "<td>" . $dependency["on_task_name"] . "</td>"
                    . "<td>" . $dependency["on_task_status"] . "</td>"
                    . "<td>" . $dependency["do_task_status"]. "</td>"
                . "</tr>";
             }
        ?>
    </table>
</div>    
 <form class="form-horizontal" action='<?php echo $view['router']->generate('_project_dependency') . "/" . $taskId ?>' method='post' novalidate>  
       <div class="coreBox">
           <div>
                <label>Selected task is dependent on the task below</label>  
           </div>
            <div class="form-group">
               <label for="Name" class="col-sm-2 control-label">Task ID</label>
               
               <div class="col-sm-10">
                    <div class="errors"><?php echo (isset($form_errors["taskId"]) ? $form_errors["taskId"]: "");?></div>  
                    <?php echo $view["form"]->widget($form["taskId"]);echo $view["form"]->widget($form["_token"]); ?>
               </div>
               
             </div>
             <div class="form-group">
               <label for="Name" class="col-sm-2 control-label">Task Status</label>  
               <div class="col-sm-10">
                    <div class="errors"><?php echo (isset($form_errors["onStatus"]) ? $form_errors["onStatus"]: "");?></div>  
                    <?php echo $view["form"]->widget($form["onStatus"]); ?>
               </div>
             </div>
            
       </div>
     
        <div class='coreBox'>
            <div>
                <label>Update task status to</label>  
           </div>
            <div class="form-group">
               <label for="Name" class="col-sm-2 control-label">Update current task status to</label>  
               <div class="col-sm-10">
                    <div class="errors"><?php echo (isset($form_errors["doStatus"]) ? $form_errors["doStatus"]: "");?></div>  
                    <?php echo $view["form"]->widget($form["doStatus"]); ?>
               </div>
             </div>
        </div>
       
      
        <div class="coreBox">
            <div class="form-group">   
                <div class="form-group">
                  <button class="btn btn-primary btn-cstm-next" id="form_save" name="form[task_save]" type="submit">Save</button>
                </div>
            </div>
            
       </div>
