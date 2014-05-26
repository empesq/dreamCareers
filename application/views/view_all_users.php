<?php 
echo "<a href='Users/new_user'>Add New User</a>";
if ($query->num_rows() > 0 ){
echo "<table border='0'>";
 echo "<tr>";
echo "<td>ID</td>";
 echo "<td>First Name</td> <td>Last Name</td> <td>Created Date</td>";
 echo "</tr>";
  foreach ($query->result() as $row){
        echo "<tr>";
        echo "<td>".$row->user_id."</td>";
        echo "<td>".$row->firstName."</td>";
        echo "<td>".$row->lastName."</td>";
        echo "<td>".date("d-m-Y", strtotime($row->regdate))."</td>";  //if strtotime is not used this error will occur: "A non well formed numeric value encountered"
        echo "</tr>";
 }
echo "</table>";
}