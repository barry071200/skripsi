<style>
	@media print {
		@page {
		  size: 21cm 29.7cm;
		  margin: 0;
		}
		.header-pt
		{
			font-weight:bold;
		}
	}
	.tbl-resi
	{
		font-size:11px;
	}
	.tab-wrapper
	{
		border:1px solid gray;
		border-top:4px solid gray;
		height:700px;
		padding-top:5px;
	}
	.border-bottom
	{
		border-bottom:1px solid gray;
	}
	.border-top
	{
		border-top:1px solid gray;
	}
	.border-left
	{
		border-left:1px solid gray;
	}
	.img-qrcode
	{
		position:absolute;
		top:0;
		right:0;
	}
	.img-logo
	{
		position:absolute;
		top:10px;
		left:20px;
	}
</style>			
<div class="content-wrapper print resi">
	<table>
		<tr>
			<td width='450' align="center" valign='top'>
				<div class='header-pt'>PT. Bumi Barito Mineral</div>
				<div class='header-address'>site Office Km 44 jl.Jayanti</div>
				<div class='header-address'>KEC.Tanah Siang</div>
				<div class='header-address'>Murung Raya 73961, Indonesia</div>
			</td>
			<td valign='top'>
			
				<div >
				</div>
				<div class='mt10'>
					KEPADA Yth.
				</div>
				<div>
				</div>
				<div class='mt10'>
				</div>
			</td>
		</tr>
		<tr>
			<td rowspan="2">
				<div class="mb10">Harap diterima dengan baik barang2 tsb. Dibawah ini</div>
			</td>
		<tr>
	</table>
	<div class='tab-wrapper'>
		<table style="width:100%"  style="mt10"  cellpadding='5' cellspacing='0'>
			<tr >
				<th class="border-bottom border-top " height="10">No</th>
				<th class="border-bottom border-top">NAMA</th>
				<th class="border-bottom border-top">Tanggal</th>
				<th class="border-bottom border-top">UNIT</th>
			</tr>
			<tbody>
			<?php $no = 1; ?>
			<?php foreach($cetak as $dt): ?>
			<tr  class="tbl-resi">
				<td align="center" height="10"><?php echo $no++; ?></td>
				<td align="center"><?php echo $dt['nama_karyawan']; ?></td>
				<td align="center"><?php echo $dt['tanggal']; ?></td>
				<td align="center"><?php echo $dt['nama_unit']; ?></td>
			</tr>
			<?php endforeach ?>
			
		</tbody>
		</table>
	</div>
	<table style="width:100%">
		<tr>
			<td valign='top' style="width:55%" >
				<div class='mt10'>
					Kendaraan No. 
				</div>
				<div class='mt10'>
					PO No. 
				</div>
			</td>
			<td valign='top' style="width:30%">
				<div class='mt10'>
					Diterima Oleh: 
				</div>
			</td>
			<td valign='top' style="width:15%">
				<div class='mt10'>
					Terima Kasih <br> Hormat Kami
				</div>
			</td>
		</tr>
	</table>
	
</div>
<script>

		window.print();

</script>
