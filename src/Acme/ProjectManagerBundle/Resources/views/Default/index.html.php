<?php 
$view->extend('AcmeProjectManagerBundle::layout.html.php');
?>


<div class="coreBox">
    <div><label>Project details</label></div>
    <table class="table table-hover">
        <tr><td>Name: </td><td><?php echo $project->getName() ?></td></tr>
        <tr><td>Description: </td><td><?php echo $project->getDescription() ?></td></tr>
        <tr><td>Status: </td><td><?php echo array_search($project->getStatus(), $statusList) ?></td></tr>
        <tr><td>Create date: </td><td><?php echo $project->getCreateDate()->format('Y/m/d H:i:s') ?></td></tr>
        <tr><td>Update date: </td><td><?php echo $project->getUpdateDate()->format('Y/m/d H:i:s') ?></td></tr>
    </table>
</div>


<div class="form-group">
            <?php echo "<a role='button' href='" . $view['router']->generate('_project_createtask') . "/" . $project->getId() . "' class='btn btn-primary'>Add task</a>"; ?>

            <?php echo "<a role='button' href='" . $view['router']->generate('_project_listtasks' , array('projectId'=>$project->getId())) . "' class='btn btn-primary'>List task</a>"; ?>
</div>