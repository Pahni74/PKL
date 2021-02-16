@php
$no = 1;
@endphp
<?php
for ($i= 0; $i <= 191; $i++){


?>
   <tr>
       <td> <?php echo $i+1 ?></td>
       <td> <?php echo $dunia[$i]['attributes']['Country_Region'] ?></td>
       <td> <?php echo $dunia[$i]['attributes']['Confirmed'] ?></td>
       <td><?php echo $dunia[$i]['attributes']['Recovered']?></td>
       <td><?php echo $dunia[$i]['attributes']['Deaths']?></td>
   </tr>
   <?php

} ?>
<?php echo $id[0]['positif'] ?>&nbsp; POSITIF,<?php echo $id[0]['sembuh'] ?>SEMBUH, <?php echo $id[0]['meninggal'] ?>MENINGGAL
