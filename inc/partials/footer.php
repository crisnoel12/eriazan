<hr>
    <p class="footer text-center"><a href="<?php echo BASE_URL; ?>">Eriazanskinclinic.com.ph </a> &copy; <?php echo date('Y'); ?> &vert; All Rights Reserved</p>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>js/app.min.js"></script>
<script>
    window.addEventListener("load", function() {
        var load_bar = document.getElementById("load_bar");
        $("#load_bar").css("width", "100%");
        setTimeout(function(){
            $("#load_bar").remove();
        }, 1000);
    });
</script>
</body>
</html>
