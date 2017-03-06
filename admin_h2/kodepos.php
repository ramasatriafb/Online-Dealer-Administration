<?php
if(!isset($_SESSION)) {
     session_start();
}
include "../connect.php"
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Online Dealer Administrasi</title>
    <link href='../css/css.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">
	<script src='jquery-1.11.3-jquery.min.js'></script>
	<script type="text/javascript">
    $(document).ready(function()
    {	
        $(document).on('submit', '#form-search', function()
        {
            var data = $(this).serialize();
            $.ajax({
            type : 'POST',
            url  : 'tablekodepos.php',
            data : data,
            success :  function(data)
            {		
            	$(".result").html(data);
			}
            });
            return false;
        });
    });
    function select_kodepos(item)
	{
		targetitem.value = item;
		top.close();
		return false;
	}
    </script>
    
    
  </head>

  <body>

    <div class="form">
    <div class="tab-content">
	  <div id="pdd">   
          <h1>Daftar KodePos</h1>
          
          <form id="form-search" method="post">
          <div class="top-row">
            <div class="field-wrap">
              <label>
                kodepos :
              </label>
            </div>
              <div class="field-wrap">
                <input type="text" name="kodepos" value=""/>
              </div>
          </div>
		  
			<div class="top-row">
          <div class="field-wrap">
            <label>
              Kelurahan :
            </label>
		  </div>
		  <div class="field-wrap">
          <input type="text" name="kelurahan" value=""/>
          </div>
		  </div>
          <div class="top-row">
          <div class="field-wrap">
            <label>
              Kecamatan :
            </label>
		  </div>
		  <div class="field-wrap"><input name="kecamatan" type="text" value=""/>
          </div>
          </div>
		  
		  <div class="top-row">
          <div class="field-wrap">
            <label>
              Kabupaten / Kotamadya :
            </label>
          </div>
		  <div class="field-wrap">
            <input name="kabupaten" type="text" value=""/>
          </div>
          </div>
          <button type="submit" class="button button-block"/>Search</button>
		   <div class="result">
		  <div class="field-wrap">
		  <div class="table" >
                <table>
                    <tr>
                        <td>
                            Kodepos
                        </td>
                        <td >
                            Kelurahan
                        </td>
                        <td>
                            Kecamatan
                        </td>
						<td>
                            Kabupaten / Kotamadya
                        </td>
						<td>
                            Propinsi
                        </td>
						<td>
                            Action
                        </td>
                    </tr>
                    <?php
					$hasil=mysql_query("select * from kodepos limit 0,10");
					
					while ($baris = mysql_fetch_array($hasil)){
					echo "
					<tr>
					<td align=center>";echo $baris['kodepos'];echo"</td>
					<td align=center>";echo $baris['kelurahan'];echo"</td>
					<td align=center>";echo $baris['kecamatan'];echo"</td>
					<td align=center>";echo $baris['kabupaten'];echo"</td>
					<td align=center>";echo $baris['propinsi'];echo'</td>
					<td align=center><a href=""'." onclick='".'return select_kodepos("'.$baris['kodepos'].'"'.");'>Pilih</a></td></tr>";
					
					}
					$hitung=mysql_query("select * from kodepos");
					$count = 0;
					while ($an = mysql_fetch_array($hitung))
					{
						$count++;
					}
					
                    ?>
                </table>
            </div>
			</div>
            <div class="top-row" >
          <div class="field-wrap">
          <label>Tampilkan Halaman</label></div>
          <div class="field-wrap">
          <input type="number"required  style="width:25%" min="1" name="page" max="<?php echo ceil($count/10)?>" value="1"/><span>Dari <?php echo ceil($count/10) ?> halaman</span>
          </div>
        </div>
        </div>
        </form>

        </div>
      
</div> <!-- /form -->
    
   <script src='../js/jquery.min.js'></script>
    <script src="js/index.js"></script>

    
    
    
  </body>
</html>