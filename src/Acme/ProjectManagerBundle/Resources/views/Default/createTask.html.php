<?php 
$view->extend('AcmeProjectManagerBundle::layout.html.php');
?>


   <form class="form-horizontal" action='<?php echo $view['router']->generate('_project_createtask') . "/" . $projectId ?>' method='post' novalidate>  
       <div class="coreBox">
           <div>
                <label>Enter details</label>  
           </div>
            <div class="form-group">
               <label for="Name" class="col-sm-2 control-label">Name</label>
               
               <div class="col-sm-10">
                    <div class="errors"><?php echo (isset($form_errors["name"]) ? $form_errors["name"]: "");?></div>  
                    <?php echo $view["form"]->widget($form["name"]);echo $view["form"]->widget($form["_token"]); ?>
               </div>
               
             </div>
             <div class="form-group">
               <label for="Name" class="col-sm-2 control-label">Description</label>  
               <div class="col-sm-10">
                    <div class="errors"><?php echo (isset($form_errors["description"]) ? $form_errors["description"]: "");?></div>  
                    <?php echo $view["form"]->widget($form["description"]); ?>
               </div>
             </div>
            <div class="form-group">
               <label for="Name" class="col-sm-2 control-label">Status</label>  
               <div class="col-sm-10">
                    <div class="errors"><?php echo (isset($form_errors["description"]) ? $form_errors["description"]: "");?></div>  
                    <?php echo $view["form"]->widget($form["status"]); ?>
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

