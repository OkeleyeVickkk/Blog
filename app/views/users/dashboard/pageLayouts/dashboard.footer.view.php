<?php

declare(strict_types=1);
?>

<script type="text/javascript" src="<?= requireAssets("js/bootstrap.min.js") ?>"></script>
<?php if (isset($customScript)) {
  if (is_array($customScript)) {
    foreach ($customScript as $eachScript) {

      echo $eachScript;
    }
  } else {
    echo $customScript;
  }
} ?>
<script type="module" src="<?= requireAssets("js/dashboard.custom.js", true) ?>"></script>
</body>

</html>