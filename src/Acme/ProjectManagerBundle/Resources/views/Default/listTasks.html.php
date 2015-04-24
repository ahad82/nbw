<?php 
$view->extend('AcmeProjectManagerBundle::layout.html.php');
?>

<div class="coreBox">
    <table class="table table-hover">
        <?php
             echo "<tr><th>Name</th><th>Description</th><th>Status</th><th>Create date</th><th>Update date</th><th>Manage dependency</th></tr>";
             
             foreach ($Tasks as $task){
                 echo "<tr>"
                    . "<td>" . $task->getName() . "</td>"
                    . "<td>" . $task->getDescription() . "</td>"
                    . "<td>" . array_search($task->getStatus(), $statusList). "</td>"
                    . "<td>" . $task->getCreateDate()->format('Y/m/d H:i:s'). "</td>"
                    . "<td>" . $task->getUpdatedate()->format('Y/m/d H:i:s') . "</td>"
                    . "<td><a role='button' href='" . $view['router']->generate('_project_dependency') . "/" . $task->getId() . "' class='btn btn-primary'>Add Dependency</a></td>"
                . "</tr>";
             }
        ?>
    </table>
</div>    
    <div class="coreBox">
      <div class="form-group">

          <div class="form-group">
            <?php echo "<a role='button' href='" . $view['router']->generate('_project_createtask') . "/" . $projectId . "' class='btn btn-primary'>Add more task</a>"; ?>
          </div>
       </div>
    </div>
