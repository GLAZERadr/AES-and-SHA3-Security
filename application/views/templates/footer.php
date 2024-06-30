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

<!-- User Defined AJAX -->
<!-- Pagination -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "pageLength": 5
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    function setupHashingButton(buttonId, latInputId, longInputId, digestLatId, digestLongId, url, isDb) {
        var button = document.getElementById(buttonId);
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent form submission
            var lat_en = document.getElementById(latInputId).value;
            var long_en = document.getElementById(longInputId).value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (isDb) {
                            if (response.hash_lat_en_db) {
                                document.getElementById(digestLatId).value = response.hash_lat_en_db;
                            }
                            if (response.hash_long_en_db) {
                                document.getElementById(digestLongId).value = response.hash_long_en_db;
                            }
                        } else {
                            if (response.hash_lat_en) {
                                document.getElementById(digestLatId).value = response.hash_lat_en;
                            }
                            if (response.hash_long_en) {
                                document.getElementById(digestLongId).value = response.hash_long_en;
                            }
                        }
                    } else {
                        console.error('Error in the request:', xhr.statusText);
                    }
                }
            };

            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            if (isDb) {
                xhr.send('lat_en_db=' + encodeURIComponent(lat_en) + '&long_en_db=' + encodeURIComponent(long_en));
            } else {
                xhr.send('lat_en=' + encodeURIComponent(lat_en) + '&long_en=' + encodeURIComponent(long_en));
            }
        });
    }

    setupHashingButton(
        'hasil-enkripsi', 
        'lat_en', 
        'long_en', 
        'digest_text_lat_1', 
        'digest_text_long_1', 
        '<?php echo base_url("Dataloc/generate_hash"); ?>', 
        false // Not for DB
    );

    setupHashingButton(
        'hasil-enkripsi-db', 
        'lat_en_db', 
        'long_en_db', 
        'digest_text_lat_2', 
        'digest_text_long_2', 
        '<?php echo base_url("Dataloc/generate_hash_db"); ?>', 
        true // For DB
    );

    function compareHashes(event) {
        event.preventDefault();
        var digestLat1 = document.getElementById('digest_text_lat_1').value;
        var digestLong1 = document.getElementById('digest_text_long_1').value;
        var digestLat2 = document.getElementById('digest_text_lat_2').value;
        var digestLong2 = document.getElementById('digest_text_long_2').value;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    var resultText = response.result === 'Matched' ? 'Digest Text 1 dan Digest Text 2: Sama' : 'Digest Text 1 dan Digest Text 2: Tidak Sama';
                    document.getElementById('hasil-banding-hash').innerText = resultText;

                    var lanjutkanButton = document.getElementById('lanjutkan-dekrip');
                    if (response.result === 'Matched') {
                        lanjutkanButton.removeAttribute('disabled');
                    } else {
                        lanjutkanButton.setAttribute('disabled', 'disabled');
                    }
                } else {
                    console.error('Error in the request:', xhr.statusText);
                }
            }
        };

        xhr.open('POST', '<?php echo base_url("Dataloc/compare_hash_digest"); ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('digest_text_lat_1=' + encodeURIComponent(digestLat1) + '&digest_text_long_1=' + encodeURIComponent(digestLong1) + '&digest_text_lat_2=' + encodeURIComponent(digestLat2) + '&digest_text_long_2=' + encodeURIComponent(digestLong2));
    }

    document.getElementById('bandingkan-hashing').addEventListener('click', compareHashes);
});
</script>

</body>

</html>