<?php
require_once("./include/header.php");

if (isset($_POST['add_doa'])) {
  if(trim($_POST['text'] != "")){
    $text = $_POST['text'];
    $name = $_POST['name'];

    $doa_insert = $db->prepare("INSERT INTO texts (text ,name) VALUES (:text ,:name)");
    $doa_insert->execute(['text' => $text, 'name' => $name]);
  }
}
$query = "SELECT * FROM texts ORDER BY id DESC LIMIT 4";
$texts = $db->query($query);
$query = "SELECT * FROM texts";
$texts_count = $db->query($query);
// statics sql
$stat_query = "UPDATE `stats` SET all_view=all_view+1 WHERE 1";
$stat_query = $db->query($stat_query);
$stat_show = "SELECT * FROM `stats` WHERE 1";
$stat_show = $db->query($stat_show);
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
              <div class="row mt-3">
                <div class="col">
                        <button id="showform" class="btn btn-success w-100">ثبت دعا جدید</button>
                          <section id="form" hidden class="btn btn-success w-100">
                        <form method="post">
                        <label for="doa-text" class="form-label" id="doa-label">متن دعای خود را در کادر زیر وارد کنید</label>
                        <textarea required name="text" id="doa-text" class="form-control"></textarea>
                        <label for="name" hidden id="name_label">نام: (اختیاری)</label>
                        <input type="text" name="name" id="name" hidden>
                        <button type="button" id="next" class="btn btn-primary w-100">ادامه</button>
                        <button name="add_doa" id="submit" type="submit" class="btn btn-success w-100" hidden>ارسال دعا</button>
                    </form>
                    </section>
                    <button id="gotodoas" class="btn btn-primary w-100 mt-2"><a href="doa.php" class="text-white text-decoration-none">نمایش همه دعاها</a></button>
                </div>
            </div>
            <div class="row mt-5 mb-5 text-center">
            <div class="col">
              <span>تعداد دعاها: <?php echo $texts_count->rowCount()?></span>
            </div>
            <?php foreach ($stat_show as $stat_shows){ ?>
            <div class="col"><span>تعداد بازدیدها: <?php 
            echo $stat_shows['all_view'] ?></span></div>
            <?php } ?>
            </div>
            </div>
            <footer class="bg-light w-100 text-center">
            <p>بسیار ممنون می شوم با معرفی این پروژه به دیگران و یا مشارکت و حمایت در پیشبرد آن به من کمک کنید</p>
              <p>یک پروژه دیگر با "رضا دهقانی" | Another Project By "Reza Dehghani"</p>
            </footer>
        <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
        <script src="javascript.js"></script>
    </body>
</html>