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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Unos novog artikla</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      

      <div class="modal-body">
      <div class="mb-3">
      <label for="completeNaziv" class="form-label">Naziv</label>
       <input type="text" class="form-control" id="completeNaziv" placeholder="Unesite naziv">
    
       </div>
       <div class="mb-3">
      <label for="completeDimenzija" class="form-label">Dimenzija</label>
       <input type="text" class="form-control" id="completeDimenzija" placeholder="Unesite dimenziju">

       </div>

       <div class="mb-3">
      <label for="completeKolicina" class="form-label">Kolicina</label>
       <input type="text" class="form-control" id="completeKolicina" placeholder="Unesite kolicinu">
    
       </div>
       <div class="mb-3">
      <label for="completeVrsta" class="form-label">Vrsta</label>
       <input type="text" class="form-control" id="completeVrsta" placeholder="Unesite vrstu">
    
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

<div class="container my-3" >
    <h1 class="text-center">Andrijasevic DB </h1> 
    <button type="button" class="button my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Dodaj
</button>
<div id="prikazPodatakaTabele"> </div>
</div>
    <!-- JS -->
    <!-- iz jquery cdn -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
     <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" ></script> -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
prikaziPodatke();
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
            poslataCijena: dodajCijenu
        },
        success:function(data,status){
            //funk za prikaz podataka
            console.log(status);
            prikaziPodatke();
        }
    });
    
} </script> 
</body>
</html>