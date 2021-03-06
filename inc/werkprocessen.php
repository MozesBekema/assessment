<?php
    include("logincheck.php");
    include("connect.php");
    $wp = $conn->prepare("SELECT wp_name, id FROM `wp` WHERE kt_id = :kt_id ORDER BY id");
    $wp->execute(array('kt_id' => $_POST['kerntaken']));
    $_SESSION['kerntaken'] = $_POST['kerntaken'];
?>
<!DOCTYPE html>
<html>
    <?php include("head.php"); ?>
    <body>
        <?php include("menu.php"); ?>
        <header>
            <div class="card-wide mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2>Werkprocessen</h2>
                </div>
                <form action="leerling.php" method="post" id="required" class="notCentered">
                        <?php
                            while($row = $wp->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                            <input type="checkbox" class="mdl-checkbox__input" name="wp<?php echo $row['id'];?>">
                            <span class="mdl-checkbox__label"><?php echo ($row['wp_name']);?></span>
                        </label><br/>

                        <?php
                            }
                        ?>
                    <br/>
                <?php include("button.php")?>
                </form>
                <br/>
            </div>
        </header>
    </body>
</html>
