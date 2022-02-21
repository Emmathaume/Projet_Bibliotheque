
</div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ameva Corporation</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
    </div>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Prêt à partir ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selectionner 'Terminer' si vous êtes prêt à terminer la session en cours.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-primary" href="<?= URL_ADMIN?>action.php?connect=false">Terminer</a>
                    </div>
                </div>
            </div>
        </div>



        <!-- jquery -->
    <script src="<?= URL_ADMIN ?>vendor/jquery/jquery.min.js"></script>
    <!-- select 2  -->
    <script src="<?=URL_ADMIN?>js/select2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <!-- <script src="<?= URL_ADMIN?>vendor/jquery/jquery.min.js"></script> -->
    <script src="<?= URL_ADMIN?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    

    <!-- Core plugin JavaScript-->
    <script src="<?= URL_ADMIN?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= URL_ADMIN?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= URL_ADMIN?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="<?= URL_ADMIN?>js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="<?= URL_ADMIN?>js/demo/chart-pie-demo.js"></script> -->

</body>
</html>