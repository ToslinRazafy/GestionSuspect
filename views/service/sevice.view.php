<?php 
    ob_start()
?>
          <div class="col-lg-12">

<div class="card">
  <div class="card-body">
  <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-title">Liste des Service</h5>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Identifiant</th>
          <th>Contact</th>
        </tr>
      </thead>
      <tbody>
        <?php for($i = 0; $i < count($services); $i++): ?>
        <tr>
          <td><?= $services[$i]->getIdService(); ?></td>
          <td><?= $services[$i]->getContact(); ?></td>
        </tr>
        <?php endfor; ?>
      </tbody>
    </table>

  </div>
</div>

</div>
<?php
    $title = "Service";
    $secondtitle = "Liste des services";
    $pageContente = ob_get_clean();
    require ("views/layout/template.php");
?>