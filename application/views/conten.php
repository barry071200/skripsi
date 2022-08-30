                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>nama</th>
                    <th>Alamat</th>
                    <th>No Telpon</th>
                    <th>ACTION</th>
                    <th>TIMESHEET</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($karyawan as $dt): ?>
                  <tr>
                    <td><?php echo $dt['nama_karyawan'];?></td>
                    <td><?php echo $dt['alamat'];?></td>
                    <td><?php echo $dt['no_telpon'];?></td>
                    <td>
								      <a class="btn btn-warning btn-xs" href="<?php echo site_url("dashboard/index")."/". $dt['id_karyawan']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
								      <a class="btn btn-danger btn-xs" data-href="<?php echo site_url("dashboard/index")."/". $dt['id_karyawan'];?>" data-toggle="modal" data-target="#confirm-delete" href="#"><span class="glyphicon glyphicon-remove"></span></a>
						      	</td>
                  </tr>
                  <?php endforeach ?>
                  <tfoot>
                  <tr>
                    <th>nama</th>
                    <th>Alamat</th>
                    <th>No Telpon</th>
                    <th>ACTION</th>
                    <th>TIMESHEET</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
