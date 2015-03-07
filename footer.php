    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<script>
    $(function(){
    $('.nav > li').click(function(){
        // $('.nav > li').removeClass('active');
        // $(this).addClass('active');
    });
});
</script>
<script type="text/javascript" charset="utf-8">

jQuery(function() {
  jQuery('.nav li').each(function() {
    if (jQuery(this).children("a").attr('href')  ===  window.location.pathname) {
      jQuery(this).addClass('active');
    }
  });
});  
//]]>
</script>

</body>

</html>