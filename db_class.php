<?php

include_once('connection.inc.php');
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string) or die('Could not reach database.');

class Db_Class
{
    private $table_name = 'ibadah';
    function createUser()
    {

        $lat = $_POST['lat'];
        $lng = $_POST['lng'];
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];

        $sql = "insert into ibadah (id, nama, jenis, lat, lng, geom) VALUES ('$id', '$nama', '$jenis', '$lat', '$lng', ST_GeomFromText('POINT($lng $lat)', 4326))";
        return pg_affected_rows(pg_query($sql));
    }

    function getUsers()
    {
        $sql = "select *from public." . $this->table_name;
        return pg_query($sql);
    }

    function getUserById()
    {

        $sql = "select *from public." . $this->table_name . "  where id='" . $this->cleanData($_POST['id']) . "'";
        return pg_query($sql);
    }

    function deleteuser()
    {

        $sql = "delete from public." . $this->table_name . "  where id='" . $this->cleanData($_POST['id']) . "'";
        return pg_query($sql);
    }

    function updateUser($data = array())
    {

        $lat = $_POST['lat'];
        $lng = $_POST['lng'];

        $sql = "update ibadah set id='" . $this->cleanData($_POST['id']) . "',nama='" . $this->cleanData($_POST['nama']) . "', jenis='" . $this->cleanData($_POST['jenis']) . "', lat='" . $this->cleanData($_POST['lat']) . "',lng='" . $this->cleanData($_POST['lng']) . "' ,geom= ST_GeomFromText('POINT($lng $lat)', 4326)  where id = '" . $this->cleanData($_POST['id']) . "' ";
        return pg_affected_rows(pg_query($sql));
    }
    function cleanData($val)
    {
        return pg_escape_string($val);
    }
}
