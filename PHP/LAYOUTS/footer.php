<!-- LINK JAVASCRIPT -->
<script src="../../JS/bootstrap.js"></script>
<script src="../../JS/jquery-3.6.0.min.js"></script>
<script src="../../JS/jquery.mask.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- /LINK JAVASCRIPT -->

<!-- SYNTAX JAVASCRIPT/JQUERY -->
<script>
    // button on and off
    function buttonOnOff() {
        $("#on").toggle()
        $("#off").toggle()
    }

    $('#idr').mask('000.000.000.000', {
        reverse: true
    });

    $("#datepicker").datepicker({
        changeYear: true,
        changeMonth: true,
        maxDate: new Date,
        dateFormat: 'dd-mm-yy'
    });
    $("#finishdate").datepicker({
        dateFormat: 'dd-mm-yy'
    });
    $(document).ready(function() {
        $('.js-example-placeholder-single').select2({
            placeholder: "Name customer",
            allowClear: true
        });
    });
</script>
<!-- /SYNTAX JAVASCRIPT/JQUERY -->
</body>

</html>