<?php
require '../HConfig.php';
class Sections{
    private $mysql = null;
    public function __construct($mysql) {
        $this->mysql = $mysql;
    }

    public function getValues($section,$value){
        $result = $this->mysql->query("select tbl_conditions.second_section_id, tbl_sections.name as `section_name`, tbl_conditions.second_value_id, tbl_values.name as `value_name`, tbl_sections.`type`,tbl_values.is_number from tbl_conditions, tbl_sections, tbl_values where tbl_sections.id = tbl_conditions.second_section_id and tbl_values.id = tbl_conditions.second_value_id and tbl_conditions.first_section_id = $section and tbl_conditions.first_value_id = $value");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $temp[] = $row;
            }
            return json_encode($temp, JSON_UNESCAPED_UNICODE);
        }
        return "";
    }
    public function getSections(){
        $result = $this->mysql->query("select id from tbl_sections");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $temp[] = $row;
            }
            return json_encode($temp, JSON_UNESCAPED_UNICODE);
        }
        return "";
    }
}
$sections = new Sections($mysql);
$getValues = filter_has_var(INPUT_GET, "getValues");
if ($getValues) {
    $section = filter_input(INPUT_GET, "section");
    $value = filter_input(INPUT_GET, "value");
    echo $sections->getValues($section,$value);
    exit();
}
$getSections = filter_has_var(INPUT_GET, "getSections");
if ($getSections) {
    echo $sections->getSections();
    exit();
}

//header("Location:../index.php");