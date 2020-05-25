<?php
$servername = "localhost";
$username = "root";
$password = "root";
$port = "8889";
$dbName = "myDB";

// /Create connection
$conn = new mysqli("$servername:$port", $username, $password, $dbName);


// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
// // Create database
// $sql = "CREATE DATABASE myDB";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . $conn->error;
// }


// sql to create table
// $sql= "CREATE TABLE Product
// (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
// product_name VARCHAR (200) NOT NULL,
// product_price FLOAT,
// product_image VARCHAR (100),
// product_brand VARCHAR(25),
// product_detail VARCHAR(500)
// )
// ";
  
//   if (mysqli_query($conn, $sql)) {
//     echo "Table Product created successfully";
//   } else {
//     echo "Error creating table: " . mysqli_error($conn);
//   }
// // Insert data to table product 
// $sql="INSERT INTO Product
// VALUES(1,'Russia 2018 Original Ball','200','assets/img/product/football.jpg','football','This new model updates the original design with pixelated graphics while maintaining the classic black and white colorway.One of a kind panel design of these new world cup balls provides flight performance benefits along with the reassurance of durability The seamless design and textured surface enhances every contact, while replica graphics bring out the best playmaking.')";
// (2,'Real Madrid kit 2017/18','300','assets/img/product/RM_kit.png','football', 'This juniors home jersey reflects Real Madrid s status as one of the most prestigious soccer teams on the continent. The regal design features gold accents on a classic white backdrop. It s made from sweat-wicking fabric a silky feel. Designed for fans, it has a slightly looser cut than the jersey players wear game.'),
// (3,'Los Angeles Angles kit','250','assets/img/product/Daco_612429.png','baseball','Amscan.inc is the largest designer, manufacturer, and distributor of decorated party goods and party accessories in the world, founded in 1947. Our company is also a leading supplier of gifts, home decor, and tabletop products as well as the primary source for gift wrap, gift bags, stationery, and licensed products.'),
// (4,'TF - 500 / SPALDING Ball','200','assets/img/product/basketball.png','basketball','Built for after-school practice and weekends at the rec center.The TF-500 indoor game basketball has a deep channel design that helps young ballers master their skills. The composite cover gives it the feel of leather without the break-in time.'),
// (5,'Female Gym Clothing','350','assets/img/product/female_clothing.png','gym','Are you on your journey to losing weight and improving your physique? What if you could supercharge your workouts and any type of physical activity without extra effort and get quick results by shedding pounds fast? Well, now you can with Sweat Shaper! The new women s Advanced Sweatwear that uses your natural body heat promote sweating.'),
// (6,'Adidas Running Shoes','400','assets/img/product/running_shoes.png','gym','These shoes adapt running style for everyday wear. They are designed width a sleek two tone  that hugs your feet  soft knit. The plush cushioned midsole  soft sockliner bring comfort two every step.'),
// (7,'Nike Football Shoes','400','assets/img/product/football_shoes.png','football','Nike is one of the worlds most recognizable brands designed to keep you at the top of your game. With their innovative fabrics and styles, Nike is there to suit any activity. These Mens Nike Legend 7 Academy Soccer Shoes are guaranteed authentic. They’re crafted with No Material Tag, and the closure is .'),
// (8,'Puma Baseball Glove','350','assets/img/product/baseball-glove.png','baseball','Rawlings all new Players Series models offer a multitude of patterns an colors which are constructed with a soft, pliable shell for easy close and control. Add the eye-catching accents, soft inner linings,  our signatures Rawlings script  your young athlete has the perfect blend of style kick offf their career. Recommended for ages'),
// (9,'Workbench - Olympic','500','assets/img/product/exercise-equip.png','gym','FLYBIRD, which is design and produce fitness equipment for 20 years. Especially in WEIGHT BENCH, our designers develop bench with advice of professional fitness coach, let our user get more effective.This is a high-cost effective fashion adjustable bench we designed.'),
// (10,'Adidas Tennis Racket','350','assets/img/product/racket.png','tennis','Lightweight, maneuverable, and powerful, the Ultra Team makes a statement with its superior playability from all over the court. Inspired by the performance and design of the Ultra franchise, the Ultra Team accommodates a wide range of playing styles and levels with its geometry and power. Racket comes pre-strung with Wilson Sensation 16L/1.25, an arm-friendly string built for comfort.'),
// (11,'SELLS- Football Gloves','350','assets/img/product/football-gloves.png','football','Whether in your backyard or in the field, playing catch or in an organized game you can expect the best from these gloves while supporting your favorite NFL team!'),
// (12,'TTE - Baseball Bat 2020','350','assets/img/product/baseball-bat.png','baseball','Composite wooden discovery bat for beginners and children for use with a soft ball (for example BS-1 barnett ball). Warning! The BB-W is for initiation and leisure time. This is not for a match or training. You can touch the ball more easily than by an aluminium bat, with less power, that is ideal to learn baseball or practice it in leisure time. Perfect for beginner and initiation. '),
// (13,'Run Machine at Home','500','assets/img/product/run-machine.png','gym','Turn up your fitness with the SF-T7643 Heavy Duty Walking Treadmill. This treadmill provides a solid and stable platform for all fitness levels. Treadmill has high weight capacity of up to 350 pounds. The ample walking surface is 19. 5 inches wide. The convenient “quick button” feature allows for quickly getting to the desired workout speed. Feel like going faster?'),
// (14,'Red Table Tennis','200','assets/img/product/table-tennis-red.png','table_tennis','The STIGA ProCarbon is a perfect blend of cutting-edge technologies and advanced materials. The ProCarbon will allow you to experience the extreme power and spin found in rackets of the top players around the world. This performance-level table tennis racket features ITTF approved rubber for tournament play with performance ratings of Speed: 99, Spin: 100, and Control: 80.'),
// (15,'Black Table Tennis ','200','assets/img/product/table-tennis-black.jpg','table_tennis','The surface of a racket will develop a smooth glossy patina with use. The rubber surface needs regular cleaning to retain a high friction surface for ball spin. Commercial cleaners or water and soap can be cleaning agents.'),
// (16,'Blue Table Tennis','200','assets/img/product/table-tennis-blue.jpg','table_tennis','Players have many options and variations in rubber sheets on their racket. Although a racket may be purchased assembled with rubber by the manufacturer, most serious tournament players will use a custom racket.'),
// (17,'Female Tennis Dress','300','assets/img/product/pngwing.com.png','tennis','Amidst the all-white clothing that drowns centre court, even a small pop of colour can be an act of rebellion. Co-created with Pharrell Williams, this dress makes a statement with a colour-tipped collar and armholes. An innovative knit construction and back cutouts add a futuristic twist to a retro look.There is no month passing by without a new adidas x Pharrell Williams collab hitting the stores.'),
// (18,'Indiana Pacers Kit 2020','300','assets/img/product/basketball-suit.png','basketball','We are a professional clothing store. All the jerseys you see are carefully selected by us and made by great manufacturers.【Measuring】★ If you are unsure of size, please tell us your head and chest or height, cm and weight. This can help you choose more suitable clothes, but you should determine the size.★ Our size chart is completely correct. If you have not carefully checked the size chart and cannot wear it after receiving the product, we will not bear the main responsibility.')";
//   if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }



// sql to create table admin
// $sql = "CREATE TABLE Admins (
//     id INT (11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
//     adminName VARCHAR(200) NOT NULL,
//     adminPassword VARCHAR(200) NOT NULL,
//     email VARCHAR(200),
//     Adresss VARCHAR (500),
//     mobilephone VARCHAR(50)
//     )";
    
//     if ($conn->query($sql) === TRUE) {
//       echo "Table Admins created successfully";
//     } else {
//       echo "Error creating table: " . $conn->error;
//     }

// // insert data to admins table
// $sql = "INSERT INTO Admins
// VALUES (1, 'quochuy','helloworld','qhuy@gmail.com' ,'43A4 Bien Hoa City','0845202132'),
// (2, 'duchuy','helloworld','dhuy@gmail.com' ,'33A1 Ho Chi Minh City','0989614683')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();

?>