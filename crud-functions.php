<?php
global $wpdb;
$table = $wpdb->prefix . "table_name";
//Select query - get record from single row
$sql = "SELECT * FROM $table WHERE id = $id";
$row = $wpdb->get_row($sql);
$data = $row->$table_field_name;

//Select query - get all record
$sql = "SELECT * FROM $table";
$rows = $wpdb->get_results($sql);
foreach ($rows as $row)
{
    $data = $row->$table_field_name;
}

//Select query - get num rows
$sql = "SELECT * FROM $table";
$rows = $wpdb->get_results($sql);
$num_rows = $wpdb->num_rows;

//Insert query
$wpdb->insert(
      $table,
      array(
    'date' => date("Y-m-d"),
    'field_1' => $field_1,
    'field_2' => $field_1        
    ),
    array('%s', '%s', '%s')
    )

//Get last inserted ID 
$lastid = $wpdb->insert_id;

//Update query 
$wpdb->update( 
    $table, 
    array( 
    'field_1' => $field_1,                
    'field_2'    => $field_2
    ), 
    array( 'id' => $id), // Where
    array( '%s', '%s'), 
    array( '%d' ) 
    )

//Delete query 
$del_id = $_REQUEST['del_id'];
$wpdb->query("DELETE FROM $table WHERE id = $del_id");

//Connect separate / other database
$mydb = new wpdb('username','password','database','localhost');
$rows = $mydb->get_results("select Name from my_table");
echo "<ul>";
foreach ($rows as $row) :
echo "<li>".$row->name."</li>";
endforeach;
echo "</ul>";
?>
