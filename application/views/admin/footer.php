<footer class="footer pt-0">
	<div class="row align-items-center justify-content-lg-between">
		<div class="col-lg-6">
			<div class="copyright text-center  text-lg-left  text-muted">
				&copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
					target="_blank">Creative Tim</a>
			</div>
		</div>
		<div class="col-lg-6">
			<ul class="nav nav-footer justify-content-center justify-content-lg-end">
				<li class="nav-item">
					<a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
				</li>
				<li class="nav-item">
					<a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About
						Us</a>
				</li>
				<li class="nav-item">
					<a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
				</li>
				<li class="nav-item">
					<a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
						class="nav-link" target="_blank">MIT License</a>
				</li>
			</ul>
		</div>
	</div>
</footer>
</div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="<?php echo base_url() ?>/assets/js/argon.js?v=1.2.0"></script>
<script src="<?php echo base_url() ?>/assets/js/printThis.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.0/chart.min.js"></script>
<script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','.add-transaksi',function(){
			var append = $(this).data("append");
			$.ajax({
				url : "<?php echo base_url() ?>index.php/admin/barang/getSelectBarang",
				type : "GET",
				success:function(data){
					var obj = jQuery.parseJSON(data);
					var string = "<option value='' data-harga='0' data-min='0'>Pilih Barang</option>";
					obj.forEach(element => {
						string = string + "<option value='"+element.Id_Barang+"' data-harga='"+element.Harga+"' data-min='"+element.Min_qty_beli+"'>"+element.Nama_Barang+"</option>";
					});
					$(append).append('<div class="detail-transaksi row"><div class="col-md-4"> <div class="form-group"> <label for="exampleFormControlInput1">Barang</label> <select name="Id_Barang[]" id="" class="form-control barang">'+string+'</select> </div></div><div class="col-md-3"> <div class="form-group"> <label for="exampleFormControlInput1">Jumlah</label> <input type="number" name="Jumlah[]" class="form-control jumlah-barang" placeholder="Jumlah Barang" value="0"> </div></div><div class="col-md-3"> <div class="form-group"> <label for="exampleFormControlInput1">Total</label> <input type="number" name="Total_Harga[]" class="form-control total" placeholder="Total" value="0" readonly> </div></div><div class="col-md-2"> <div class="form-group"> <label for="exampleFormControlInput1">Aksi</label> <button type="button" class="btn btn-danger form-control remove-transaksi"><i class="ni ni-fat-remove"></i></button> </div></div></div>');
				}
			})
		})

		$(document).on('click','.remove-transaksi',function(){
			$(this).parents(".detail-transaksi").remove();
		})

		$(document).on('change','.barang',function(){
			var minqty = $(this).parents(".detail-transaksi").find(".barang :selected").data("min");
			$(this).parents(".detail-transaksi").find(".jumlah-barang").attr("min",minqty);
		})

		$(document).on('change','.jumlah-barang',function(){
			var harga = $(this).parents(".detail-transaksi").find(".barang :selected").data("harga");
			var jumlah = $(this).val();
			console.log(harga);
			var total =  harga * jumlah;
			$(this).parents(".detail-transaksi").find(".total").val(total);
			console.log("change");
		})
	})
</script>
</body>

</html>
