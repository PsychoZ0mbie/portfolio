        
        <footer class="footer">
            <div>CoreUI Bootstrap Admin Template © 2021 creativeLabs.</div>
            <div class="ms-auto">Powered by&nbsp; CoreUI UI Components</div>
        </footer>
        </div>
        
        <!------------------------------Admin template--------------------------------->
        <script src="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
        <script src="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/vendors/simplebar/js/simplebar.min.js"></script>
        <script src="<?=media()?>/coreui/coreui-free-bootstrap-admin-template/dist/vendors/@coreui/utils/js/coreui-utils.js"></script>

        <!------------------------------Frameworks--------------------------------->
        <script src="<?= media();?>/frameworks/jquery/jquery.js"></script>
        <script src="<?= media(); ?>/frameworks/bootstrap/popper.min.js"></script>
        <script src="<?= media(); ?>/frameworks/bootstrap/bootstrap.min.js"></script>
        
        
        <!------------------------------Plugins--------------------------------->
        <script src="<?= media();?>/plugins/fontawesome/fontawesome.js"></script>
        <script src="<?= media();?>/plugins/sweetalert/sweetalert.js"></script>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>

        <script src="<?= media();?>/plugins/sheetjs/sheetjs.js"></script>
        <!------------------------------My functions--------------------------------->

        <script>
          const base_url = "<?= base_url(); ?>";
        </script>
        
        <script src="<?= media(); ?>/js/functions.js"></script>
        <script src="<?= media(); ?>/js/<?=$data['app']?>"></script>
    </body>
</html>
    
