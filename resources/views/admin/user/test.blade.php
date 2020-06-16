@extends('dashboard.base')

@section('content')

<div class="container">
  <h1>Cara Handle Input Text Box Melalui Combo Box Dengan jQuery</h1>
  <form>
    <div class="form-group">
      <label for="sel1">Pilih Kelas:</label>
      <select class="form-control" id="combo1">
        <option value="pilih">Pilih</option>
        <option value="kelas10">Kelas X</option>
        <option value="kelas11">Kelas XI</option>
        <option value="kelas12">Kelas XII</option>
      </select>
      <br>
      <label for="sel2">Pilih Kejuruan:</label>
      <select class="form-control" id="combo2">
        <option value="pilih">Pilih</option>
        <option value="ak">Accounting (AK)</option>
        <option value="ap">Administrasi Perkantoran (AP)</option>
        <option value="pj">Penjualan (PJ)</option>
      </select>
    </div>
 
  <div class="form-group" id="kode">
  <label for="sel1">Golongan Darah:</label>
      <input class="form-control" type="text">
    </div>
 
 
  </form>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){ 
  $("select[id=combo1]").on("change", function() {      //onchange kelas
    if ($(this).val() === "pilih") {                    //if belum ada yg dipilih
      $('select[id=combo2]').prop('selectedIndex',0);
      $("select[id=combo2]").prop("disabled", true);
      $("div[id=kode]").hide();                         
    } else { 
      $("select[id=combo2]").prop("disabled", false);   //else ada yang dipilih
    } 
  }); 
  $("select[id=combo1]").trigger("change");             //kembali ke awal (saat yg dipilih adalah "pilih")
 
 
  $("select[id=combo2]").on("change", function() {      //onchange jurusan
    if ($(this).val() === "pilih") {
      $("div[id=kode]").hide();                         //if belum ada yg dipilih
    } else { 
      $("div[id=kode]").show();                         //else ada yang dipilih
    } 
  }); 
  $("select[id=combo2]").trigger("change");
 
 
});
</script>
@endsection