<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link ftimage" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
  </li>
  <?= $this->element('header/menu') ?>
</ul>

<div class="navbar" style="margin-left: 25vw;">
  <b>
    <img src="<?= $this->Url->build('/') ?>img/rect_logo.png" alt="vekpro" style="width: 8vw;">
  </b>
  </span>-<i>Vendor Customer Procurement</i>
  <!-- <span style="font-weight: 900;font-size: x-large;">
    <span style="color: #004d87;font-size: xx-large;">ve</span>ndor &nbsp; &nbsp;
    <span style="color: #c7c52e;font-size: xx-large;">k</span>lant &nbsp; &nbsp;
    <span style="color: #e31720;font-size: xx-large;">pro</span>curement
  </span> -->
</div>


<ul class="navbar-nav ml-auto">
  <li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
      <i class="fas fa-expand-arrows-alt"></i>
    </a>
  </li>
</ul>

<script>
  $(document).on("click", ".ftimage", function () {
    if ($(".ft_rect_logo").data('image') == 1) {
      $(".ft_rect_logo").attr('src', '<?= $this->Url->build(' / ') ?>img/icon.png').attr('width', '50px').data('image', '2');
    }
    else {
      $(".ft_rect_logo").attr('src', '<?= $this->Url->build(' / ') ?>img/ft_rect_logo.png').attr('width', '175px').data('image', '1');
    }
  });
</script>