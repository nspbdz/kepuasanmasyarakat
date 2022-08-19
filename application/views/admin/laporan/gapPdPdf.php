<div id="content-wrapper">

	<div class="container-fluid">


		<div class="container">
			<h4 class="mt-3"> Data Laporan Hasil Gap Per Dimensi </h4>
			<p class="mb-4">Aplikasi Kepuasan Masyarakat</p>
			<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
			<?php if ($this->session->flashdata('delete')) : ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $this->session->flashdata('delete'); ?>
				</div>
			<?php endif; ?>

			<div class="card shadow-sm mb-4">
				<div class="card-header py-3">

					<div class="card shadow-sm mb-4">
						<div class="card-header py-3">


						</div>
						<div class="card-body">
							<div>
								<table border="1" width="100%" style="text-align:center;">
									<thead>
										<tr>
											<th>Dimensi</th>
											<th> Persepsi </th>
											<th> Harapan </th>
											<th>Gap</th>
											<th>Rank</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$count = 1;
										$count2 = 1;
										$count3 = 1;
										$count4 = 1;

										if (count($hasilDefuzifikasiHarapan))
											if (empty($jawaban)) {
												echo "  <tr> <td colspan='6'> data Kosong  </td>  </tr>";
											} else if (isset($jawaban)) {

												for ($iterate = 0; $iterate < count($hasilDefuzifikasiHarapan); $iterate++) : ?>
												<tr>

													</td>

													
														
											<td name="kosong"><?php echo $dimensi_query[$iterate][0]['nama']; ?> </td>



											<td name="batas_bawah<?php echo $count++; ?>"><?php echo number_format($hasilDefuzifikasiPersepsi[$iterate], 2, '.', '');  ?></td>
											<td name="batas_tengah<?php echo $count2++; ?>"><?php echo number_format($hasilDefuzifikasiHarapan[$iterate], 2, '.', '');  ?></td>

											<td name="gapPvp<?php echo $count4++; ?>"><?php echo number_format($gapPd[$iterate], 2, '.', ''); ?></td>
											<td name="rank<?php echo $count4++; ?>"><?php echo $rankValuesGapPd[$iterate] ?></td>

												</tr>
											<?php endfor; ?>
										<?php    }  ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
				<style>
					.table {
						white-space: nowrap;
						text-align: center;
						display: inline-block;
					}
				</style>


			</div>

		</div>