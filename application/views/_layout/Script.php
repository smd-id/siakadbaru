<!-- Jquery -->
<script src="<?=base_url('assets/');?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url('assets/');?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Jquery cookie -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url('assets/');?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- DataTables -->
<script src="<?=base_url('assets/');?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('assets/');?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="<?=base_url('assets/');?>js/adminlte.js"></script>

<!-- Select2 -->
<script src="<?=base_url('assets/');?>plugins/select2/js/select2.full.min.js"></script>

<!-- Swal -->
<script src="<?=base_url('assets/');?>plugins/sweetalert2/sweetalert2.all.min.js"></script>

<!-- script nestable -->
<script src="<?=base_url('vendor/nestable/jquery.nestable.js')?>"></script>

<!-- default Siakad -->
<script src="<?=base_url('assets/');?>js/default-siakad.js"></script>
<script src="<?=base_url('assets/');?>js/default-notif.js"></script>

<!-- <script>
  $(document).ready(function() {
    $.ajax({
      type:'GET',
      dataType:'json',
      url:'<?=base_url('home/getstatusProfile'); ?>',
      success:function(result){
          if (result.whatsapp == null){
            Swal.fire({
                title: 'Peringatan',
                html: "Profile Anda Belum Lengkap, Lengkapi sekarang",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Nanti',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Lengkapi Sekarang'
            }).then((result) => {
                if (result.value) {
                    location.href = "<?=base_url().'auth/changeprofile'; ?>";
                }
            })
          }
      }
    });
  });
</script> -->