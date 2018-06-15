<?php
include('../includes/connections.php');


?>
<table class="table" >
  <tr>
    <th> Candidate </th>
    <?php 

    //dynamically count the number of judges
    $j = mysqli_query($con, "SELECT id FROM judge");
    $judges = mysqli_num_rows ($j);

    //loop all over the number of contestants
    $c = mysqli_query($con, "SELECT * FROM candidates");
    while($row = mysqli_fetch_assoc($c)){
      $candidate_id = $row['id'];
      while ($row = mysqli_fetch_assoc($j)) {
        $id = $row['id'];
        echo  "<th> Judge ".$id."</th>";
      }
      echo "";
      echo "</tr>";       
      echo "<tr>"; 
      echo "<td>$candidate_id</td>";
      $counter = 1;
      for ($i = 1; $i <=$judges; $i++) { 
        $j1 = mysqli_query($con, "SELECT * FROM tblSwimsuit WHERE candidate_id ='$candidate_id' AND judge_id='$counter'");
        $checkRow = mysqli_num_rows($j1);
        while ($row = mysqli_fetch_assoc($j1)) {
          $j1Score = $row['score'];
          echo "<td>".$j1Score."</td>";

        }
        $counter++;
      }

      echo "</tr>";                       
    }




    ?>

  </table>
  
