<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andrijasevic</title>
    <!-- samo href i rel potrebni CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='css/style.php' />

</head>
<body>



<!-- Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="completeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="completeModalLabel">Unos novog artikla</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      

      <div class="modal-body">
      <div class="mb-3">
      <label for="completeNaziv" class="form-label">Naziv</label>
       <input type="text" class="form-control" id="completeNaziv" placeholder="Unesite naziv" required>
    
       </div>
       <div class="mb-3">
      <label for="completeDimenzija" class="form-label">Dimenzija</label>
       <input type="text" class="form-control" id="completeDimenzija" placeholder="Unesite dimenziju">

       </div>

       <div class="mb-3">
      <label for="completeKolicina" class="form-label">Kolicina</label>
       <input type="text" class="form-control" id="completeKolicina" placeholder="Unesite kolicinu">
    
       </div>
        <?php
       include_once 'ucitajVrstu.php';
       ?> 
       <div class="mb-3">
      <label for="completeVrsta" class="form-label">Vrsta</label>
       <!-- <input type="text" class="form-control" id="completeVrsta" placeholder="Unesite vrstu"> -->
       <select id="completeVrsta">
           <?php
            include 'unos.php';
            while($sezona=mysqli_fetch_array($sve_sezone,MYSQLI_ASSOC)){
             ?>
      <option value="<?php echo $sezona['id']?>">
       <?php echo $sezona['naziv']; ?>
      </option>
            <?php }
       ?>

       </select>
       </div>
       <div class="mb-3">
      <label for="completeCijena" class="form-label">Cijena</label>
       <input type="text" class="form-control" id="completeCijena" placeholder="Unesite cijenu">
    
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
        <button type="button" class="btn btn-primary" onclick="dodajProizvod()">Sacuvaj promjene</button>
      </div>
    </div>
  </div>
</div>

<!-- Azuriranje Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="updateModalLabel">Unos novog artikla</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      

      <div class="modal-body">
      <div class="mb-3">
      <label for="updateNaziv" class="form-label">Naziv</label>
       <input type="text" class="form-control" id="updateNaziv" placeholder="Unesite naziv">
    
       </div>
       <div class="mb-3">
      <label for="updateDimenzija" class="form-label">Dimenzija</label>
       <input type="text" class="form-control" id="updateDimenzija" placeholder="Unesite dimenziju">

       </div>

       <div class="mb-3">
      <label for="updateKolicina" class="form-label">Kolicina</label>
       <input type="text" class="form-control" id="updateKolicina" placeholder="Unesite kolicinu">
    
       </div>
       <!-- <div class="mb-3">
      <label for="updateVrsta" class="form-label">Vrsta</label>
       <input type="text" class="form-control" id="updateVrsta" placeholder="Unesite vrstu">
       </div> -->
       
       <div class="mb-3">
      <label for="updateVrsta" class="form-label">Vrsta</label>
       <!-- <input type="text" class="form-control" id="completeVrsta" placeholder="Unesite vrstu"> -->
       <select id="updateVrsta">
           <?php
            include 'unos.php';
            while($sezona=mysqli_fetch_array($sve_sezone,MYSQLI_ASSOC)){
             ?>
      <option value="<?php echo $sezona['id']?>">
       <?php echo $sezona['naziv']; ?>
      </option>
            <?php }
       ?>

       </select>
       </div>
       <div class="mb-3">
      <label for="updateCijena" class="form-label">Cijena</label>
       <input type="text" class="form-control" id="updateCijena" placeholder="Unesite cijenu">
    
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
        <button type="button" class="button" onclick="azuriraj()">Ažuriraj</button>
        <input type="hidden" id="hiddendata">
      </div>
    </div>
  </div>
</div>

<div class="container my-3" >
    <h1 class="text-center">Andrijašević DB </h1>
     <h1>Dobrodošli <?php echo $_COOKIE["KorisnikCookie"];?></h1>
    <!--$user["ime"]  -->

<div class="container">
<div class="row">
  <div class="col-10"> 
    <div class="input-group">
      <div class="input-group-prepend">
<!-- <span class="input-group-text">
<i class="fa-sharp fa-solid fa-magnifying-glass"></i></span> -->
      </div>
    <input type="text" class="form-control" id="live-search" autocomplete="off" placeholder="Pretrazi"> 
     <div class="col-40"> 
    
   
    <a href="logout.php" class="buttonlog" tabindex="-1" role="button">Odjavi se</a>
     </div>
    <!-- <div class="row"> <a href="logout.php">Logout</a></div> -->
    </div></div> 
  
  </div>
</div>


    <button type="button" class="button my-3" data-bs-toggle="modal" data-bs-target="#completeModal">
  Dodaj
</button>
<!-- <div id="searchresult"> </div> -->
<div id="prikazPodatakaTabele"> </div>
</div>
    <!-- JS -->
    <!-- iz jquery cdn -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
     <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" ></script> -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
<script>
  //funkcija koja sluzi da podaci iz baze bude uvijek ucitani
$(document).ready(function(){
prikaziPodatke();
$("#live-search").keyup(function(){
  var input = $(this).val();
  if(input!=""){
    $.ajax({
      url:"pretraga.php",
      method: "POST",
      data:{input:input},
      success:function(data){
        $("#prikazPodatakaTabele").html(data);
      }
    });
  }else{
    //ako je prazan unos ova sekcija ce biti prazna
   //$("#prikazPodatakaTabele").css("display","none");
  }
});
});
  function prikaziPodatke(){
    var prikazaniPodaci="true";
    $.ajax({
      url: "prikaz.php",
      type: 'post',
      data:{
        poslatiPodaci : prikazaniPodaci
      },
      success:function(data,status){ //status je da li je izvrsena funk ili ne
            $('#prikazPodatakaTabele').html(data); //html je jquery metoda
      }
    });

  }

function dodajProizvod(){
    var dodajNaziv = $('#completeNaziv').val()
    var dodajDimenziju = $('#completeDimenzija').val()
    var dodajKolicinu = $('#completeKolicina').val()
    var dodajVrstu = $('#completeVrsta').val()
    var dodajCijenu = $('#completeCijena').val()

    $.ajax({
        url:"unos.php", //gdje saljem podatke
        type:'post',
        data:{
            poslatNaziv: dodajNaziv,
            poslataDimenzija: dodajDimenziju,
            poslataKolicina: dodajKolicinu,
            poslataVrsta: dodajVrstu,
            poslataCijena: dodajCijenu,
        },
        success:function(data,status){
            //funk za prikaz podataka
           // console.log(status);
            $('#completeModal').modal('hide');
            prikaziPodatke();
        }
    });
    
} 
//brisanje proizvoda
function izbrisiProizvod(idBrisanje){
  $.ajax({
    url: "brisanje.php",
    type:'post',
    data:{
      brisanjeposalji:idBrisanje
    },
    success: function(data,status){
      prikaziPodatke();
    }
  });
}

//azuriranje proizvoda
function otvoriAzuriraj(azuriranjeid){
$('#hiddendata').val(azuriranjeid);
//url type data
$.post("azuriranje.php", //ajax metoda
{azuriranjeid:azuriranjeid},
function(data,status){
var proizvodid=JSON.parse(data);
$('#updateNaziv').val(proizvodid.naziv);
$('#updateDimenzija').val(proizvodid.dimenzija);
$('#updateKolicina').val(proizvodid.kolicina);
$('#updateVrsta').val(proizvodid.vrsta);
$('#updateCijena').val(proizvodid.cijena);
});

  $('#updateModal').modal("show");
}


//onclick azuriraj
function azuriraj(){
  //ove podatke uzimamo iz forme
  
 var updateNaziv=$('#updateNaziv').val();
 var updateDimenzija=$('#updateDimenzija').val();
 var updateKolicina=$('#updateKolicina').val();
 var updateVrsta=$('#updateVrsta').val();
 var updateCijena=$('#updateCijena').val();
 var hiddendata=$('#hiddendata').val();

 $.post("azuriranje.php",{ //jquery
  //ove saljemo u bazu
  updateNaziv:updateNaziv,
  updateDimenzija:updateDimenzija,
  updateKolicina:updateKolicina,
  updateVrsta:updateVrsta,
  updateCijena:updateCijena,
  hiddendata:hiddendata

 }, function(data,status){
  //kada kliknemo na dugme azuriraj da se modal zatvori
 $('#updateModal').modal('hide');
 prikaziPodatke();
 });

}
</script> 
</body>
</html>