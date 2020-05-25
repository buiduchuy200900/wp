<?php
    session_start();
    include 'sidebar-nav.php';
?>
    
<main role="main">   
      <section class="panel important">
        <h2 style="color:black">Hello <?php echo $_SESSION["adminName"]?> !!!</h2>
      </section>       
        <?php include 'viewAdmin.php'?>
</main>
</body>
</html>