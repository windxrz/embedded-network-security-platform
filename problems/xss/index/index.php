<?php require_once "./test.php"?>

<script>
  console.log("test");
  window.alert = function(a)
  {
    if (a === 1)
    {
      console.log("success");
    }
    else
    {
      console.log("fail");
    }
  }
</script>