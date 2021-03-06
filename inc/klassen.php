<?php
    include("logincheck.php");
    include("connect.php");

    $klas = $conn->prepare("SELECT klas_name, id FROM `klas` WHERE opleiding_id = :opleiding_id ORDER BY id");
    $klas->execute(array('opleiding_id' => $_POST['opleiding_name']));
    $_SESSION['opleiding_name'] = $_POST['opleiding_name'];
?>
<!DOCTYPE html>
<html>
    <?php include("head.php"); ?>
    <body>
        <?php include("menu.php"); ?>
        <header>
            <div class="card-wide mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2>Klassen</h2>
                </div>
                <form action="kerntaken.php" method="post">
                    <select name="klassen">
                        <?php
                            while($row = $klas->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <option value="<?php echo ($row['id']);?>">
                            <?php
                                echo ($row['klas_name']);
                            ?>
                        </option>
                        <?php
                            }
                        ?>
                    </select>

                <?php include("button.php")?>
                </form>
            </div>
        </header>
    </body>
</html>
