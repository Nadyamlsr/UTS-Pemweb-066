  <?php
include "config/koneksi.php";
if(isset($_GET['id_soal'])){
$query = mysqli_query ($conn,"Select * FROM soal where id_soal='$_GET[id_soal]'") or die (mysql_error());
$result_edit = mysqli_fetch_array($query);
}
?>
      <!-- Static Table Start -->
      <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Bank Soal</h6>
            </div>
            
           <div class="card-body">
           <a href="index.php?pages=soal-tambah" class="btn btn-info" role="button">Tambah Data</a>
            
              <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" data-toggle="table" data-pagination="true" data-search="true" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Isi soal</th>
					  
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        $no = 1;
                        $query	= mysqli_query($conn,"SELECT * FROM akun");
                            while ($hasil = mysqli_fetch_array($query)) 
                                
                            { ?>
                                
                                <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $hasil['kode_soal'];?></td>
                                <td><?php echo $hasil['isi_soal'];?></td>
								<td>
                                <a class='btn btn-primary' href="index.php?pages=soal-tambah&status=edit&kode_soal=<?php echo $hasil['kode_soal'];?>"> Edit</a>
                                    <a href='#' style='color:#fff;' class='btn btn-danger' onclick="if(confirm('Apakah yakin menghapus data ?')){window.location.href='index.php?pages=soal-proses&status=delete&kode_soal=<?php echo $hasil['kode_soal'];?>'}">Hapus</a>
                                    </td>
                             </tr>  
     
                    <?php }?>							 
                  </tbody>         
                </table>
                

              </div>
            </div>
          </div>
        