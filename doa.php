<?php
require_once("./include/header.php");

$query = "SELECT * FROM texts ORDER BY id DESC";
$texts = $db->query($query);
?>

<div class="row mt-5 text-center">
              <?php
              if ($texts->rowCount() > 0) {
                foreach ($texts as $text){
                ?>
                <div class="col-md-6 mb-2">
                  <figure>
                  <blockquote class="blockquote"><?php echo $text['text'] ?></blockquote>
                  <figcaption class="blockquote-footer">
                  <cite title="Source Title"><?php echo $text['name'] ?></cite>
                </figcaption>  
                </figure>
                </div>
                <?php
              }
            }
              ?>
              </div>