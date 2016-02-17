<?php include "include/header.php";

function printChallenge($row) {
    global $db;
    # finc classes for challenge
    $classStmt = $db->prepare("SELECT cl.id FROM challenge as c
JOIN solved_challenge as sc ON c.id=sc.challenge
JOIN class as cl ON cl.id = sc.class
WHERE c.id = :id");
    $classStmt->execute(['id' => $row->id]);
    $classes = "";
    foreach($classStmt->fetchAll(PDO::FETCH_OBJ) as $classRow) {
        $classes = $classes . " class-" . e($classRow->id);
    }
?>


    <div class="<?= e($row->category) ?> challenge-points" >
        <b style="font-family: Titillium Web;"><?= e($row->points)?></b>
    </div>
    <b><u><a class="<?= $classes ?> challenge-title"
             onclick="return toggleMe('challenge-<?=e($row->id)?>')"
             href="javascript:void(0)"
             style="font-family: Titillium Web;"><?=e($row->name)?></a></u></b><br>
    <div style="display:none;" class="dbox" id="challenge-<?=e($row->id)?>">
        <?= e($row->description) ?>
        <br>
        <?php if($row->author) { ?>
            <div style="color: black; font-family: Titillium Web;">Von:<b><?=e($row->author)?></b></div>
        <?php
        }
        // pdfs
        if(file_exists(getPDFPath($row->id, PUPIL_PDF))) {?>
            <div>
                <a href="#" onclick="downloadPDF(<?= e($row->id)?>, '<?=e(PUPIL_PDF)?>')" style="color: black; font-family: Titillium Web;"><b>Download:</b> Materialdatei [PDF]</a>
            </div>
        <?php
        }
        if(isLoggedIn() && file_exists(getPDFPath($row->id, TEACHER_PDF))) {?>
            <div>
                <a href="#" onclick="downloadPDF(<?= e($row->id)?>, '<?=e(TEACHER_PDF)?>')" style="color: black; font-family: Titillium Web;"><b>Download:</b> Hinweise für Lehrkraft [PDF]</a>
            </div>
        <?php } ?>
    </div>
    <?php if(isLoggedIn()) {?>
        <div class="solve-link <?= $classes ?>" >
            <a href="#" onclick="callApi('solveChallenge', {'class': selectedClass, 'challenge': <?= e($row->id)?>})" style="color: black; font-family: Titillium Web;">Challenge abschließen!</a>
        </div>


    <?php } ?>
    <br><br>
<?php
}

?>

<br>
<br>

<?php
foreach($categories as $c) {
?>
    <div class=".abstand challenge-header <?= e($c->name) ?>">
        <?= e($c->title) ?>
    </div>
<?php
}
// TODO: error handling
$challengeStmt = $db->prepare("SELECT c.id, c.name, c.description, c.points, c.category, cl.name AS author
FROM challenge as c
LEFT JOIN class as cl ON cl.id = c.author
WHERE category=:category");
foreach($categories as $c) {
?>
    <div class=".abstand challenge-box">
        <?php
        $challengeStmt->execute(['category' => $c->name]);
        foreach($challengeStmt->fetchAll(PDO::FETCH_OBJ) as $row) {
            printChallenge($row);
        }
        ?>
    </div>
<?php } ?>

<!--
NeuStrukturierung test anfang


<div class="<?= e($row->category) ?> challenge-points2">
    <b><?= e($row->points)?></b>
</div>
<b><u><a class="<?php
                foreach($classStmt->fetchAll(PDO::FETCH_OBJ) as $classRow) {
                    echo " class-" . $classRow->id;
                }
                ?>
                challenge-title2"
         onclick="return toggleMe('challenge-<?=e($row->id)?>')"
         href="javascript:void(0)" ><?=e($row->name)?></a></u></b><br>
<div style="display:none;" class="dbox" id="challenge-<?=e($row->id)?>">
    <?= e($row->description) ?>
    <br>
    <?php if($row->author) { ?>
        <div style="color: black;">Von:<b><?=e($row->author)?></b></div>
    <?php } ?>
</div><br><br>
<?php


?>

<br>
<br>

<?php
foreach($categories as $c) {
?>
<div class=".abstand challenge-header2 <?= e($c->name) ?>">
    <?= e($c->title) ?>
</div>
<?php
}
// TODO: error handling
$challengeStmt = $db->prepare("SELECT c.id, c.name, c.description, c.points, c.category, cl.name AS author
FROM challenge as c
LEFT JOIN class as cl ON cl.id = c.author
WHERE category=:category");
foreach($categories as $c) {
?>
<div class=".abstand challenge-box2">
    <?php
    $challengeStmt->execute(['category' => $c->name]);
    foreach($challengeStmt->fetchAll(PDO::FETCH_OBJ) as $row) {
        printChallenge($row);
    }
    ?>
</div>
<?php } ?>





NeuStrukturierung test ende
-->

<div class="selfmade-whole">
    Selfmade-Challenges
</div>
<div class="selfmade-box">
    <?php
    // create as many columns as categories
    $cols = [];
    foreach($categories as $c) {
        array_push($cols, []);
    }

    $challengeStmt->execute(['category' => "selfmade"]);

    // try to fill the columns as equal as possible
    $index = 0;
    foreach($challengeStmt->fetchAll(PDO::FETCH_OBJ) as $row) {
        array_push($cols[$index], $row);
        $index = ($index + 1) % count($cols);
    }

    foreach($cols as $col) {
    ?>
        <div class=".abstand selfmade-col">
            <?php
            foreach($col as $row) {
                printChallenge($row);
            }
            ?>
        </div>
    <?php } ?>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include "include/footer.php"?>
