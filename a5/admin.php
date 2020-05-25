<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sider Menu Bar CSS</title>
    <link rel="stylesheet" href="test.css">
  </head>
  <header role="banner">
    <h1>Admin Panel</h1>
    <ul class="utilities">
      <br>
      <li class="users"><a href="#">My Account</a></li>
      <li class="logout warn"><a href="">Log Out</a></li>
    </ul>
  </header>
  <body>
    <nav role='navigation'>
      <ul class="main">
        <li class="dashboard"><a href="admindashboard">Dashboard</a></li>
        <li class="edit"><a href="#">Edit Website</a></li>
        <li class="write"><a href="#">Write news</a></li>
        <li class="comments"><a href="#">Ads</a></li>
        <li class="users"><a href="#">Manage Users</a></li>
      </ul>
    </nav>
    
    <main role="main">
      
      <section class="panel important">
        <h2>Write Some News</h2>
        <ul>
          <li>Information Panel</li>
        </ul>
      </section>
      
      <section class="panel important">
        <h2>Write a post</h2>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="twothirds">
              Blog title:<br/>
              <input type="text" name="title" size="40"/><br/><br/>
              Content:<br/>    
              <textarea name="newstext" rows="15" cols="67"></textarea><br/>  
            </div>
            <div>
              <input type="submit" name="submit" value="Save" />
            </div>
            </div>
          </form>
      </section>
    </main>
  </body>
</html>
