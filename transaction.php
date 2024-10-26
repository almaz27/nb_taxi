<?php
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'id20';
$db_port = 3306;

$mysqli = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db,
    $db_port
);

if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
}

function getLastReturnedRow(mysqli $mysqli):array|false|null
{
    //    Беру самую крайнюю (свежую) возвращенную транзакцию
    return $mysqli->query("SELECT * FROM `data` WHERE volume > 0 ORDER BY id DESC LIMIT 1;")->fetch_row();
}
function getLastCostRows(mysqli $mysqli, array $lastReturnArray): array|null|bool
{
    //    Беру самую крайнюю расход, с идентичными параметрами кроме date, потому что допускается сохранения возврата раньше чем расход,
//    volume разумеется должно быть отрицательным числом
    $stmt = $mysqli->prepare('SELECT * FROM `data` WHERE volume < 0 AND card_number=? AND service=? AND address_id=? ORDER BY id DESC LIMIT 1;');
    $stmt->bind_param('ssi', $lastReturnArray[1], $lastReturnArray[4], $lastReturnArray[5]);
    $stmt->execute();
    return $stmt->get_result()->fetch_row();
}
function transaction(mysqli $mysqli, array|null $volumeAndIDs):void
{
    if($volumeAndIDs === null){
        return;
    }
    $mysqli->begin_transaction();
    try {
//        обновляем volume найденного с конца расхода
        $updateStmt = $mysqli->prepare('UPDATE `data` SET volume = ? WHERE id = ?');
        $volume = floatval($volumeAndIDs['costVolume'] + $volumeAndIDs['returnVolume']);
        $updateStmt->bind_param('ii', $volume, $volumeAndIDs['nearestCostID']);
        $updateStmt->execute();
//        удаляю возврат с которого взял volume
        $deleteStmt = $mysqli->prepare('DELETE FROM `data` WHERE id = ?');
        $deleteStmt->bind_param('i', $volumeAndIDs['lastReturnID']);
        $deleteStmt->execute();

        $mysqli->commit();
    } catch (mysqli_sql_exception $exception) {
        $mysqli->rollback();
        throw $exception;
    }
}

function getVolumesAndIDs(mysqli $mysqli): array|null
{
    $lastReturnArray = getLastReturnedRow($mysqli);
    $nearestCostArray = getLastCostRows($mysqli, $lastReturnArray);
    if(is_array($nearestCostArray)) {
        return [
            'costVolume'=>$nearestCostArray[3],
            'returnVolume'=>$lastReturnArray[3],
            'nearestCostID'=>$nearestCostArray[0],
            'lastReturnID'=>$lastReturnArray[0],
        ];

    }
    return null;
}

function main(mysqli $mysqli):void
{
    $array = getVolumesAndIDs($mysqli);
    while (!is_null($array)) {
        $array = getVolumesAndIDs($mysqli);
        transaction($mysqli, $array);
    }
}

call_user_func('main', $mysqli);


$mysqli->close();
?>