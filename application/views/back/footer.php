  </body>
</html>

<footer class="main-footer">
<script type="text/javascript">
  $('.inner').each(function() {
  var $this = $(this),
      countTo = $this.attr('hitung');

  $({ countNum: $this.text()}).animate({
      countNum: countTo
    },
    {
      duration: 1500,
      easing:'linear',
      step: function() {
      $this.text(Math.floor(this.countNum));
        },
        complete: function() {
          $this.text(this.countNum);
        }

    });
});

</script>
  <strong>Copyright &copy; 2019 <a href="#">Inspektorat Daerah Provinsi Kalimantan Selatan</a></strong>
</footer>
