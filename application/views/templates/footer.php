<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('files/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('files/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('files/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('files/'); ?>js/sb-admin-2.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    function setupHashingButton(buttonId, latInputId, longInputId, digestLatId, digestLongId, url) {
        var button = document.getElementById(buttonId);
        button.addEventListener('click', function () {
            var lat_en = document.getElementById(latInputId).value;
            var long_en = document.getElementById(longInputId).value;
            
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    console.log('Response:', xhr.responseText);
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.hash_lat_en) {
                            document.getElementById(digestLatId).value = response.hash_lat_en;
                        }
                        if (response.hash_long_en) {
                            document.getElementById(digestLongId).value = response.hash_long_en;
                        }
                        if (response.hash_lat_en_db) {
                            document.getElementById(digestLatId).value = response.hash_lat_en_db;
                        }
                        if (response.hash_long_en_db) {
                            document.getElementById(digestLongId).value = response.hash_long_en_db;
                        }
                    } else {
                        console.error('Error in the request:', xhr.statusText);
                    }
                }
            };

            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            console.log('Sending AJAX request to:', url);
            xhr.send('lat_en=' + encodeURIComponent(lat_en) + '&long_en=' + encodeURIComponent(long_en));
        });
    }

    setupHashingButton(
        'hasil-enkripsi', 
        'lat_en', 
        'long_en', 
        'digest_text_lat_1', 
        'digest_text_long_1', 
        '<?php echo base_url("Dataloc/generate_hash"); ?>'
    );
    setupHashingButton(
        'hasil-enkripsi-db', 
        'lat_en_db', 
        'long_en_db', 
        'digest_text_lat_2', 
        'digest_text_long_2', 
        '<?php echo base_url("Dataloc/generate_hash_db"); ?>'
    );
});
</script>

</body>

</html>