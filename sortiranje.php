<?php  
 include 'dbBroker.php';
 $output = '';  
 $order = $_POST["order"];  
 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  
 $query = "SELECT * FROM `gume` ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $result = mysqli_query($conn, $query);  
 $output .= '  
 <table class="table table-bordered">  
      <tr>  
           <th><a class="column_sort" id="id" data-order="'.$order.'" href="#">ID</a></th>  
           <th><a class="column_sort" id="naziv" data-order="'.$order.'" href="#">Naziv</a></th>  
           <th><a class="column_sort" id="dimenzija" data-order="'.$order.'" href="#">Dimenzija</a></th>  
           <th><a class="column_sort" id="kolicina" data-order="'.$order.'" href="#">Kolicina</a></th>  
           <th><a class="column_sort" id="vrsta" data-order="'.$order.'" href="#">Vrsta</a></th>
           <th><a class="column_sort" id="cijena" data-order="'.$order.'" href="#">Cijena</a></th>  

      </tr>  
 ';  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
      <tr>  
           <td>' . $row["id"] . '</td>  
           <td>' . $row["naziv"] . '</td>  
           <td>' . $row["dimenzija"] . '</td>  
           <td>' . $row["kolicina"] . '</td>  
           <td>' . $row["vrsta"] . '</td>  
           <td>' . $row["cijena"] . '</td>  
      </tr>  
      ';  
 }  
 $output .= '</table>';  
 echo $output;  
 ?>  
