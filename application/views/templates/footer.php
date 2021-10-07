            </div>
            <!-- /#wrapper -->

            <!-- jQuery -->
            <script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="<?= base_url('assets/') ?>js/metisMenu.min.js"></script>

            <script src="<?= base_url('assets/') ?>js/dataTables/jquery.dataTables.min.js"></script>

            <script src="<?= base_url('assets/') ?>js/dataTables/dataTables.bootstrap.min.js"></script>


            <!-- Custom Theme JavaScript -->
            <script src="<?= base_url('assets/') ?>/js/startmin.js"></script>

            <script>
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });

                    $('.tampilModalUbah').on('click', function() {
                        const id = $(this).data('id');
                        $('#id_lam').val(id);
                    });
                });
            </script>

            </body>

            </html>