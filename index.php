<?php
include ('./shared/header.php');
$directory = './photos';
$photos = scandir($directory);
unset($photos[0], $photos[1]);
?>

<div class="container">
  <?php foreach(array_chunk($photos, 4) as $chunk) : ?>
    <div class="row">
      <?php foreach($chunk as $photo) : ?>
        <div class="col-sm-3 col-xs-12">
          <img src="/photos/<?= $photo ?>" class="thumbnail" width="171" height="180" />
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>